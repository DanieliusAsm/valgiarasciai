<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
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

        DB::table('admins')->insert([
            'email'=>'admin@gmail.com',
            'username'=>'admin',
            'password'=>bcrypt('admin'),
            'created_at'=>\Carbon\Carbon::now()
        ]);
        $this->command->info('Admin added!');
    }
}
