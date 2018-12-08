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
    /**
     * @var User
     */
    protected $user;
    /**
     * @var Post
     */
    protected $post;

    /**
     * PostsRepository constructor.
     *
     * @param User $user
     * @param Post $post
     */
    public function __construct(User $user, Post $post)
    {
        $this->user = $user;
        $this->post = $post;
    }

    /**
     * @param StorePostRequest $request
     *
     * @return boolean
     */
    public function store(StorePostRequest $request) : bool
    {
        $this->post->slug = uniqid('', true);
        $this->post->title = $request->get('title');
        $this->post->content = $request->get('content');
        $this->post->user_id = 1;
        return $this->post->save();
    }
}
