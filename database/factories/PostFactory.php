<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {

    $title = str_replace('.', '', $faker->realText(random_int(600, 800)));

    return [
        'user_id' => 1,
        'title' => $title,
        'slug' => \App\Helpers\Transliterate::toSlug($title),
        'content' => file_get_contents('https://fish-text.ru/get?type=paragraph&format=html&number='.random_int(5, 9))
    ];
});
