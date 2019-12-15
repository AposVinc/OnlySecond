<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Cart;
use App\Category;
use App\CategoryProduct;
use App\Color;
use App\CreditCard;
use App\Offer;
use App\OrderHistory;
use App\OrderHistoryProduct;
use App\Product;
use App\Specification;
use App\Supplier;
use App\Image;
use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /*-------------------   BACKEND   -------------------*/

    public function showListForm()
    {
        $products = Product::withTrashed()->get();
        return view('backend.product.list', ['products' => $products]);
    }

    public function showAddForm()
    {
        if(\App\Collection::withoutTrashed()->exists() && Supplier::withoutTrashed()->exists() && Category::withoutTrashed()->exists()){
            $brands = Brand::all();
            $categories = Category::all();
            $suppliers = Supplier::all();
            $colors = Color::all();
            return view('backend.product.add',['brands' => $brands,'categories' => $categories, 'suppliers' => $suppliers, 'colors' => $colors]);
        }else{
            return redirect()->to('Admin/Product/List')->with('error','Impossibile inserire un nuovo Prodotto. Inserire prima una Collezione e/o un Fornitore e/o una Categoria!!');
        }
    }

    public function showEditForm()
    {
        if(Product::withoutTrashed()->exists()){
            $brands = Brand::all();
            $categories = Category::all();
            $suppliers = Supplier::all();
            $colors = Color::all();
            return view('backend.product.edit',['brands' => $brands,'categories' => $categories, 'suppliers' => $suppliers, 'colors' => $colors]);
        }else{
            return redirect()->to('Admin/Product/List')->with('error','Non ci sono Prodotti da Modificare!!');
        }
    }

    public function showEditFormButton($cod)
    {
        if(Product::withoutTrashed()->exists()){
            $selected_product = Product::where('cod',$cod)->first();

            $brands = Brand::all();
            $categories = Category::all();
            $suppliers = Supplier::all();
            $colors = Color::all();
            return view('backend.product.edit',['selected_product' => $selected_product,'brands' => $brands,'categories' => $categories, 'suppliers' => $suppliers, 'colors' => $colors]);
        }else{
            return redirect()->to('Admin/Product/List')->with('error','Non ci sono Prodotti Attivi da Modificare!!');
        }
    }

    public function showDeleteForm()
    {
        if (Product::withoutTrashed()->exists()){
            $brands = Brand::all();
            return view('backend.product.delete', ['brands' => $brands]);
        } else {
            return redirect()->to('Admin/Product/List')->with('error','Non ci sono Prodotti da Eliminare!!');
        }
    }

    public function showRestoreForm()
    {
        if (Product::onlyTrashed()->exists()){
            $brands = Brand::all();
            return view('backend.product.restore', ['brands' => $brands]);
        } else {
            return redirect()->to('Admin/Product/List')->with('error','Non ci sono Prodotti da Ripristinare!!!!');
        }
    }


    function getProduct(Request $request)
    {
        $value = $request->get('value');
        $products = Product::withoutTrashed()->where('collection_id', $value)->get();
        return $products;
    }

    function getProductRestore(Request $request)
    {
        $value = $request->get('value');
        $products = Product::onlyTrashed()->where('collection_id', $value)->get();
        return $products;
    }

    function getProductWithOffer(Request $request)
    {
        $value = $request->get('value');
        $products = new Collection();
        $offers = Offer::all();
        foreach ($offers as $offer){
            $product = $offer->product;
            if ($product->collection_id == $value){
                $products->push($product);
            }
        }
        return $products;
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)  //
    {
        if (Product::where('cod', $request->cod)->first()) {
            return redirect()->to('Admin/Product/List')->with('error', 'Il Prodotto già esiste!!');
        }else{
            //Save product
            $product = new Product();
            $product->cod=$request->get('cod');
            $product->collection_id= $request->get('collection');
            $product->price= $request->get('price');
            $product->stock_availability= $request->get('quantity');
            $product->genre= $request->get('inline-radios');
            $product->long_desc= $request->get('desc');
            $product->supplier_id= $request->get('supplier');
            $product->color_id= $request->get('color');
            if($product->save()){
                $idProduct= $product->id;

                //Save main image
                $result = $this->saveMainImage($request,$idProduct);
                if($result == "Success"){

                    //Save category - product rel
                    $categories = Category::withoutTrashed()->get();
                    foreach ($categories as $category){
                        if($request->get($category->id)) {
                            $category_product = new CategoryProduct();
                            $category_product->category_id = $request->get($category->id);
                            $category_product->product_id = $idProduct;
                            if(!($category_product->save())){
                                return redirect()->to('Admin/Product/List')->with('error', 'Errore durante il caricamento. Riprovare!!!!');
                            }
                        }
                    }

                    //Save other image
                    if ($request->hasFile('other-photo')) { //  se il file è presente nella request
                        $images = $request->file('other-photo');
                        foreach ($images as $image) {
                            $result = $this->saveOtherImage($image, $request, $idProduct);
                            if($result == "Error"){
                                return redirect()->to('Admin/Product/List')->with('error', 'Errore durante il caricamento. Riprovare!!!!');
                            }
                        }
                    }

                    //Save specification
                    $specification = new Specification();
                    $specification->product_id = $idProduct;
                    $specification->case_size = $request->get('case_size');
                    $specification->material = $request->get('material');
                    $specification->case_thickness = $request->get('case_thickness');
                    $specification->glass = $request->get('glass');
                    $specification->dial_color = $request->get('dial_color');
                    $specification->strap_material = $request->get('strap_material');
                    $specification->strap_color = $request->get('strap_color');
                    $specification->closing = $request->get('closing');
                    $specification->movement = $request->get('movement');
                    $specification->warranty = $request->get('warranty');
                    if($request->get('battery_replacement')){
                        $specification->battery_replacement = true;
                    }else{
                        $specification->battery_replacement = false;
                    }

                    if($specification->save()){
                        return redirect()->to('Admin/Product/List')->with('success', 'Caricamento avvenuto con successo!!');
                    }else{
                        return redirect()->to('Admin/Product/List')->with('error', 'Errore durante il caricamento. Riprovare!!!!');
                    }

                }else{
                    return redirect()->to('Admin/Product/List')->with('error', 'Errore durante il caricamento. Riprovare!!!!');
                }
            }else{
                return redirect()->to('Admin/Product/List')->with('error', 'Errore durante il caricamento. Riprovare!!!!');
            }
        }
    }

    function saveOtherImage($image,$request,$idProduct){
        if ($image->isValid()) { // verificare che non si siano verificati problemi durante il caricamento del file
            $path='public/Orologi';
            if(!(Storage::exists($path))){
                Storage::makeDirectory($path);
            }
            $nameBrand=Brand::where('id', $request->get('brand'))->first()->name;
            $path.= '/'. $nameBrand;
            if(!(Storage::exists($path))){
                Storage::makeDirectory($path);
            }
            $idCollection=$request->get('collection');
            $nameCollection=\App\Collection::where('id', $idCollection)->first()->name;
            $path.= '/'. $nameCollection;
            if(!(Storage::exists($path))){
                Storage::makeDirectory($path);
            }
            $cod = $request->get('cod');
            $color_id = $request->get('color');
            $color = Color::where('id',$color_id)->first()->name;
            $counter = Image::where('product_id',$idProduct)->max('counter');
            $counter +=1;
            $filename= $nameBrand. '_'. $nameCollection. '_'. $cod. '_'. $color. '_'. $counter. '.jpg';
            $path_image = 'storage/Orologi/'. $nameBrand. '/'. $nameCollection. '/'. $filename;
            $path = $image->storeAs($path, $filename);
            if($path!=""){
                $image = new Image();
                $image->path_image = $path_image;
                $image->product_id = $idProduct;
                $image->main = 0;
                $image->counter = $counter;
                $image->save();
                return "Success";
            }
        }else{
            return "Error";
        }
    }

    function saveMainImage($request,$idProduct)
    {
        if ($request->hasFile('main-photo')) { //  se il file è presente nella request
            if ($request->file('main-photo')->isValid()) { // verificare che non si siano verificati problemi durante il caricamento del file
                $path='public/Orologi';
                if(!(Storage::exists($path))){
                    Storage::makeDirectory($path);
                }
                $nameBrand=Brand::where('id', $request->get('brand'))->first()->name;
                $path.= '/'. $nameBrand;
                if(!(Storage::exists($path))){
                    Storage::makeDirectory($path);
                }
                $idCollection=$request->get('collection');
                $nameCollection=\App\Collection::where('id', $idCollection)->first()->name;
                $path.= '/'. $nameCollection;
                if(!(Storage::exists($path))){
                    Storage::makeDirectory($path);
                }
                $cod = $request->get('cod');
                $color_id = $request->get('color');
                $color = Color::where('id',$color_id)->first()->name;
                $filename= $nameBrand. '_'. $nameCollection. '_'. $cod. '_'. $color. '.jpg';
                $path_image = 'storage/Orologi/'. $nameBrand. '/'. $nameCollection. '/'. $filename;
                $path = $request->file('main-photo')->storeAs($path, $filename);
                if($path!=""){
                    $image = new Image();
                    $image->path_image = $path_image;
                    $image->main = 1;
                    $image->counter = 0;
                    $image->product_id = $idProduct;
                    $image->save();
                    return "Success";
                }
            }else{
                return "Error";
            }
        }else{
            return "Error";
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $idProduct = $request->get('product');
        $idCollectionOld = $request->get('collection');
        $idCollectionNew = $request->get('newcollection');
        $product = Product::where('id',$idProduct)->first();
        $cod = $request->get('cod');
        if($cod != $product->cod && Product::where('cod',$cod)->first()){
            return redirect()->to('Admin/Product/List')->with('error', 'Il Prodotto già esiste!!');
        }else{

            //Update product
            if($cod != $product->cod){
                $product->cod=$cod;
            }
            if($idCollectionOld != $idCollectionNew){
                $product->collection_id= $idCollectionNew;
            }
            if($request->filled('price')){
                $product->price= $request->get('price');
            }
            if($request->filled('quantity')){
                $product->stock_availability= $request->get('quantity');
            }
            if($request->filled('inline-radios')){
                $product->genre = $request->get('inline-radios');
            }
            if($request->filled('desc')){
                $product->long_desc= $request->get('desc');
            }
            if($request->filled('supplier')){
                $product->supplier_id= $request->get('supplier');
            }
            if($request->filled('color')){
                $product->color_id= $request->get('color');
            }
            if ($product->save()){

                //Update category - product rel
                $categories = Category::withoutTrashed()->get();
                foreach ($categories as $category){
                    if($request->get($category->id)){
                        if(!(CategoryProduct::where('product_id',$idProduct)->where('category_id',$category->id)->first())) {
                            $category_product = new CategoryProduct();
                            $category_product->category_id = $request->get($category->id);
                            $category_product->product_id = $idProduct;
                            if (!($category_product->save())) {
                                return redirect()->to('Admin/Product/List')->with('error', 'Errore durante il caricamento. Riprovare!!!!');
                            }
                        }
                    }else{
                        if(CategoryProduct::where('product_id',$idProduct)->where('category_id',$category->id)->first()) {
                            if (!(CategoryProduct::where('product_id',$idProduct)->where('category_id',$category->id)->forceDelete())) {
                                return redirect()->to('Admin/Product/List')->with('error', 'Errore durante il caricamento. Riprovare!!!!');
                            }
                        }
                    }
                }

                //Update specification
                $specification = Specification::where('product_id',$idProduct)->first();
                if($request->filled('case_size')){
                    $specification->case_size= $request->get('case_size');
                }
                if($request->filled('material')){
                    $specification->material = $request->get('material');
                }
                if($request->filled('case_thickness')){
                    $specification->case_thickness = $request->get('case_thickness');
                }
                if($request->filled('glass')){
                    $specification->glass = $request->get('glass');
                }
                if($request->filled('dial_color')){
                    $specification->dial_color = $request->get('dial_color');
                }
                if($request->filled('strap_material')){
                    $specification->strap_material = $request->get('strap_material');
                }
                if($request->filled('strap_color')){
                    $specification->strap_color = $request->get('strap_color');
                }
                if($request->filled('closing')){
                    $specification->closing = $request->get('closing');
                }
                if($request->filled('movement')){
                    $specification->movement = $request->get('movement');
                }
                if($request->filled('warranty')){
                    $specification->warranty = $request->get('warranty');
                }
                if ($request->get('battery_replacement')) {
                    $specification->battery_replacement = true;
                } else {
                    $specification->battery_replacement = false;
                }
                if($specification->save()){
                    return redirect()->to('Admin/Product/List')->with('success', 'Modifiche avvenute con successo!!');
                }else{
                    return redirect()->to('Admin/Product/List')->with('error', 'Errore durante il caricamento. Riprovare!!!!');
                }
            } else {
                return redirect()->to('Admin/Product/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
            }

        }
    }

    public function restore(Request $request)   //query senza nome
    {
        $id = $request->get('product');
        $product = Product::withTrashed()->where('id',$id)->first();
        if($product->restore()){
            return redirect()->to('Admin/Product/List')->with('success', 'Ripristino avvenuto con successo!!');
        }else{
            return redirect()->to('Admin/Product/List')->with('error', 'Errore durante il Ripristino. Riprovare!!');
        }
    }

    public function restoreButton($cod)
    {
        $product = Product::withTrashed()->where('cod',$cod)->first();
        if($product->restore()){
            return redirect()->back()->with('success', 'Ripristino avvenuto con successo!!');
        }else{
            return redirect()->back()->with('error', 'Errore durante il Ripristino. Riprovare!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->get('product');
        $product = Product::where('id',$id)->first();
        if($product->offer) {
            if (!($product->offer->delete())) {
                return redirect()->to('Admin/Product/List')->with('error', 'Errore durante l\'Eliminazione, Riprovare!!');
            }
        }
        if($product->delete()){
            return redirect()->to('Admin/Product/List')->with('success', 'Eliminazione avvenuta con successo!!');
        }else{
            return redirect()->to('Admin/Product/List')->with('error', 'Errore durante l\'Eliminazione, Riprovare!!');
        }
    }

    public function destroyButton($cod)
    {
        $product = Product::where('cod',$cod)->first();
        if($product->offer) {
            if (!($product->offer->delete())) {
                return redirect()->back()->with('error', 'Errore durante l\'Eliminazione, Riprovare!!');
            }
        }
        if($product->delete()){
            return redirect()->back()->with('success', 'Eliminazione avvenuta con successo!!');
        }else{
            return redirect()->back()->with('error', 'Errore durante l\'Eliminazione, Riprovare!!');
        }
    }

    public function getFourProductMoreSent()
    {
        $products = Product::where('quantity_sold', '>' , 0)->take(4)->orderBy('quantity_sold','desc')->get();
        $data = [];
        $color = ["#DC3545","#19A9D5","#007BFF","#8fc9fb"];
        foreach ($products as $k => $product){
            $nameCollection = $product->collection->name;
            $nameBrand = $product->collection->brand->name;
            $obj = ['label' => $nameBrand. ' '. $nameCollection. ' '.$product->cod, 'data' => $product->quantity_sold, 'color' => $color[$k]];
            array_push($data, $obj);
        }
        return $data;
    }

    /*-------------------   FRONTEND   -------------------*/

    public function showProduct($cod)
    {
        if ($product = Product::where('cod', $cod)->first()) {
            return view('frontend.product')->with('product', $product);
        } else {
            return view('frontend.404');
        }
    }

    public function addToWishlist($cod){
        /*
        $product = Product::where('cod', $cod)->first();
        \Auth::user()->productsWishlist()->save($product);
    */
        if (\Auth::user()->productsWishlist()->where('cod', $cod)->first()){
            return redirect()->back();
        }else{
             $product = Product::where('cod', $cod)->first();
            \Auth::user()->productsWishlist()->save($product);
            return redirect()->back();
        }
    }

    public function removeFromWishlist($cod){
        $product = Product::where('cod', $cod)->first();
        auth()->user()->productsWishlist()->detach($product);
        return redirect()->back();
    }

    public function addToCart(Request $request, $cod){
        $product = Product::where('cod', $cod)->first();
        if(\Auth::check()){
            if (\Auth::user()->products()->where('cod', $cod)->first()){
                $cart = Cart::where('product_id', $product->id)->where('user_id', \Auth::id())->first();
                if($request->filled('product_quantity')){
                    \Auth::user()->products()->where('cod', $cod)->update(['quantity' => $request->get('product_quantity')]);
                }else{
                    \Auth::user()->products()->where('cod', $cod)->update(['quantity' => $cart->quantity +1]);
                }
                return redirect()->back();
            }else{
                \Auth::user()->products()->save($product, ['quantity' => 1]);
                return redirect()->back();
            }
        }else{
            $trovato = false;
            $products = $request->session()->get('products');
            $quantity = $request->session()->get('quantity');
            if(empty($products)){
                $request->session()->push('products', $product);
                if($request->filled('product_quantity')){
                    $request->session()->push('quantity', $request->get('product_quantity'));
                }else{
                    $request->session()->push('quantity', 1);
                }
            }else{
                $q = [];
                foreach ($products as $k => $p){
                    if($p->cod == $product->cod){
                        $trovato = true;
                        if($request->filled('product_quantity')){
                            $q = array_replace($quantity, array($k => $request->get('product_quantity')));
                        }else{
                            $q = array_replace($quantity, array($k => $quantity[$k] + 1));
                        }
                    }
                }
                if(!$trovato){
                    $request->session()->push('products', $product);
                    if($request->filled('product_quantity')){
                        $request->session()->push('quantity', $request->get('product_quantity'));
                    }else{
                        $request->session()->push('quantity', 1);
                    }
                }else{
                    $request->session()->forget('quantity');
                    $request->session()->put('quantity', $q);
                }
            }
            $this->calculatepriceQuantityProduct($product, $request, $trovato);
            $this->calculateTotalPrice($request);
            return redirect()->back();
        }
    }

    public function calculateTotalPrice($request){
        $totalprice = 0.00;
        $products = $request->session()->get('products');
        $quantity = $request->session()->get('quantity');
        foreach ($products as $k => $product){
            $offer = $this->offer($product);
            if($offer != 0){
                $totalprice += ($offer * $quantity[$k]);
            }else{
                $totalprice += ($product->price * $quantity[$k]);
            }
        }
        $request->session()->put('TotalPrice', number_format($totalprice, 2, ".", ""));
        return ;
    }

    public function calculatepriceQuantityProduct($product, $request, $trovato){
        $products = $request->session()->get('products');
        if($trovato){
            $price = $request->session()->get('price');
            $p = [];
            foreach ($products as $k => $p){
                if($p->cod == $product->cod){
                    $offer = $this->offer($product);
                    $quantity = $request->session()->get('quantity')[$k];
                    if($offer != 0){
                        $total = $quantity * $offer;
                    }else{
                        $total = $quantity * $product->price;
                    }
                    $p = array_replace($price, array($k => number_format($total, 2, ".", "")));
                }
            }
            $request->session()->forget('price');
            $request->session()->put('price', $p);
        }else{
            foreach ($products as $k => $p){
                if($p->cod == $product->cod){
                    $offer = $this->offer($product);
                    $quantity = $request->session()->get('quantity')[$k];
                    if($offer != 0){
                        $total = $quantity * $offer;
                    }else{
                        $total = $quantity * $product->price;
                    }
                    $request->session()->push('price', number_format($total, 2, ".", ""));
                }
            }
        }
        return ;
    }

    function offer($product){
        $prod = Product::where('cod', $product->cod)->first();
        if($prod->offer()->exists()){
            return $prod->offer->calculateDiscount();
        }
        return 0;
    }

    public function removeFromCart(Request $request, $cod){
        $product = Product::where('cod', $cod)->first();
        if(\Auth::check()) {
            auth()->user()->products()->detach($product);
            return redirect()->back();
        }else{
            $products = $request->session()->get('products');
            $quantity = $request->session()->get('quantity');
            $prod = [];
            $qt = [];
            $pr = [];
            foreach ($products as $k => $p){
                if($p->cod != $product->cod){
                    array_push($prod, $p);
                    array_push($qt, $quantity[$k]);
                }
            }
            $request->session()->forget('products');
            $request->session()->forget('quantity');
            $request->session()->forget('price');
            if(!empty($prod)){
                $request->session()->put('products', $prod);
                $request->session()->put('quantity', $qt);
                $this->calculateTotalPrice($request);
                foreach ($prod as $k => $p){
                    if($p->cod != $product->cod){
                        $this->calculatepriceQuantityProduct($p, $request, false);
                    }
                }
            }
            return redirect()->back();
        }
    }

    public function checkout(Request $request)
    {
        $mailing_address_id = 0;
        $mailing_address = "";
        $creditCard_id = 0;
        $credit_Card = "";
        $billing_address_id = 0;
        $billing_address = "";
        $orderHistory_id = 0;
        //Dettaglio spedizione
        if($request->get('shipping_address') == "existing"){
            $mailing_address_id = $request->get('addressShipping_id');
        }else if ($request->get('shipping_address') == "addressInvoice"){
            $mailing_address = "equals";
        }else{
            $address = new Address();
            $address->name = $request->get('nameShipping');
            $address->surname = $request->get('surnameShipping');
            $address->address = $request->get('addressShipping');
            $address->civic_number = $request->get('civicNumberShipping');
            $address->city = $request->get('cityShipping');
            $address->region = $request->get('regionShipping');
            $address->zip = $request->get('zipShipping');

            Auth::user()->addresses()->save($address);

            if ($address->save()){
                $mailing_address_id = $address->id;
            } else {
                $mailing_address = "Error";
                return redirect()->route('Checkout')->with('errorShipping','Errore nel salvataggio dell\'indirizzo di spedizione. Riprovare!!');
            }
        }

        //Metodo di pagamento
        if($request->get('payment_method') == "creditCard"){
            if($request->get('payment_creditCard_method') == "existing"){
                $creditCard_id = $request->get('creditCard_id');
            }else{
                if(CreditCard::where('numberCard', $request->get('numberCard'))->first()){
                    return redirect()->route('Checkout')->with('errorPaymentMethod','La carta di credito già è stata inserita!!');
                }
                $creditCard = new CreditCard();
                $creditCard->numberCard = $request->get('numberCard');
                $creditCard->holderCard = $request->get('holderCard');
                $creditCard->expirationCard = $request->get('month'). "/". $request->get('year');

                Auth::user()->creditCards()->save($creditCard);

                if ($creditCard->save()){
                    $creditCard_id = $creditCard->id;
                } else {
                    $credit_Card = "Error";
                    return redirect()->route('Checkout')->with('errorPaymentMethod','Errore nel salvataggio della carta di credito. Riprovare!!');
                }
            }
        }

        //Indirizzo di fatturazione
        if($request->get('payment_address') == "existing"){
            $billing_address_id = $request->get('addressPayment_id');
        }else if ($request->get('payment_address') == "address"){
            $billing_address = "equals";
        }else{
            $addressPayment = new Address();
            $addressPayment->name = $request->get('name');
            $addressPayment->surname = $request->get('surname');
            $addressPayment->address = $request->get('address');
            $addressPayment->civic_number = $request->get('civicNumber');
            $addressPayment->city = $request->get('city');
            $addressPayment->region = $request->get('region');
            $addressPayment->zip = $request->get('zip');

            Auth::user()->addresses()->save($addressPayment);

            if ($addressPayment->save()){
                $billing_address_id = $addressPayment->id;
            } else {
                $billing_address = "Error";
                return redirect()->route('Checkout')->with('errorPaymentAddress','Errore nel salvataggio dell\'indirizzo di fatturazione. Riprovare!!');
            }
        }

        //Conferma ordine
        $orderHistory = new OrderHistory();
        if($request->get('gift')){
            $orderHistory->gift = 1;
        }else{
            $orderHistory->gift = 0;
        }
        if($credit_Card == "" && $creditCard_id != 0){
            $orderHistory->credit_card_id = $creditCard_id;
        }
        $orderHistory->courier_id = $request->get('courier_id');
        if($mailing_address == "" && $mailing_address_id !=0){
            $orderHistory->mailing_address_id = $mailing_address_id;
            if($billing_address == "equals"){
                $orderHistory->billing_address_id = $mailing_address_id;
            }
        }
        if($billing_address == "" && $billing_address_id !=0){
            $orderHistory->billing_address_id = $billing_address_id;
            if($mailing_address == "equals"){
                $orderHistory->mailing_address_id = $billing_address_id;
            }
        }

        Auth::user()->orderHistories()->save($orderHistory);

        if ($orderHistory->save()){
            $orderHistory_id = $orderHistory->id;

            $products = Auth::user()->productsCart()->get();
            foreach ($products as $product){
                $orderHistoryProduct = new OrderHistoryProduct();
                $orderHistoryProduct->product_id = $product->id;
                $orderHistoryProduct->quantity = $product->pivot->quantity;
                if($product->offer()->exists()){
                    $orderHistoryProduct->price = $product->offer->calculateDiscount();
                }else{
                    $orderHistoryProduct->price = $product->price;
                }
                $orderHistoryProduct->order_history_id = $orderHistory_id;
                if($orderHistoryProduct->save()){
                    $quantity_sold = $product->quantity_sold;
                    $stock_availabilityOld = $product->stock_availability;
                    Product::where('id', $product->id)->update(['quantity_sold' => $quantity_sold + $product->pivot->quantity, 'stock_availability' => $stock_availabilityOld - $product->pivot->quantity]);
                    auth()->user()->productsCart()->detach($product);
                }else{
                    return redirect()->route('Checkout')->with('errorOrder','Impossibile effettuare l\'ordine. Riprovare!!');
                }
            }
        } else {
            return redirect()->route('Checkout')->with('errorOrder','Impossibile effettuare l\'ordine. Riprovare!!');
        }

        //Redirect order success
        if($request->get('payment_method') == "paypal"){
            return redirect()->away('https://www.paypal.com/it/signin');
        }else{
            return redirect()->route('Chronology')->with('success','Ordine effettuato con Successo!!');
        }
    }

}


