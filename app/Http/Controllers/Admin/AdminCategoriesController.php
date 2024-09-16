<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    public function index()
    {
        return view('pages.admin.categories-index');
    }
    public function create()
    {
        return view('pages.admin.categories-create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'image' => 'required',
            'user_id' => 'required',
        ]);

        Category::create($request->all());

        return redirect()->route('admin.categories')
            ->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('pages.admin.categories-edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'description' => 'required',
            'image' => 'required',
            'user_id' => 'required',
        ]);

        $category = Category::find($id);
        $category->update($request->all());

        return redirect()->route('admin.categories')
            ->with('success', 'Category updated successfully.');
    }

}
