<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('modified_by_id')->nullable();
            $table->unsignedInteger('category_id')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->unsignedInteger('image_id')->nullable();
            $table->string('short_description')->nullable();
            $table->string('description')->nullable();
            $table->text('content')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_keywords')->nullable();
            $table->tinyInteger('is_draft')->default(1);
            $table->tinyInteger('is_private')->default(0);
            $table->string('password')->nullable();
            $table->tinyInteger('is_published')->default(0);
            $table->tinyInteger('is_comments_allowed')->default(1);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
}
