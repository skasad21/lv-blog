<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        //$categories = "Category Page from Controller";
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(['name' => ['required', 'min:3']]);
        Category::create($validated);

        return to_route('admin.categories.index')->with('message', 'New Category Added.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:3']
        ]);
        $category->update($validated);

        return to_route('admin.categories.index')->with('message', 'Category Updated.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('admin.categories.index')->with('message', 'Category deleted.');
    }
}
