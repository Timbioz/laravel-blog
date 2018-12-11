<?php
/**
 * Created for laravel-blog.
 * User: timbioz
 * Date: 11.12.2018
 * Time: 20:44
 */

namespace App\Repositories;


use App\Helpers\Transliterate;
use App\Interfaces\CategoriesRepositoryInterface;
use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class CategoriesRepository implements CategoriesRepositoryInterface
{
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function store(FormRequest $request): bool
    {
        $this->category->title = $request->get('title');
        $this->category->slug = Transliterate::toSlug($this->category->title);
        $this->category->user_id = auth()->id();
        return $this->category->save();
    }
}
