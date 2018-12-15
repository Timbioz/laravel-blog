<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Transliterate;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Interfaces\PostsRepositoryInterface;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostsController extends Controller
{

    protected $repository;

    public function __construct(PostsRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {
        $post = Post::all()->first();

        $trans = Transliterate::toSlug('Строка для-проверки литерации');

        return view('admin.posts.index', ['post' => $post, 'trans' => $trans]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('admin.posts.create');
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
