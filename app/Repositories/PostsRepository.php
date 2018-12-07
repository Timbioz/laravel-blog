<?php
/**
 * Created by PhpStorm.
 * User: timbioz
 * Date: 08.12.2018
 * Time: 0:27
 */

namespace App\Repositories;

use App\Http\Requests\StorePostRequest;
use App\Interfaces\PostsRepositoryInterface;
use App\Models\Post;
use App\User;

class PostsRepository implements PostsRepositoryInterface
{
    protected $user;
    protected $post;

    public function __construct(User $user, Post $post)
    {
        $this->user = $user;
        $this->post = $post;
    }

    public function store(StorePostRequest $request)
    {
        $this->post->create();
        $this->post->slug = uniqid();
        $this->post->title = $request->get("title");
        $this->post->content = $request->get("content");
        $this->post->user_id = 1;
        $this->post->save();
    }
}
