<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {

    $title = $faker->realText(random_int(80, 120));

    return [
        'user_id' => 1,
        'category_id' => random_int(1, 10),
        'title' => $title,
        'slug' => \App\Helpers\Transliterate::toSlug($title),
        'content' => file_get_contents('https://fish-text.ru/get?type=paragraph&format=html&number='.random_int(5, 9)),
        'description' => $faker->realText(random_int(600, 800)),
        'short_description' => $faker->realText(random_int(120, 200)),
        'seo_title' => $faker->realText(random_int(40, 80)),
        'seo_description' => $faker->realText(random_int(120, 200))
    ];
});
