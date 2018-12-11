<?php
/**
 * Created by PhpStorm.
 * User: timbioz
 * Date: 08.12.2018
 * Time: 0:24
 */

namespace App\Interfaces;

use Illuminate\Foundation\Http\FormRequest;

interface PostsRepositoryInterface
{
    public function store(FormRequest $request): bool;
}
