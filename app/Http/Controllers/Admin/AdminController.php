<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Faker;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {

        $faker = Faker\Factory::create('ru_RU');
        $fishtext = file_get_contents('https://fish-text.ru/get?type=paragraph&format=html&number=8');

        //$message = str_replace('.', '', rtrim($faker->realText(random_int(60, 120), 1), '.'));

        $message = $faker->realText();
        $strok = explode(' ', $message);
        $wdpwdm = $this->Getet($strok);


        return view('admin.index')->with(['message' => $wdpwdm, 'fishtext' => $fishtext]);
    }

    protected function Getet($str) {
        foreach ($str as $value){
            if (mb_strlen($value) >= 4 && mb_strlen($value) <= 7) {
                $res = preg_replace('/[^а-я]/ui', '', $value);
                return mb_strtolower($res);
                break;
            }
        }

    }
}
