<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'first_name'=>$faker->firstNameMale,
        'last_name'=>$faker->lastName,
        'gender'=>'vyras',
        'age'=>$faker->randomDigit,
        'height'=>$faker->randomDigit,
        'email'=>$faker->safeEmail,
        'phone'=>$faker->phoneNumber,
        'notes'=>$faker->sentence(5),
        'weight'=>$faker->randomDigit,
        'wrist'=>$faker->randomDigit,
        'waist'=>$faker->randomDigit,
        'created'=>$faker->time("Y:m:d H:i:s")
    ];
});

$factory->define(App\Blood::class, function(Faker\Generator $faker){
    return [
        'arterija'=>$faker->randomDigit,
        'pulsas'=>$faker->randomDigit,
        'cholesterolis'=>$faker->randomDigit,
        'mtl'=>$faker->randomDigit,
        'dtl'=>$faker->randomDigit,
        'trig'=>$faker->randomDigit,
        'gliukoze'=>$faker->randomDigit
    ];
});

$factory->define(App\Body::class, function(Faker\Generator $faker){
    return [
        'biological_age'=>$faker->randomDigit,
        'body_fluid'=>$faker->randomDigit,
        'abdominal_fat'=>$faker->randomDigit,
        'weight'=>$faker->randomDigit,
        'fat_expression'=>$faker->randomDigit,
        'muscle_mass'=>$faker->randomDigit,
        'bone_mass'=>$faker->randomDigit,
        'kmi'=>$faker->randomDigit,
        'calorie_intake'=>$faker->randomDigit,
    ];
});
