<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Facades\RedirectTo;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    /**
     * The repository implementation.
     *
     * @var \App\Contracts\CategoryRepository
     */
    private $categories;

    /**
     * Create a new controller instance.
     *
     * @param \App\Contracts\CategoryRepository $categories
     */
    public function __construct(CategoryRepository $categories)
    {
        $this->categories = $categories;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('categories.index')->with([
            'categories_count' => Category::count()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->validated());

        return RedirectTo::route('categories', $category);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return RedirectTo::route('categories', $category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Requests\CategoryRequest  $request
     * @param  \App\Category|null  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryRequest $request, Category $category = null)
    {
        $this->categories->delete($category ?? $request->validated()['ids']);

        return RedirectTo::route('categories');
    }
}
