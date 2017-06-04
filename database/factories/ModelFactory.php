<?php

/*
|--------------------------------------------------------------------------
| Models Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Models factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(Mentor\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Mentor\Models\Demand::class, function (Faker\Generator $faker) {

    return [
        'title' => $faker->title,
        'subject' => $faker->title,
        'doubt' => $faker->sentence,
        'student' => $faker->userName,
        'email' => $faker->email
    ];
});

$factory->define(Mentor\Models\Perfomance::class, function (Faker\Generator $faker) {

    return [
       'area' => $faker->jobTitle,
        'type' => $faker->colorName
    ];
});



