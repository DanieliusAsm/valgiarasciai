<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
    }
}

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'email'=>'demo@gmail.com',
            'username'=>'demo',
            'password'=>bcrypt('demo123'),
            'created_at'=>\Carbon\Carbon::now()
            ]);

        $this->command->info('Admin added!');
    }
}
