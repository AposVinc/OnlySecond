<?php

use App\Category;
use App\Color;
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

class
DatabaseSeeder extends Seeder
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
        Permission::create(['name'=>'gest_assistenza']);


        $cliente = Role::create(['name' => 'cliente']);
        $admin = Role::create(['name' => 'Admin'])->givePermissionTo(Permission::all());
        $manager = Role::create(['name' => 'Manager'])->givePermissionTo(['gest_prodotti','gest_offerte',
                                                                            'gest_banner','gest_imgprod',
                                                                            'gest_fornitori','gest_newsletter']);
        $designer = Role::create(['name' => 'Designer'])->givePermissionTo(['gest_banner','gest_imgprod']);
        $pubblicitario = Role::create(['name'=>'Pubblicitario'])->givePermissionTo(['gest_offerte','gest_banner','gest_newsletter']);
        $assistenza = Role::create(['name'=>'Assistenza Clienti'])->givePermissionTo(['gest_assistenza']);


        $utente1 = new User(['name'=>'a', 'email'=>'a@a.it', 'password'=>'aaaaaaaa']);
        $utente1->assignRole($admin)->save();

        $utente2 = new User(['name'=>'b', 'email'=>'b@b.it', 'password'=>'bbbbbbbb']);
        $utente2->assignRole($pubblicitario)->save();

        $utente3 = new User(['name'=>'c', 'email'=>'c@c.it', 'password'=>'cccccccc']);
        $utente3->assignRole($assistenza)->save();

        $utente4 = new User(['name'=>'d', 'email'=>'d@d.it', 'password'=>'dddddddd']);
        $utente4->assignRole($cliente)->save();



        /* Categorie */
        $smart = new Category(['name' => 'Smart']);                         $smart->save();
        $water_resistence = new Category(['name' => 'Water Resistence']);   $water_resistence->save();
        $classic = new Category(['name' => 'Classic']);                     $classic->save();
        $digital = new Category(['name' => 'Digital']);                     $digital->save();
        $Sport = new Category(['name' => 'Sport']);                         $Sport->save();

        /* Colori */
        $argento = new Color(['name'=>'Argento' , 'hex' => '#c0c0c0']);     $argento->save();
        $oro = new Color(['name'=>'Oro' , 'hex' => '#daa520']);             $oro->save();
        $bianco = new Color(['name'=>'Bianco' , 'hex' => '#ffffff']);       $bianco->save();
        $nero = new Color(['name'=>'Nero' , 'hex' => '#000000']);           $nero->save();
        $grigio = new Color(['name'=>'Grigio' , 'hex' => '#808080']);       $grigio->save();
        $rosa = new Color(['name'=>'Rosa' , 'hex' => '#ff99cc']);           $rosa->save();
        $blu = new Color(['name'=>'Blu' , 'hex' => '#0033cc']);             $blu->save();
        $verde = new Color(['name'=>'Verde' , 'hex' => '#15a813']) ;        $verde->save();
        $marrone = new Color(['name'=>'Marrone' , 'hex' => '#8B4513']);     $marrone->save();


        /* Fornitori */
        $fornitore1 = new Supplier(['name'=>'fornitore1','email'=>'fornitore1@fornitore.it','phone'=>'1231231231','city'=>'Roma','address'=>'via Milano','zip'=>'00001','iban'=>'123123123123123']);
        $fornitore1->save();
        $fornitore2 = new Supplier(['name'=>'fornitore2','email'=>'fornitore2@fornitore.it','phone'=>'1231231232','city'=>'Milano','address'=>'via Roma','zip'=>'00002','iban'=>'123123123123124']);
        $fornitore2->save();

        /*------------------------------------------------------*/

        /* Diesel */
        $Diesel = new Brand(['name' => 'Diesel','path_logo' => 'storage/Logo/Logo_Diesel.png']);
        $Diesel->save();

        /* Collezioni Diesel */
        $Double_Down_P44 = new Collection(['name' => 'Double Down P44']);
        $Diesel->collections()->save($Double_Down_P44);

        /* Prodotti Diesel */
        $Double_Down_P44P1 = new Product(['cod' => 'DZ1436','price' => '89', 'stock_availability' => '10',
            'genre' => 'U','long_desc' => 'long desc']);
        $Double_Down_P44P1I1 = new Image(['path_image' => 'storage/Orologi/Diesel/Double Down P44/Diesel_Double Down P44_Nero_1.jpg', 'main' => '1']);
        $Double_Down_P44P1I2 = new Image(['path_image' => 'storage/Orologi/Diesel/Double Down P44/Diesel_Double Down P44_Nero_2.jpg', 'main' => '0']);
        $Double_Down_P44P1I3 = new Image(['path_image' => 'storage/Orologi/Diesel/Double Down P44/Diesel_Double Down P44_Nero_3.jpg', 'main' => '0']);
        $Double_Down_P44P1->collection_id = $Diesel->id;
        $Double_Down_P44P1->supplier_id = $fornitore2->id;
        $Double_Down_P44P1->color_id = $nero->id;
        $Double_Down_P44P1->save();
        $Double_Down_P44P1->categories()->save($classic);
        $Double_Down_P44P1->images()->save($Double_Down_P44P1I1);
        $Double_Down_P44P1->images()->save($Double_Down_P44P1I2);
        $Double_Down_P44P1->images()->save($Double_Down_P44P1I3);
        $Double_Down_P44->products()->save($Double_Down_P44P1);



        /* Fossil */
        $Fossil = new Brand(['name' => 'Fossil','path_logo' => 'storage/Logo/Logo_Fossil.png']);
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
            'genre' => 'F','long_desc' => 'long desc']);
        $CarlieP1I1 = new Image(['path_image' => 'storage/Orologi/Fossil/Carlie/Fossil_Carlie_Argento_1.jpg', 'main' => '1']);
        $CarlieP1->collection_id = $Carlie->id;
        $CarlieP1->supplier_id = $fornitore1->id;
        $CarlieP1->color_id = $argento->id;
        $CarlieP1->save();
        $CarlieP1->categories()->save($classic);
        $CarlieP1->images()->save($CarlieP1I1);
        $Carlie->products()->save($CarlieP1);

        $CarlieP2 = new Product(['cod' => 'ES4433','price' => '109', 'stock_availability' => '5',
            'genre' => 'F','long_desc' => 'long desc']);
        $CarlieP2I1 = new Image(['path_image' => 'storage/Orologi/Fossil/Carlie/Fossil_Carlie_Rosa_1.jpg', 'main' => '1']);
        $CarlieP2->collection_id = $Carlie->id;
        $CarlieP2->supplier_id = $fornitore1->id;
        $CarlieP2->color_id = $rosa->id;
        $CarlieP2->save();
        $CarlieP2->categories()->save($classic);
        $CarlieP2->images()->save($CarlieP2I1);
        $Carlie->products()->save($CarlieP2);

        $CarlieP3 = new Product(['cod' => 'ES4488','price' => '149', 'stock_availability' => '5',
            'genre' => 'F','long_desc' => 'long desc']);
        $CarlieP3I1 = new Image(['path_image' => 'storage/Orologi/Fossil/Carlie/Fossil_Carlie_Nero_1.jpg', 'main' => '1']);
        $CarlieP3I2 = new Image(['path_image' => 'storage/Orologi/Fossil/Carlie/Fossil_Carlie_Nero_2.jpg', 'main' => '0']);
        $CarlieP3I3 = new Image(['path_image' => 'storage/Orologi/Fossil/Carlie/Fossil_Carlie_Nero_3.jpg', 'main' => '0']);
        $CarlieP3->collection_id = $Carlie->id;
        $CarlieP3->supplier_id = $fornitore1->id;
        $CarlieP3->color_id = $nero->id;
        $CarlieP3->save();
        $CarlieP3->categories()->save($classic);
        $CarlieP3->images()->save($CarlieP3I1);
        $CarlieP3->images()->save($CarlieP3I2);
        $CarlieP3->images()->save($CarlieP3I3);
        $Carlie->products()->save($CarlieP3);

        $SportP1 = new Product(['cod' => 'FT6024','price' => '249', 'stock_availability' => '12',
            'genre' => 'U','long_desc' => 'long desc']);
        $SportP1I1 = new Image(['path_image' => 'storage/Orologi/Fossil/Sport/Fossil_Sport_Nero_1.jpg', 'main' => '1']);
        $SportP1I2 = new Image(['path_image' => 'storage/Orologi/Fossil/Sport/Fossil_Sport_Nero_2.jpg', 'main' => '0']);
        $SportP1I3 = new Image(['path_image' => 'storage/Orologi/Fossil/Sport/Fossil_Sport_Nero_3.jpg', 'main' => '0']);
        $SportP1->collection_id = $Sport->id;
        $SportP1->supplier_id = $fornitore1->id;
        $SportP1->color_id = $nero->id;
        $SportP1->save();
        $SportP1->categories()->save($smart);
        $SportP1->images()->save($SportP1I1);
        $SportP1->images()->save($SportP1I2);
        $SportP1->images()->save($SportP1I3);
        $Sport->products()->save($SportP1);

        $SportP2 = new Product(['cod' => 'FT6028','price' => '249', 'stock_availability' => '2',
            'genre' => 'U','long_desc' => 'long desc']);
        $SportP2I1 = new Image(['path_image' => 'storage/Orologi/Fossil/Sport/Fossil_Sport_Rosa_1.jpg', 'main' => '1']);
        $SportP2I2 = new Image(['path_image' => 'storage/Orologi/Fossil/Sport/Fossil_Sport_Rosa_2.jpg', 'main' => '0']);
        $SportP2I3 = new Image(['path_image' => 'storage/Orologi/Fossil/Sport/Fossil_Sport_Rosa_3.jpg', 'main' => '0']);
        $SportP2->collection_id = $Sport->id;
        $SportP2->supplier_id = $fornitore1->id;
        $SportP2->color_id = $rosa->id;
        $SportP2->save();
        $SportP2->categories()->save($smart);
        $SportP2->images()->save($SportP2I1);
        $SportP2->images()->save($SportP2I2);
        $SportP2->images()->save($SportP2I3);
        $Sport->products()->save($SportP2);

        $Q_ExploristP1 = new Product(['cod' => 'FT4012','price' => '239', 'stock_availability' => '16',
            'genre' => 'U','long_desc' => 'long desc']);
        $Q_ExploristP1I1 = new Image(['path_image' => 'storage/Orologi/Fossil/Q Explorist/Fossil_Q Explorist_Grigio_1.jpg', 'main' => '1']);
        $Q_ExploristP1I2 = new Image(['path_image' => 'storage/Orologi/Fossil/Q Explorist/Fossil_Q Explorist_Grigio_2.jpg', 'main' => '0']);
        $Q_ExploristP1I3 = new Image(['path_image' => 'storage/Orologi/Fossil/Q Explorist/Fossil_Q Explorist_Grigio_3.jpg', 'main' => '0']);
        $Q_ExploristP1->collection_id = $Q_Explorist->id;
        $Q_ExploristP1->supplier_id = $fornitore1->id;
        $Q_ExploristP1->color_id = $grigio->id;
        $Q_ExploristP1->save();
        $Q_ExploristP1->categories()->save($smart);
        $Q_ExploristP1->images()->save($Q_ExploristP1I1);
        $Q_ExploristP1->images()->save($Q_ExploristP1I2);
        $Q_ExploristP1->images()->save($Q_ExploristP1I3);
        $Q_Explorist->products()->save($Q_ExploristP1);

        $Q_ExploristP2 = new Product(['cod' => 'FT4015','price' => '239', 'stock_availability' => '4',
            'genre' => 'U','long_desc' => 'long desc']);
        $Q_ExploristP2I1 = new Image(['path_image' => 'storage/Orologi/Fossil/Q Explorist/Fossil_Q Explorist_Marrone_1.jpg', 'main' => '1']);
        $Q_ExploristP2->collection_id = $Q_Explorist->id;
        $Q_ExploristP2->supplier_id = $fornitore1->id;
        $Q_ExploristP2->color_id = $marrone->id;
        $Q_ExploristP2->save();
        $Q_ExploristP2->categories()->save($smart);
        $Q_ExploristP2->images()->save($Q_ExploristP2I1);
        $Q_Explorist->products()->save($Q_ExploristP2);

        $Q_ExploristP3 = new Product(['cod' => 'FT4016','price' => '239', 'stock_availability' => '5',
            'genre' => 'U','long_desc' => 'long desc']);
        $Q_ExploristP3I1 = new Image(['path_image' => 'storage/Orologi/Fossil/Q Explorist/Fossil_Q Explorist_Nero_1.jpg', 'main' => '1']);
        $Q_ExploristP3->collection_id = $Q_Explorist->id;
        $Q_ExploristP3->supplier_id = $fornitore1->id;
        $Q_ExploristP3->color_id = $nero->id;
        $Q_ExploristP3->save();
        $Q_ExploristP3->categories()->save($smart);
        $Q_ExploristP3->images()->save($Q_ExploristP3I1);
        $Q_Explorist->products()->save($Q_ExploristP3);

        $Q_ExploristP4 = new Product(['cod' => 'FT4019','price' => '239', 'stock_availability' => '6',
            'genre' => 'U','long_desc' => 'long desc']);
        $Q_ExploristP4I1 = new Image(['path_image' => 'storage/Orologi/Fossil/Q Explorist/Fossil_Q Explorist_Rosa_1.jpg', 'main' => '1']);
        $Q_ExploristP4I2 = new Image(['path_image' => 'storage/Orologi/Fossil/Q Explorist/Fossil_Q Explorist_Rosa_2.jpg', 'main' => '0']);
        $Q_ExploristP4I3 = new Image(['path_image' => 'storage/Orologi/Fossil/Q Explorist/Fossil_Q Explorist_Rosa_3.jpg', 'main' => '0']);
        $Q_ExploristP4->collection_id = $Q_Explorist->id;
        $Q_ExploristP4->supplier_id = $fornitore1->id;
        $Q_ExploristP4->color_id = $rosa->id;
        $Q_ExploristP4->save();
        $Q_ExploristP4->categories()->save($smart);
        $Q_ExploristP4->images()->save($Q_ExploristP4I1);
        $Q_ExploristP4->images()->save($Q_ExploristP4I2);
        $Q_ExploristP4->images()->save($Q_ExploristP4I3);
        $Q_Explorist->products()->save($Q_ExploristP4);



        /* Lacoste */
        $Lacoste = new Brand(['name' => 'Lacoste','path_logo' => 'storage/Logo/Logo_Lacoste.png']);
        $Lacoste->save();

        /* Collezioni Lacoste */
        $Lacoste_Moon = new Collection(['name' => 'Moon']);
        $Lacoste->collections()->save($Lacoste_Moon);

        $Lacoste_12_12 = new Collection(['name' => '12.12']);
        $Lacoste->collections()->save($Lacoste_12_12);

        /* Prodotti Lacoste */
        $Lacoste_12_12_P1 = new Product(['cod' => 'LC7905','price' => '99', 'stock_availability' => '6',
            'genre' => 'M','long_desc' => 'long desc']);
        $Lacoste_12_12_P1I1 = new Image(['path_image' => 'storage/Orologi/Lacoste/12.12/Lacoste_12.12_Blu_1.jpg', 'main' => '1']);
        $Lacoste_12_12_P1I2 = new Image(['path_image' => 'storage/Orologi/Lacoste/12.12/Lacoste_12.12_Blu_2.jpg', 'main' => '0']);
        $Lacoste_12_12_P1I3 = new Image(['path_image' => 'storage/Orologi/Lacoste/12.12/Lacoste_12.12_Blu_3.jpg', 'main' => '0']);
        $Lacoste_12_12_P1->collection_id = $Lacoste_12_12->id;
        $Lacoste_12_12_P1->supplier_id = $fornitore2->id;
        $Lacoste_12_12_P1->color_id = $blu->id;
        $Lacoste_12_12_P1->save();
        $Lacoste_12_12_P1->categories()->save($classic);
        $Lacoste_12_12_P1->images()->save($Lacoste_12_12_P1I1);
        $Lacoste_12_12_P1->images()->save($Lacoste_12_12_P1I2);
        $Lacoste_12_12_P1->images()->save($Lacoste_12_12_P1I3);
        $Lacoste_12_12->products()->save($Lacoste_12_12_P1);

        $Lacoste_12_12_P2 = new Product(['cod' => 'LC7907', 'price' => '99', 'stock_availability' => '8',
            'genre' => 'M', 'long_desc' => 'long desc']);
        $Lacoste_12_12_P2I1 = new Image(['path_image' => 'storage/Orologi/Lacoste/12.12/Lacoste_12.12_Verde_1.jpg', 'main' => '1']);
        $Lacoste_12_12_P2I2 = new Image(['path_image' => 'storage/Orologi/Lacoste/12.12/Lacoste_12.12_Verde_2.jpg', 'main' => '0']);
        $Lacoste_12_12_P2I3 = new Image(['path_image' => 'storage/Orologi/Lacoste/12.12/Lacoste_12.12_Verde_3.jpg', 'main' => '0']);
        $Lacoste_12_12_P2->collection_id = $Lacoste_12_12->id;
        $Lacoste_12_12_P2->supplier_id = $fornitore2->id;
        $Lacoste_12_12_P2->color_id = $verde->id;
        $Lacoste_12_12_P2->save();
        $Lacoste_12_12_P2->categories()->save($classic);
        $Lacoste_12_12_P2->images()->save($Lacoste_12_12_P2I1);
        $Lacoste_12_12_P2->images()->save($Lacoste_12_12_P2I2);
        $Lacoste_12_12_P2->images()->save($Lacoste_12_12_P2I3);
        $Lacoste_12_12->products()->save($Lacoste_12_12_P2);


        $Lacoste_Moon_P1 = new Product(['cod' => 'LCM233', 'price' => '139', 'stock_availability' => '12',
            'genre' => 'F', 'long_desc' => 'long desc']);
        $Lacoste_Moon_P1I1 = new Image(['path_image' => 'storage/Orologi/Lacoste/Moon/Lacoste_Moon_Blu_1.jpg', 'main' => '1']);
        $Lacoste_Moon_P1I2 = new Image(['path_image' => 'storage/Orologi/Lacoste/Moon/Lacoste_Moon_Blu_2.jpg', 'main' => '0']);
        $Lacoste_Moon_P1I3 = new Image(['path_image' => 'storage/Orologi/Lacoste/Moon/Lacoste_Moon_Blu_3.jpg', 'main' => '0']);
        $Lacoste_Moon_P1->collection_id = $Lacoste_Moon->id;
        $Lacoste_Moon_P1->supplier_id = $fornitore2->id;
        $Lacoste_Moon_P1->color_id = $blu->id;
        $Lacoste_Moon_P1->save();
        $Lacoste_Moon_P1->categories()->save($classic);
        $Lacoste_Moon_P1->images()->save($Lacoste_Moon_P1I1);
        $Lacoste_Moon_P1->images()->save($Lacoste_Moon_P1I2);
        $Lacoste_Moon_P1->images()->save($Lacoste_Moon_P1I3);
        $Lacoste_Moon->products()->save($Lacoste_Moon_P1);

        $Lacoste_Moon_P2 = new Product(['cod' => 'LCM234', 'price' => '139', 'stock_availability' => '19',
            'genre' => 'F', 'long_desc' => 'long desc']);
        $Lacoste_Moon_P2I1 = new Image(['path_image' => 'storage/Orologi/Lacoste/Moon/Lacoste_Moon_Nero_1.jpg', 'main' => '1']);
        $Lacoste_Moon_P2I2 = new Image(['path_image' => 'storage/Orologi/Lacoste/Moon/Lacoste_Moon_Nero_2.jpg', 'main' => '0']);
        $Lacoste_Moon_P2I3 = new Image(['path_image' => 'storage/Orologi/Lacoste/Moon/Lacoste_Moon_Nero_3.jpg', 'main' => '0']);
        $Lacoste_Moon_P2->collection_id = $Lacoste_Moon->id;
        $Lacoste_Moon_P2->supplier_id = $fornitore2->id;
        $Lacoste_Moon_P2->color_id = $nero->id;
        $Lacoste_Moon_P2->save();
        $Lacoste_Moon_P2->categories()->save($classic);
        $Lacoste_Moon_P2->images()->save($Lacoste_Moon_P2I1);
        $Lacoste_Moon_P2->images()->save($Lacoste_Moon_P2I2);
        $Lacoste_Moon_P2->images()->save($Lacoste_Moon_P2I3);
        $Lacoste_Moon->products()->save($Lacoste_Moon_P2);

        $Lacoste_Moon_P3 = new Product(['cod' => 'LCM236', 'price' => '139', 'stock_availability' => '10',
            'genre' => 'F', 'long_desc' => 'long desc']);
        $Lacoste_Moon_P3I1 = new Image(['path_image' => 'storage/Orologi/Lacoste/Moon/Lacoste_Moon_Rosa_1.jpg', 'main' => '1']);
        $Lacoste_Moon_P3I2 = new Image(['path_image' => 'storage/Orologi/Lacoste/Moon/Lacoste_Moon_Rosa_2.jpg', 'main' => '0']);
        $Lacoste_Moon_P3I3 = new Image(['path_image' => 'storage/Orologi/Lacoste/Moon/Lacoste_Moon_Rosa_3.jpg', 'main' => '0']);
        $Lacoste_Moon_P3->collection_id = $Lacoste_Moon->id;
        $Lacoste_Moon_P3->supplier_id = $fornitore2->id;
        $Lacoste_Moon_P3->color_id = $rosa->id;
        $Lacoste_Moon_P3->save();
        $Lacoste_Moon_P3->categories()->save($classic);
        $Lacoste_Moon_P3->images()->save($Lacoste_Moon_P3I1);
        $Lacoste_Moon_P3->images()->save($Lacoste_Moon_P3I2);
        $Lacoste_Moon_P3->images()->save($Lacoste_Moon_P3I3);
        $Lacoste_Moon->products()->save($Lacoste_Moon_P3);



        /* Tissot */
        $Tissot = new Brand(['name' => 'Tissot','path_logo' => 'storage/Logo/Logo_Tissot.png']);
        $Tissot->save();

        /* Collezioni Tissot */
        $Lovely = new Collection(['name' => 'Lovely']);
        $Tissot->collections()->save($Lovely);

        $Chrono = new Collection(['name' => 'Chrono']);
        $Tissot->collections()->save($Chrono);



        /* Wellington */
        $Wellington = new Brand(['name' => 'Wellington','path_logo' => 'storage/Logo/Logo_Wellington.png']);
        $Wellington->save();

        /* Collezioni Wellington */
        $Roselyn = new Collection(['name' => 'Roselyn']);
        $Wellington->collections()->save($Roselyn);

        $Sheffield = new Collection(['name' => 'Sheffield']);
        $Wellington->collections()->save($Sheffield);

        $Bayswater = new Collection(['name' => 'Bayswater']);
        $Wellington->collections()->save($Bayswater);




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
