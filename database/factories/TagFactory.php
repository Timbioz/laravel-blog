<?php
/**
 * Created for laravel-blog.
 * User: timbioz
 * Date: 20.12.2018
 * Time: 0:12
 */

use Faker\Generator as Faker;
use App\Helpers\Transliterate;

$factory->define(App\Models\Tag::class, function (Faker $faker) {

    $title = substr($faker->unique()->company, 0, 10);

    return [
        'user_id' => 1,
        'title' => $title,
        'slug' => Transliterate::toSlug($title),
        'description' => $faker->realText(random_int(600, 800)),
        'short_description' => $faker->realText(random_int(120, 200)),
        'seo_title' => $faker->realText(random_int(40, 80)),
        'seo_description' => $faker->realText(random_int(120, 200))
    ];
});
