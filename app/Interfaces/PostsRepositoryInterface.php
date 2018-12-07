<?php
/**
 * Created by PhpStorm.
 * User: timbioz
 * Date: 08.12.2018
 * Time: 0:24
 */

namespace App\Interfaces;


use App\Http\Requests\StorePostRequest;

interface PostsRepositoryInterface
{
    public function store(StorePostRequest $post);
}
