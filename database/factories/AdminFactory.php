<?php

use Faker\Generator as Faker;

$factory->state(App\User::class, 'admin', function (Faker $faker) {
    return [
        'name' => 'timbioz',
        'email' => 'volkovtim@gmail.com',
        'email_verified_at' => now(),
        'password' => bcrypt('aqwa1102'), // secret
        'remember_token' => str_random(10),
    ];
});
