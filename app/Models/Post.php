<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    //protected $ofe = uniqid();

    protected $fillable = [
        "title",
        'content',
        "slug"
    ];
}
