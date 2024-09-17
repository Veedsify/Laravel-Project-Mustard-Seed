<?php

namespace App\Http\Controllers\Admin;


use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

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

    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4096',
        ]);

        $file = ImageManager::gd()->read($request->file);
        $file->cover(300, 300);
        $fileName = Str::random(32) . '.' . 'webp';
        $file->save(public_path('storage/categories/' . $fileName));
        $image_path = 'storage/categories' . $fileName;
        return response()->json(['success' => 'You have successfully uploaded an image', 'id' => $image_path]);
    }
}
