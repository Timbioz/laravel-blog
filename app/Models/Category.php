<?php
/**
 * Created for laravel-blog.
 * User: timbioz
 * Date: 11.12.2018
 * Time: 20:12
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Category extends Model
{

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'seo_title',
        'seo_description'
    ];

    public function posts()
    {
        $this->hasMany(Post::class);
    }
}
