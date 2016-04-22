<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(ProductsTableSeeder::class);

        $users = factory(User::class,20)
            ->create()
            ->each(function($user){
                $user->blood()->save(factory(App\Blood::class)->make());
                $user->body()->save(factory(App\Body::class)->make());
            });


        Model::reguard();
    }
}
