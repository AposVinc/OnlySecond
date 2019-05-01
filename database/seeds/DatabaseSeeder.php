<?php

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
        
        /*
         \App\Brand::create(['name' => 'Fossil']);

        //\App\Collection::create(['name' => 'Goodwin','id_brand' => '1']);
        //\App\Collection::create(['name' => 'Belmar','id_brand' => '1']);

        $brand = \App\Brand::find(1);

        $collection = new \App\Collection(['name' => 'Goodwin']);
        $brand->collections()->save($collection);

        $collection = new \App\Collection(['name' => 'Belmar']);
        $brand->collections()->save($collection); 
        */
    }
}
