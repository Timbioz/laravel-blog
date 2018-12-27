<?php
/**
 * Created by PhpStorm.
 * User: ludmi
 * Date: 11.12.2018
 * Time: 2:46
 */

namespace App\Helpers;


class Transliterate
{
    public static function toSlug($string) {
        $string = (string) $string; // преобразуем в строковое значение
        $string = strip_tags($string); // убираем HTML-теги
        $string = str_replace(array("\n", "\r"), ' ', $string); // убираем перевод каретки
        $string = preg_replace("/\s+/", ' ', $string); // удаляем повторяющие пробелы
        $string = trim($string); // убираем пробелы в начале и конце строки
        $string = function_exists('mb_strtolower') ? mb_strtolower($string) : strtolower($string); // переводим строку в нижний регистр (иногда надо задать локаль)
        $string = strtr($string, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));
        $string = preg_replace('/[^0-9a-z-_ ]/i', '', $string); // очищаем строку от недопустимых символов
        $string = str_replace(' ', '-', $string); // заменяем пробелы знаком минус
        $string = str_replace('--', '-', $string); // заменяем пробелы знаком минус
        return $string; // возвращаем результат
    }
}
