<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminCommentsController extends Controller
{
    public function index()
    {
        return view('pages.admin.comments-index');
    }
    public function edit($id)
    {
        return view('pages.admin.comments-edit');
    }
    public function update($id)
    {
        return redirect()->route('admin.comments')->with('success', 'Comment updated successfully');
    }
}
