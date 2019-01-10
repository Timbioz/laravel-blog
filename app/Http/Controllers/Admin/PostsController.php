<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Transliterate;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Interfaces\PostsRepositoryInterface;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostsController extends Controller
{

    protected $repository;

    public function __construct(PostsRepositoryInterface $repository)
    {
        $this->middleware('auth');

        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {

        //$posts = Post::with('category')->get()->reverse();
        $posts = Post::all()->reverse();

        //dd($posts);

        return view('admin.posts.index', compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories'), compact('tags'));
    }

    // TODO: Нужен механизм обработки ошибки сохраниения + оповещение об этом пользователя
    
    /**
     * Store a newly created resource in storage.
     *
     * @param PostStoreRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)
    {
        //dd($request);

        $answer = $this->repository->store($request);
        return redirect()->action('Admin\PostsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post $post
     *
     * @return void
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post $post
     * @return void
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Post         $post
     * @return void
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post $post
     * @return void
     */
    public function destroy(Post $post)
    {
        //
    }
}
