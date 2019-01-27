<?php
/**
 * Created for laravel-blog.
 * User: timbioz
 * Date: 11.12.2018
 * Time: 20:44
 */

namespace App\Repositories;


use App\Helpers\Transliterate;
use App\Interfaces\TagsRepositoryInterface;
use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;

class TagsRepository implements TagsRepositoryInterface
{
    protected $tag;

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function store(FormRequest $request): bool
    {
        $this->tag->title = $request->get('title');
        $this->tag->slug = Transliterate::toSlug($this->tag->title);
        $this->tag->user_id = auth()->id();
        return $this->tag->save();
    }
}
