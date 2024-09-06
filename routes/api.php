<?php

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post("/blog/create", function(Request $request){
    $blog = Blog::create([
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'image' => '',
        'category_id' => 6,
        'user_id' => 1,
        'content' => 'This is a test blog content',
        'tags' => 'test, blog, content',
        'descriptions' => 'This is a test blog description',
        'is_published' => 1,
        'published_at' => now(),
        'views' => 0,
        'likes' => 0,
        'dislikes' => 0,
    ]);

    return $blog;
});
