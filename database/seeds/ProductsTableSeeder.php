<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'id' => str_random(10),
            'pavadinimas' => str_random(10),
            'baltymai' => str_random(10),
            'riebalai' => str_random(10),
            'angliavandeniai' => str_random(10),
            'cholesterolis' => str_random(10),
            'eVerte' => str_random(10),
            'tipas' => str_random(10)
        ]);
    }
}
