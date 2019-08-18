<?php

use App\Category;
use App\Image;
use App\Supplier;
use App\User;
use App\Brand;
use App\Collection;
use App\Product;
use App\Newsletter;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $newsletter1 = new Newsletter(['email' => 'f14e48631f-f65fb0@inbox.mailtrap.io']);
        $newsletter1->save();

        $newsletter2 = new Newsletter(['email' => 'mail1@mail1.it']);
        $newsletter2->save();

        Permission::create(['name'=>'gest_utenti']);
        Permission::create(['name'=>'gest_prodotti']);
        Permission::create(['name'=>'gest_offerte']);
        Permission::create(['name'=>'gest_banner']);
        Permission::create(['name'=>'gest_imgprod']);
        Permission::create(['name'=>'gest_fornitori']);
        Permission::create(['name'=>'gest_newsletter']);

        $cliente = Role::create(['name' => 'cliente']);
        $admin = Role::create(['name' => 'Admin'])->givePermissionTo(Permission::all());
        $manager = Role::create(['name' => 'Manager'])->givePermissionTo(['gest_prodotti','gest_offerte',
                                                                            'gest_banner','gest_imgprod',
                                                                            'gest_fornitori','gest_newsletter']);
        $designer = Role::create(['name' => 'Designer'])->givePermissionTo(['gest_banner','gest_imgprod']);
        $pubblicitario = Role::create(['name'=>'Pubblicitario'])->givePermissionTo(['gest_offerte','gest_banner','gest_newsletter']);


        $utente1 = new User(['name'=>'a', 'email'=>'a@a.it', 'password'=>'aaaaaaaa']);
        $utente1->assignRole($admin)->save();

        $utente2 = new User(['name'=>'b', 'email'=>'b@b.it', 'password'=>'bbbbbbbb']);
        $utente2->assignRole($pubblicitario)->save();

        $utente3 = new User(['name'=>'c', 'email'=>'c@c.it', 'password'=>'cccccccc']);
        $utente3->assignRole($cliente)->save();

        /* Categorie */
        $smart = new Category(['name' => 'Smart']);
        $smart->save();

        $water_resistence = new Category(['name' => 'Water Resistence']);
        $water_resistence->save();

        $classic = new Category(['name' => 'Classic']);
        $classic->save();

        $digital = new Category(['name' => 'Digital']);
        $digital->save();

        $Sport = new Category(['name' => 'Sport']);
        $Sport->save();

        $fornitore1 = new Supplier(['name'=>'fornitore1','email'=>'fornitore1@fornitore.it','phone'=>'1231231231','city'=>'Roma','address'=>'via Milano','zip'=>'00001','iban'=>'123123123123123']);
        $fornitore1->save();
        $fornitore2 = new Supplier(['name'=>'fornitore2','email'=>'fornitore2@fornitore.it','phone'=>'1231231232','city'=>'Milano','address'=>'via Roma','zip'=>'00002','iban'=>'123123123123124']);
        $fornitore2->save();

        /*------------------------------------------------------*/

        /* Fossil */
        $Fossil = new Brand(['name' => 'Fossil','path_logo' => '']);
        $Fossil->save();

        /* Collezioni Fossil */
        $Carlie = new Collection(['name' => 'Carlie']);
        $Fossil->collections()->save($Carlie);

        $Sport = new Collection(['name' => 'Sport']);
        $Fossil->collections()->save($Sport);

        $Q_Explorist = new Collection(['name' => 'Q Explorist']);
        $Fossil->collections()->save($Q_Explorist);

        /* Prodotti Fossil */
        $CarlieP1 = new Product(['cod' => 'ES4432','price' => '109', 'stock_availability' => '24',
            'genre' => 'F','long_desc' => 'long desc','color' => 'Bianco']);
        $CarlieP1I1 = new Image(['path_image' => 'Fossil/Charlie/Fossil_Carlie_Bianco_1.jpg', 'main' => '1']);
        $CarlieP1->collection_id = $Carlie->id;
        $CarlieP1->supplier_id = $fornitore1->id;
        $CarlieP1->save();
        $CarlieP1->categories()->save($classic);
        $CarlieP1->images()->save($CarlieP1I1);
        $Carlie->products()->save($CarlieP1);

        $CarlieP2 = new Product(['cod' => 'ES4433','price' => '109', 'stock_availability' => '5',
            'genre' => 'F','long_desc' => 'long desc','color' => 'Rosa']);
        $CarlieP2I1 = new Image(['path_image' => 'Fossil/Charlie/Fossil_Carlie_Rosa_1.jpg', 'main' => '1']);
        $CarlieP2->collection_id = $Carlie->id;
        $CarlieP2->supplier_id = $fornitore1->id;
        $CarlieP2->save();
        $CarlieP2->categories()->save($classic);
        $CarlieP2->images()->save($CarlieP2I1);
        $Carlie->products()->save($CarlieP2);

        $CarlieP3 = new Product(['cod' => 'ES4488','price' => '149', 'stock_availability' => '5',
            'genre' => 'F','long_desc' => 'long desc','color' => 'Nero']);
        $CarlieP3I1 = new Image(['path_image' => 'Fossil/Charlie/Fossil_Carlie_Nero_1.jpg', 'main' => '1']);
        $CarlieP3I2 = new Image(['path_image' => 'Fossil/Charlie/Fossil_Carlie_Nero_2.jpg', 'main' => '0']);
        $CarlieP3I3 = new Image(['path_image' => 'Fossil/Charlie/Fossil_Carlie_Nero_3.jpg', 'main' => '0']);
        $CarlieP3->collection_id = $Carlie->id;
        $CarlieP3->supplier_id = $fornitore1->id;
        $CarlieP3->save();
        $CarlieP3->categories()->save($classic);
        $CarlieP3->images()->save($CarlieP3I1);
        $CarlieP3->images()->save($CarlieP3I2);
        $CarlieP3->images()->save($CarlieP3I3);
        $Carlie->products()->save($CarlieP3);

        $Sport1P1 = new Product(['cod' => 'FT6024','price' => '249', 'stock_availability' => '12',
            'genre' => 'U','long_desc' => 'long desc','color' => 'Nero']);
        $SportP1I1 = new Image(['path_image' => 'Fossil/Charlie/Fossil_Sport_Nero_1.jpg', 'main' => '1']);
        $Sport1P1->collection_id = $Sport->id;
        $Sport1P1->supplier_id = $fornitore1->id;
        $Sport1P1->save();
        $Sport1P1->categories()->save($smart);
        $Sport1P1->images()->save($SportP1I1);
        $Sport->products()->save($Sport1P1);


        /* Lacoste */
        $Lacoste = new Brand(['name' => 'Lacoste','path_logo' => '']);
        $Lacoste->save();

        /* Collezioni Lacoste */
        $Moon = new Collection(['name' => 'Moon']);
        $Lacoste->collections()->save($Moon);

        $Lacoste_12_12 = new Collection(['name' => 'Lacoste 12.12']);
        $Lacoste->collections()->save($Lacoste_12_12);

        /* Prodotti Lacoste */
        $Lacoste_12_12_P1 = new Product(['cod' => 'LC7905','price' => '99', 'stock_availability' => '6',
            'genre' => 'M','long_desc' => 'long desc','color' => 'Blu']);
        $Lacoste_12_12_P1I1 = new Image(['path_image' => 'Lacoste/12.12/Lacoste_12.12_Blu_1.jpg', 'main' => '1']);
        $Lacoste_12_12_P1->collection_id = $Lacoste_12_12->id;
        $Lacoste_12_12_P1->supplier_id = $fornitore1->id;
        $Lacoste_12_12_P1->save();
        $Lacoste_12_12_P1->categories()->save($classic);
        $Lacoste_12_12_P1->images()->save($Lacoste_12_12_P1I1);
        $Lacoste_12_12->products()->save($Lacoste_12_12_P1);


        /* Tissot */
        $Tissot = new Brand(['name' => 'Tissot','path_logo' => '']);
        $Tissot->save();

        /* Collezioni Tissot */
        $Lovely = new Collection(['name' => 'Lovely']);
        $Tissot->collections()->save($Lovely);

        $Chrono = new Collection(['name' => 'Chrono']);
        $Tissot->collections()->save($Chrono);

        /* Wellington */
        $Wellington = new Brand(['name' => 'Wellington','path_logo' => '']);
        $Wellington->save();

        /* Collezioni Wellington */
        $Roselyn = new Collection(['name' => 'Roselyn']);
        $Wellington->collections()->save($Roselyn);

        $Sheffield = new Collection(['name' => 'Sheffield']);
        $Wellington->collections()->save($Sheffield);

        $Bayswater = new Collection(['name' => 'Bayswater']);
        $Wellington->collections()->save($Bayswater);

        /* Diesel */
        $Diesel = new Brand(['name' => 'Diesel','path_logo' => '']);
        $Diesel->save();

        /* Collezioni Diesel */
        $Double_Down_P44 = new Collection(['name' => 'Double Down P44']);
        $Diesel->collections()->save($Double_Down_P44);


/*
        $brand2 = new Brand(['name' => 'Brand2']);
        $brand2->save();
        $collection1b2 = new Collection(['name' => 'Col1B2']);
        $brand2->collections()->save($collection1b2);

        $collection2b2 = new Collection(['name' => 'Col2B2']);
        $brand2->collections()->save($collection2b2);

        $product1c1b2 = new Product(['cod' => '1234589','name' => 'p1c1b2','price' => '','stock_availability' => '',
                                        'genere' => '','long_desc' => '','color' => '']);
        $product1c1b2->collection($collection1b1);
        $product1c1b2->categories();
        $product1c1b2->supplier();
        $collection1b2->products()->save($product1c1b2);

        $product2c1b2 = new Product(['cod' => '1234580','name' => 'p2c1b2','collection_id' => '','price' => '',
            'stock_availability' => '','genere' => '','long_desc' => '','category_id' => '','supplier_id' => '','color' => '']);
        $collection1b2->products()->save($product2c1b2);

        $product1c2b2 = new Product(['cod' => '1234581','name' => 'p1c2b2','collection_id' => '','price' => '',
            'stock_availability' => '','genere' => '','long_desc' => '','category_id' => '','supplier_id' => '','color' => '']);
        $collection2b2->products()->save($product1c2b2);
*/
    }
}
