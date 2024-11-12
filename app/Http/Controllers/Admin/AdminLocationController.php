<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLocationController extends Controller
{
    public function index()
    {
        return view('pages.admin.location-index');
    }
    public function create()
    {
        return view('pages.admin.location-create');
    }
    public function store()
    {
        return redirect()->route('admin.location')->with('success', 'Location created successfully');
    }
    public function edit($id)
    {
        return view('pages.admin.location-edit');
    }
    public function update($id)
    {
        return redirect()->route('admin.location')->with('success', 'Location updated successfully');
    }
}
