<?php
/**
 * Created by PhpStorm.
 * User: timbioz
 * Date: 08.12.2018
 * Time: 0:27
 */

namespace App\Repositories;

use App\Helpers\Transliterate;
use App\Interfaces\PostsRepositoryInterface;
use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;

class PostsRepository implements PostsRepositoryInterface
{
    /**
     * @var Post
     */
    protected $post;

    /**
     * PostsRepository constructor.
     *
     * @param Post $post
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * @param FormRequest $request
     *
     * @return boolean
     */
    public function store(FormRequest $request): bool
    {
        $this->post->title = $request->get('title');
        $this->post->slug = Transliterate::toSlug($this->post->title);
        $this->post->content = $request->get('content');
        $this->post->user_id = auth()->id();
        return $this->post->save();
    }
}
