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

        $message = $faker->unique()->word;

        return view('admin.index')->with(['message' => $message, 'fishtext' => $fishtext]);
    }
}
