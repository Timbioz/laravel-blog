<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Post
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $category_id
 * @property int|null $modified_id
 * @property string $title
 * @property string $slug
 * @property int|null $image_id
 * @property string|null $description
 * @property string|null $short_description
 * @property string|null $content
 * @property string|null $seo_title
 * @property string|null $seo_description
 * @property int $is_draft
 * @property int $is_private
 * @property string|null $password
 * @property int $is_published
 * @property int $is_comments_allowed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereIsCommentsAllowed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereIsDraft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereIsPrivate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereModifiedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereSeoDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereSeoTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Post whereUserId($value)
 * @mixin \Eloquent
 */
class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'slug'
    ];
}
