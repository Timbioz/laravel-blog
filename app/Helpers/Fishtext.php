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


    /**
     * @param int $min
     * @param int $max
     *
     * @return string
     */
    public static function getShortRu($min, $max): ?string
    {
        $faker = Faker\Factory::create('ru_RU');
        $str = explode(' ', $faker->realText());
        foreach ($str as $value){
            if (mb_strlen($value) >= $min && mb_strlen($value) <= $max) {
                $res = preg_replace('/[^а-я]/ui', '', $value);
                return mb_strtolower($res);
            }
        }

    }
}
