<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Transliterate;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Interfaces\CategoriesRepositoryInterface;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoriesController extends Controller
{

    protected $repository;

    public function __construct(CategoriesRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $category = Category::all()->first();

        $trans = Transliterate::toSlug('Строка для-проверки литерации');

        return view('admin.categories.index', ['category' => $category, 'trans' => $trans]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('admin.categories.create');
    }

    // TODO: Нужен механизм обработки ошибки сохраниения + оповещение об этом пользователя
    
    /**
     * Store a newly created resource in storage.
     *
     * @param CategoryStoreRequest $request
     *
     * @return RedirectResponse
     */
    public function store(CategoryStoreRequest $request): RedirectResponse
    {
        $answer = $this->repository->store($request);
        return redirect()->action('Admin\CategoriesController@index');
    }
}
