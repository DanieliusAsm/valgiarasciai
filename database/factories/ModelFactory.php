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
use Carbon\Carbon;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'first_name'=>$faker->firstNameMale,
        'last_name'=>$faker->lastName,
        'gender'=>'vyras',
        'age'=>$faker->randomDigit,
        'email'=>$faker->safeEmail,
        'phone'=>$faker->phoneNumber,
        'diet'=>$faker->sentence(2),
        'notes'=>$faker->sentence(5),
        'created'=>Carbon::now()
    ];
});
$factory->define(App\Base::class, function(Faker\Generator $faker){
    return [
        'height'=>$faker->randomDigit,
        'weight'=>$faker->randomDigit,
        'wrist'=>$faker->randomDigit,
        'waist'=>$faker->randomDigit,
        'created'=>Carbon::now()
    ];
});
$factory->define(App\Blood::class, function(Faker\Generator $faker){
    return [
        'blood_pressure'=>$faker->randomDigit,
        'pulse'=>$faker->randomDigit,
        'cholesterol'=>$faker->randomDigit,
        'mtl'=>$faker->randomDigit,
        'dtl'=>$faker->randomDigit,
        'triglycerides'=>$faker->randomDigit,
        'glucose'=>$faker->randomDigit,
        'created'=>Carbon::now()
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
        'created'=>Carbon::now()
    ];
});

$factory->define(App\Diet::class, function(Faker\Generator $faker){
    return[
        'total_days'=>'1',
        'total_eating'=>'6',
        'notes'=>$faker->sentence(5),
        'with_cholesterol'=>'0',
        'created'=>Carbon::now()
    ];
});
$factory->define(App\Eating::class, function(Faker\Generator $faker){
    return [
        'recommended_rate'=>'10%',
    ];
});
