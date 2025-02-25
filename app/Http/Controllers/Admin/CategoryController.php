<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;
use App\Models\Categories;
use App\Models\Role;

class CategoryController extends Controller
{
    protected $category;

    function __construct(Categories $category)
    {
        $this->category = $category;
    }


    public function index()
    {
        $categories = $this->category->latest('id')->paginate(3);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parentCategories = $this->category->getParents();
        return view('admin.categories.create', compact('parentCategories'));
    }


    public function store(CreateCategoryRequest $request)
    {
        $dataCreate = $request->all();
        $category = $this->category->create($dataCreate);

        return redirect()->route('categories.index')->with(['message' => 'create new category: '. $category->name . ' successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cate = $this->category->with('children')->findOrFail($id);
        $parentCategories = $this->category->getParents();
        return view('admin.categories.edit', compact('cate', 'parentCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, string $id)
    {
        $updateData = $request->all();
        $cate = $this->category->findOrFail($id);
        $cate->update($updateData);
        return redirect()->route('categories.index')->with(['message' => 'update category: '. $cate->name . ' successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Categories::destroy($id);
        return to_route('categories.index')->with(['message' => 'Successfully Deleted!']);
    }
}
