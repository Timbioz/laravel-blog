<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagStoreRequest;
use App\Interfaces\TagsRepositoryInterface;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TagsController extends Controller
{

    protected $repository;

    public function __construct(TagsRepositoryInterface $repository)
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
        $tags = Tag::all();

        return view('admin.tags.index', ['tags' => $tags]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(): View
    {
        return view('admin.tags.create');
    }

    // TODO: Нужен механизм обработки ошибки сохраниения + оповещение об этом пользователя
    
    /**
     * Store a newly created resource in storage.
     *
     * @param TagStoreRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(TagStoreRequest $request)
    {
        $answer = $this->repository->store($request);
        return redirect()->action('Admin\TagsController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag $tag
     *
     * @return void
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag $tag
     * @return void
     */
    public function edit(Tag $tag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Tag         $tag
     * @return void
     */
    public function update(Request $request, Tag $tag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag $tag
     * @return void
     */
    public function destroy(Tag $tag)
    {
        //
    }
}
