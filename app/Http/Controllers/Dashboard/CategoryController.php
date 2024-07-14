<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $category = new Category;
        $category->name = $request->name;
        $category->save();
        return redirect()->route('category.index')->with('success', 'category stored successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('dashboard.categories.show', compact('category'));
    }


    public function edit($id)
    {
        $category = Category::find($id);
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request,  $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->featured = $request->featured;
        $category->save();
        return redirect()->route('category.index')->with('success', 'category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect()->route('category.index')->with('success', 'category deleted successfully');
    }
    function featured($id)
    {
        $category = Category::findOrFail($id);
        $category->featured = '1';
        $category->save();

        return redirect()->route('category.index')->with('success', 'the category marked as  featured');
    }
    function unFeatured($id)
    {
        $category = Category::findOrFail($id);
        $category->featured = '0';
        $category->save();
        return redirect()->route('category.index')->with('success', 'the category marked as un featured');
    }
}
