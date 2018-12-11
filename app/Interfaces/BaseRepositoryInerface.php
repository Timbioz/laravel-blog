<?php
/**
 * Created for laravel-blog.
 * User: timbioz
 * Date: 11.12.2018
 * Time: 20:42
 */

namespace App\Interfaces;


use Illuminate\Foundation\Http\FormRequest;

interface BaseRepositoryInerface
{
    public function store(FormRequest $request): bool;
}
