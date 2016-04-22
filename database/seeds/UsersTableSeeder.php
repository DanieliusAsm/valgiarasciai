<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('blood_database')->delete();
        DB::table('body_data')->delete();

        DB::table('users')->insert([[
            'first_name'=>'Jonas',
            'last_name'=>'Jonaitis',
            'gender'=>'Vyras',
            'age'=>'20',
            'height'=>'180',
            'email'=>'jonas@gmail.com',
            'phone'=>'454646',
            'notes'=>'nera',
            'weight'=>'80',
            'wrist'=>'10',
            'waist'=>'70',
            'created'=>Carbon::now()
        ],[
            'first_name'=>'Petras',
            'last_name'=>'Petraitis',
            'gender'=>'vyras',
            'age'=>'20',
            'height'=>'190',
            'email'=>'petras@gmail.com',
            'phone'=>'464317',
            'notes'=>'nera',
            'weight'=>'90',
            'wrist'=>'10',
            'waist'=>'70',
            'created'=>Carbon::now()
        ]]);
        DB::table('blood_database')->insert([[
            'user_id'=>'0',
            'arterija'=>'456',
            'pulsas'=>'456',
            'cholesterolis'=>'76',
            'mtl'=>'46',
            'dtl'=>'3',
            'trig'=>'123',
            'gliukozė'=>'12',
        ],[
            'user_id'=>'1',
            'arterija'=>'123',
            'pulsas'=>'123',
            'cholesterolis'=>'153',
            'mtl'=>'513',
            'dtl'=>'153',
            'trig'=>'153',
            'gliukozė'=>'15',
        ]]);
        DB::table('body_data')->insert([[
            'user_id'=>'0',
            'biological_age'=>'5',
            'body_fluid'=>'123',
            'abdominal_fat'=>'13',
            'weight'=>'21',
            'fat_expression'=>'43',
            'muscle_mass'=>'43',
            'bone_mass'=>'453',
            'kmi'=>'45',
            'calorie_intake'=>'45',
        ],[
            'user_id'=>'1',
            'biological_age'=>'453',
            'body_fluid'=>'45',
            'abdominal_fat'=>'45',
            'weight'=>'45',
            'fat_expression'=>'45',
            'muscle_mass'=>'456',
            'bone_mass'=>'456',
            'kmi'=>'456',
            'calorie_intake'=>'46',
        ]]);
    }
}
