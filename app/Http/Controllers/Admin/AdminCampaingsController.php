<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminCampaingsController extends Controller
{
    public function index()
    {
        return view('pages.admin.campaigns-index');
    }

    public function create()
    {
        return view('pages.admin.campaigns-create');
    }

    public function store()
    {
        return redirect()->route('admin.campaigns')->with('success', 'Campaing created successfully');
    }

    public function edit($id)
    {
        return view('pages.admin.campaigns-edit');
    }

    public function update($id)
    {
        return redirect()->route('admin.campaigns')->with('success', 'Campaing updated successfully');
    }
}
