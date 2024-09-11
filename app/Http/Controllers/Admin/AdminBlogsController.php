<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminBlogsController extends Controller
{
    public function index()
    {
        return view('pages.admin.blogs');
    }

    public function create()
    {
        return view('pages.admin.blogs-create');
    }
}
