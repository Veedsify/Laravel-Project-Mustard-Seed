<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventCategory;
use Illuminate\Http\Request;

class AdminEventsController extends Controller
{
    public function index()
    {
        return view('pages.admin.events-index');
    }

    public function create()
    {
        return view('pages.admin.events-create');
    }

    public function store(Request $request)
    {
        // Validate the request...
        $request->validate([
            'name' => 'required',
        ]);

        $event = new Event();

        $event->name = $request->name;

        $event->save();

        return redirect()->route('pages.admin.events-index');
    }

    public function edit($id)
    {
        $event = Event::find($id);

        return view('pages.admin.events-edit', ['event' => $event]);
    }
    
    public function update(Request $request, $id)
    {
        // Validate the request...
        $request->validate([
            'name' => 'required',
        ]);

        $event = Event::find($id);

        $event->name = $request->name;

        $event->save();

        return redirect()->route('pages.admin.events');
    }

    public function delete($id)
    {
        $event = Event::find($id);
        $event->delete();

        return redirect()->route('pages.admin.events');
    }

    public function categories()
    {
        return view('pages.admin.events-categories-index');
    }

    public function createCategory()
    {
        return view('pages.admin.events-categories-create');
    }

    public function storeCategory(Request $request)
    {
        // Validate the request...
        $request->validate([
            'name' => 'required',
        ]);

        $category = new EventCategory();

        $category->name = $request->name;

        $category->save();

        return redirect()->route('pages.admin.events-categories-index');
    }

    public function editCategory($id)
    {
        $category = EventCategory::find($id);

        return view('pages.admin.events-categories-edit', ['category' => $category]);
    }

    public function updateCategory(Request $request, $id)
    {
        // Validate the request...
        $request->validate([
            'name' => 'required',
        ]);

        $category = EventCategory::find($id);

        $category->name = $request->name;

        $category->save();

        return redirect()->route('pages.admin.events-categories');
    }

    public function deleteCategory($id)
    {
        $category = EventCategory::find($id);
        $category->delete();

        return redirect()->route('pages.admin.events-categories');
    }
}
