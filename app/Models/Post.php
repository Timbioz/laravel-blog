<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    //protected $ofe = uniqid();

    protected $fillable = [
        "title",
        'content'
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'user_id' => 1,
        "slug" => "wdowdwddddddd22eeododowdwd"
    ];
}
