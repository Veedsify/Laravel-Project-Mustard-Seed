<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class AdminDonationController extends Controller
{
    public function index()
    {
        return view('pages.admin.donations-index');
    }

    public function create()
    {
        return view('pages.admin.donations-create');
    }

    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'name' => 'required',
        ]);

        $donation = new Item();

        $donation->name = $request->name;

        $donation->save();

        return redirect()->route('pages.admin.donations-index');
    }

    public function edit($id)
    {
        $donation = Item::find($id);

        return view('pages.admin.donations-edit', ['donation' => $donation]);
    }
    
    public function update(Request $request, $id)
    {
        // Validate the request...
        $request->validate([
            'name' => 'required',
        ]);

        $donation = Item::find($id);

        $donation->name = $request->name;

        $donation->save();

        return redirect()->route('pages.admin.donations');
    }
}
