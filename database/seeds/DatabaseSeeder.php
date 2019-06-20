<?php

use App\Category;
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


        $smart = new Category(['name' => 'smart']);
        $smart->save();
        $water_resistence = new Category(['name' => 'water resistence']);
        $water_resistence->save();
        $classic = new Category(['name' => 'classic']);
        $classic->save();
        $digital = new Category(['name' => 'digital']);
        $digital->save();

        $fornitore1 = new Supplier(['name'=>'fornitore1','email'=>'fornitore1@fornitore.it','phone'=>'1231231231','city'=>'Roma','address'=>'via Milano','zip'=>'00001','iban'=>'123123123123123']);
        $fornitore1->save();
        $fornitore2 = new Supplier(['name'=>'fornitore2','email'=>'fornitore2@fornitore.it','phone'=>'1231231232','city'=>'Milano','address'=>'via Roma','zip'=>'00002','iban'=>'123123123123124']);
        $fornitore2->save();


        $brand1 = new Brand(['name' => 'Fossil']);
        $brand1->save();

        $collection1b1 = new Collection(['name' => 'Goodwin']);
        $brand1->collections()->save($collection1b1);

        $collection2b1 = new Collection(['name' => 'Belmar']);
        $brand1->collections()->save($collection2b1);

        $product1c1b1 = new Product(['cod' => '123456','name' => 'p1c1b1','price' => 35, 'stock_availability' => '24',
                                        'genere' => 'M','long_desc' => 'long desc','color' => 'ffffff']);
        $product1c1b1->collection_id = $collection1b1->id;
        $product1c1b1->supplier_id = $fornitore1->id;
        $product1c1b1->save();
        $product1c1b1->categories()->save($classic);
        $collection1b1->products()->save($product1c1b1);

        $product2c1b1 = new Product(['cod' => '123457','name' => 'p2c1b1','price' => '70', 'stock_availability' => '5',
                                        'genere' => 'F','long_desc' => 'long desc','color' => 'ffffff']);
        $product2c1b1->collection_id = $collection2b1->id;
        $product2c1b1->supplier_id = $fornitore1->id;
        $product2c1b1->save();
        $product2c1b1->categories()->save($smart);
        $product2c1b1->categories()->save($water_resistence);
        $collection1b1->products()->save($product2c1b1);

        $product1c2b1 = new Product(['cod' => '123458','name' => 'p1c2b1','price' => '99.99', 'stock_availability' => '13',
                                        'genere' => 'M','long_desc' => 'long desc','color' => 'ffffff']);
        $product1c2b1->collection_id = $collection2b1->id;
        $product1c2b1->supplier_id = $fornitore2->id;
        $product1c2b1->save();
        $product1c2b1->categories()->save($digital);
        $collection2b1->products()->save($product1c2b1);

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
