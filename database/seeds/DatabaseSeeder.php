<?php

use App\Brand;
use App\Collection;
use App\Product;
use App\Newsletter;
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

        /*
        $brand1 = new Brand(['name' => 'Fossil']);
        $brand1->save();

        $collection1b1 = new Collection(['name' => 'Goodwin']);
        $brand1->collections()->save($collection1b1);

        $collection2b1 = new Collection(['name' => 'Belmar']);
        $brand1->collections()->save($collection2b1);

        $product1c1b1 = new Product(['name' => 'p1c1b1']);
        $collection1b1->products()->save($product1c1b1);

        $product2c1b1 = new Product(['name' => 'p2c1b1']);
        $collection1b1->products()->save($product2c1b1);

        $product1c2b1 = new Product(['name' => 'p1c2b1']);
        $collection2b1->products()->save($product1c2b1);


        $brand2 = new Brand(['name' => 'Brand2']);
        $brand2->save();
        $collection1b2 = new Collection(['name' => 'Col1B2']);
        $brand2->collections()->save($collection1b2);

        $collection2b2 = new Collection(['name' => 'Col2B2']);
        $brand2->collections()->save($collection2b2);

        $product1c1b2 = new Product(['name' => 'p1c1b2']);
        $collection1b2->products()->save($product1c1b2);

        $product2c1b2 = new Product(['name' => 'p2c1b2']);
        $collection1b2->products()->save($product2c1b2);

        $product1c2b2 = new Product(['name' => 'p1c2b2']);
        $collection2b2->products()->save($product1c2b2);
        */

    }
}
