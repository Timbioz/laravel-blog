<?php
/**
 * Created for laravel-blog.
 * User: timbioz
 * Date: 20.12.2018
 * Time: 15:32
 */

namespace App\Helpers;

use Faker;

/**
 * Class Fishtext
 * @package App\Helpers
 */
class Fishtext
{

    /**
     * @param integer $min
     * @param integer $max
     *
     * @return string
     * @throws \Exception
     */
    public function generateRu($min, $max): string
    {
        $faker = Faker\Factory::create('ru_RU');

        $text = $faker->realText(random_int($min, $max));
        $normalizedText = str_replace('.', '', $text);
        return rtrim($normalizedText);
    }

    /**
     * @param integer $paragraphs
     *
     * @return string
     */
    public function generateFishRu($paragraphs): string
    {
        $text = file_get_contents("https://fish-text.ru/get?type=paragraph&format=html&number={$paragraphs}");
        return $text;
    }
}
