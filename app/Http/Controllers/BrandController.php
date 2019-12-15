<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Collection;
use App\Banner;
use App\Product;

class BrandController extends Controller
{

    public function showListForm()
    {
        $brands = Brand::withTrashed()->get();
        return view('backend.brand.list', ['brands' => $brands]);
    }

    public function showImage($name)
    {
        $brand = Brand::where('name', $name)->first();
        return view('backend.brand.showimage', ['brand' => $brand]);
    }

    public function showAddForm()
    {
        return view('backend.brand.add');
    }

    public function showEditForm()
    {
        if (Brand::withoutTrashed()->exists()){
            $brands = Brand::all();
            return view('backend.brand.edit',['brands' => $brands]);
        } else {
            return redirect()->to('Admin/Brand/List')->with('error','Non ci sono Brand da Modificare!!');
        }
    }

    public function showEditFormButton($name)
    {
        if (Brand::withoutTrashed()->exists()){
            $selected_brand = Brand::where('name',$name)->first();
            $brands = Brand::all();
            return view('backend.brand.edit',['brands' => $brands,'selected_brand' => $selected_brand]);
        } else {
            return redirect()->to('Admin/Brand/List')->with('error','Non ci sono Brand da Modificare!!');
        }
    }

    public function showRestoreForm()
    {
        if (Brand::onlyTrashed()->exists()){
            $brands = Brand::onlyTrashed()->get();
            return view('backend.brand.restore',['brands' => $brands]);
        } else {
            return redirect()->to('Admin/Brand/List')->with('error','Non ci sono Brand da Ripristinare!!');
        }
    }

    public function showDeleteForm()
    {
        if (Brand::withoutTrashed()->exists()){
            $brands = Brand::all();
            return view('backend.brand.delete', ['brands' => $brands]);
        } else {
            return redirect()->to('Admin/Brand/List')->with('error','Non ci sono Brand da Eliminare!!');
        }
    }


    public function create(Request $request)
    {
        if (Brand::where('name', $request->newbrand)->first()) {
            return redirect()->to('Admin/Brand/List')->with('error', 'Il Brand già esiste!!');
        } else {
            if ($request->hasFile('logo')) { //  se il file è presente nella request
                if ($request->file('logo')->isValid()) { // verificare che non si siano verificati problemi durante il caricamento del file
                    $path = 'public/Logo';
                    if (!(Storage::exists($path))) {
                        Storage::makeDirectory($path);
                    }
                    $nameBrand = $request->get('newbrand');
                    $filename = 'Logo_' . $nameBrand . '.png';
                    $path_logo = 'storage/Logo/' . $filename;
                    $pathnew = $request->file('logo')->storeAs($path, $filename);
                    if ($pathnew != "") {
                        $brand = new Brand();
                        $brand->name = $nameBrand;
                        $brand->path_logo = $path_logo;
                        if($brand->save()){
                            return redirect()->to('Admin/Brand/List')->with('success', 'Caricamento avvenuto con successo!!');
                        }else{
                            return redirect()->to('Admin/Brand/List')->with('error', 'Errore durante il caricamento. Riprovare!!!!');
                        }
                    }else{
                        return redirect()->to('Admin/Brand/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
                    }
                } else {
                    return redirect()->to('Admin/Brand/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
                }
            } else {
                return redirect()->to('Admin/Brand/List')->with('error', 'File non trovato. Riprovare!!');
            }
        }
    }

    public function update(Request $request)
    {
        //se brand e newname sono uguali ->effettua mod // altrimenti se new name gia esiste errore ma se non esite ok
        if (Brand::where('id', $request->brand)->first()->name == $request->newname) {
            //effettua mod
            if ($this->saveFile($request)){
                return redirect()->to('Admin/Brand/List')->with('success', 'Modifiche avvenute con successo!!');
            } else {
                return redirect()->to('Admin/Brand/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
            }
        } else {
            if (Brand::where('name', $request->newname)->first()) {
                return redirect()->to('Admin/Brand/List')->with('error', 'Esiste già un Brand con il nome inserito!!');
            }
            if ($this->saveFile($request)){
                return redirect()->to('Admin/Brand/List')->with('success', 'Modifiche avvenute con successo!!');
            } else {
                return redirect()->to('Admin/Brand/List')->with('error', 'Errore durante il caricamento. Riprovare!!');
            }
        }
    }

    public function saveFile(Request $request)
    {
        $id = $request->brand;
        $b = Brand::where('id', $id)->first();
        $oldname = $b->name;
        $path = 'public/Logo/Logo_'. $oldname. '.png';
        Storage::delete($path);

        if ($request->hasFile('logo')) { //  se il file è presente nella request
            if ($request->file('logo')->isValid()) { // verificare che non si siano verificati problemi durante il caricamento del file
                $path = 'public/Logo';
                if (!(Storage::exists($path))) {
                    Storage::makeDirectory($path);
                }
                $nameBrand = $request->get('newname');
                $filename = 'Logo_' . $nameBrand . '.png';
                $path_logo = 'storage/Logo/' . $filename;
                $pathnew = $request->file('logo')->storeAs($path, $filename);
                if ($pathnew != "") {
                    if (Brand::where('id', $id)->update(['name' => $nameBrand, 'path_logo' => $path_logo])){
                        return true;
                    }else{
                        return false;
                    }
                }else{
                    return false;
                }
            } else {
                return false;
            }
        }
    }


    public function restore(Request $request)   //query senza nome
    {
        if (Brand::where('id',$request->brand)->restore()) {
            return redirect()->to('Admin/Brand/List')->with('success', 'Ripristino avvenuto con successo!!');
        } else {
            return redirect()->to('Admin/Brand/List')->with('error', 'Errore durante il Ripristino. Riprovare!!');
        }
    }

    public function restoreButton($name)   //query senza nome
    {
        if (Brand::where('name',$name)->restore()) {
            return redirect()->back()->with('success', 'Ripristino avvenuto con successo!!');
        } else {
            return redirect()->back()->with('error', 'Errore durante il Ripristino. Riprovare!!');
        }
    }

    public function destroy(Request $request)
    {
        $brand = Brand::where('id',$request->get('brand'))->first();

        if(Collection::withoutTrashed()->where('brand_id',$brand->id)->exists()){
            $collections = Collection::withoutTrashed()->where('brand_id',$brand->id)->get();
            foreach ($collections as $collection){

                if(Product::withoutTrashed()->where('collection_id', $collection->id)->exists()){
                    $products = Product::withoutTrashed()->where('collection_id', $collection->id)->get();
                    foreach ($products as $product){
                        if($product->offer) {
                            if (!($product->offer->delete())) {
                                return redirect()->to('Admin/Brand/List')->with('error', 'Errore durante l\'Eliminazione, Riprovare!!');
                            }
                        }
                    }
                }

                if(Banner::withoutTrashed()->where('collection_id', $collection->id)->exists()){
                    //esiste banner per quella collection
                    $types = [];
                    if(Banner::withoutTrashed()->where('collection_id', $collection->id)->where('visible', true)->count('visible')) {
                        //esiste banner per quella collection VISIBILE
                        if(Banner::withoutTrashed()->where('type', 'Main')->where('visible', true)->count('visible') == 1){
                            //qui solo se è attivo un SOLO banner per tipo - devo controllare se quello che sto eliminando è lo stesso che è attivo
                            array_push($types,'Main');
                        }
                        if(Banner::withoutTrashed()->where('type', 'Sub')->where('visible', true)->count('visible') == 1){
                            array_push($types,'Sub');
                        }
                        if(Banner::withoutTrashed()->where('type', 'Mini')->where('visible', true)->count('visible') == 1){
                            array_push($types,'Mini');
                        }
                    }
                    foreach ($types as $type){    //analizzo solo le situazioni di rischio
                        $countVisibleTot = Banner::withoutTrashed()->where('type', $type)->where('visible', true)->count('visible');
                        $coutnVisibleCollection = Banner::withoutTrashed()->where('type', $type)->where('visible', true)->where('collection_id',$collection->id)->count('visible');
                        $countVisible = $countVisibleTot - $coutnVisibleCollection;
                        if($countVisible<=1) {
                            return redirect()->to('Admin/Brand/List')->with('error', 'Errore durante l\'Eliminazione. Almeno un Banner di Tipo '. $type. ' deve rimanere Visibile dopo l\'eliminazione!!');
                        }
                    }
                    if(! Banner::withTrashed()->where('collection_id',$collection->id)->update(['visible' => false])) {
                        return redirect()->to('Admin/Brand/List')->with('error', 'Errore durante l\'Eliminazione, Riprovare!!');
                    }
                }
            }
            if (Brand::withTrashed()->find($brand->id)->delete()) {
                return redirect()->to('Admin/Brand/List')->with('success', 'Eliminazione avvenuta con successo!!');
            } else {
                return redirect()->to('Admin/Brand/List')->with('error', 'Errore durante l\'Eliminazione, Riprovare!!');
            }
        }else{
            if (Brand::withTrashed()->find($brand->id)->delete()) {
                return redirect()->to('Admin/Brand/List')->with('success', 'Eliminazione avvenuta con successo!!');
            } else {
                return redirect()->to('Admin/Brand/List')->with('error', 'Errore durante l\'Eliminazione, Riprovare!!');
            }
        }
    }

    public function destroyButton($name)
    {
        $brand = Brand::where('name',$name)->first();

        if(Collection::withoutTrashed()->where('brand_id',$brand->id)->exists()){
            $collections = Collection::withoutTrashed()->where('brand_id',$brand->id)->get();
            foreach ($collections as $collection){

                if(Product::withoutTrashed()->where('collection_id', $collection->id)->exists()){
                    $products = Product::withoutTrashed()->where('collection_id', $collection->id)->get();
                    foreach ($products as $product){
                        if($product->offer) {
                            if (!($product->offer->delete())) {
                                return redirect()->to('Admin/Brand/List')->with('error', 'Errore durante l\'Eliminazione, Riprovare!!');
                            }
                        }
                    }
                }

                if(Banner::withoutTrashed()->where('collection_id', $collection->id)->exists()){
                    //esiste banner per quella collection
                    $types = [];
                    if(Banner::withoutTrashed()->where('collection_id', $collection->id)->where('visible', true)->count('visible')) {
                        //esiste banner per quella collection VISIBILE
                        if(Banner::withoutTrashed()->where('type', 'Main')->where('visible', true)->count('visible') == 1){
                            //qui solo se è attivo un SOLO banner per tipo - devo controllare se quello che sto eliminando è lo stesso che è attivo
                            array_push($types,'Main');
                        }
                        if(Banner::withoutTrashed()->where('type', 'Sub')->where('visible', true)->count('visible') == 1){
                            array_push($types,'Sub');
                        }
                        if(Banner::withoutTrashed()->where('type', 'Mini')->where('visible', true)->count('visible') == 1){
                            array_push($types,'Mini');
                        }
                    }
                    foreach ($types as $type){    //analizzo solo le situazioni di rischio
                        $countVisibleTot = Banner::withoutTrashed()->where('type', $type)->where('visible', true)->count('visible');
                        $coutnVisibleCollection = Banner::withoutTrashed()->where('type', $type)->where('visible', true)->where('collection_id',$collection->id)->count('visible');
                        $countVisible = $countVisibleTot - $coutnVisibleCollection;
                        if($countVisible<=1) {
                            return redirect()->to('Admin/Brand/List')->with('error', 'Errore durante l\'Eliminazione. Almeno un Banner di Tipo '. $type. ' deve rimanere Visibile dopo l\'eliminazione!!');
                        }
                    }
                    if(! Banner::withTrashed()->where('collection_id',$collection->id)->update(['visible' => false])) {
                        return redirect()->to('Admin/Brand/List')->with('error', 'Errore durante l\'Eliminazione, Riprovare!!');
                    }
                }
            }
            if (Brand::withTrashed()->find($brand->id)->delete()) {
                return redirect()->to('Admin/Brand/List')->with('success', 'Eliminazione avvenuta con successo!!');
            } else {
                return redirect()->to('Admin/Brand/List')->with('error', 'Errore durante l\'Eliminazione, Riprovare!!');
            }
        }else{
            if (Brand::withTrashed()->find($brand->id)->delete()) {
                return redirect()->to('Admin/Brand/List')->with('success', 'Eliminazione avvenuta con successo!!');
            } else {
                return redirect()->to('Admin/Brand/List')->with('error', 'Errore durante l\'Eliminazione, Riprovare!!');
            }
        }
    }

    public function getSevenBrandMoreSent()
    {
        $brands = Brand::all();
        $data = [];
        foreach ($brands as $brand){
            $collections = Collection::where('brand_id', $brand->id)->get();
            $brandsCount = 0;
            foreach ($collections as $collection){
                $collectionsCount = Product::where('quantity_sold', '>' , 0)->where('collection_id', $collection->id)->sum('quantity_sold');
                $brandsCount += $collectionsCount;
            }
            if($brandsCount != 0){
                $obj = ['label' => $brand->name, 'data' => $brandsCount];
                array_push($data, $obj);
            }
        }
        return $data;
    }
}
