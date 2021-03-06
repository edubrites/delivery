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

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt('senha123'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word
    ];
});

$factory->define(App\Models\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'price' => $faker->numberBetween(10, 50)
    ];
});

$factory->define(App\Models\Client::class, function (Faker\Generator $faker) {
    return [
        'phone' => $faker->phoneNumber,
        'address' => $faker->address,
        'city' => $faker->city,
        'state' => $faker->state,
        'zipcode' => $faker->postcode
    ];
});

$factory->define(App\Models\Order::class, function (Faker\Generator $faker) {
    return [
        'client_id' => rand(1, 10),
        'total' => rand(50, 100),
        'status' => 0,
    ];
});

$factory->define(App\Models\OrderItem::class, function (Faker\Generator $faker) {
    return [
    ];
});

$factory->define(App\Models\Cupom::class, function (Faker\Generator $faker) {
    return [
        'code' => rand(100, 10000),
        'value' => rand(50, 100),
    ];
});

$factory->define(App\Models\OAuthClient::class, function (Faker\Generator $faker) {
        return [
                'secret' => $faker->word,
                'name' => $faker->word,
            ];
 });