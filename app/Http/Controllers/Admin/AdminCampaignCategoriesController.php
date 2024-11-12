<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CampaignCategory;
use Illuminate\Http\Request;

class AdminCampaignCategoriesController extends Controller
{
    public function categories()
    {
        return view('pages.admin.campaign-categories-index');
    }

    public function createCategory()
    {
        return view('pages.admin.campaign-categories-create');
    }

    public function storeCategory(Request $request)
    {
        // Validate the request...
        $request->validate([
            'name' => 'required',
        ]);

        $category = new CampaignCategory();

        $category->name = $request->name;

        $category->save();

        return redirect()->route('pages.admin.campaign-categories-index');
    }

    public function editCategory($id)
    {
        $category = CampaignCategory::find($id);

        return view('pages.admin.campaign-categories-edit', ['category' => $category]);
    }

    public function updateCategory(Request $request, $id)
    {
        // Validate the request...
        $request->validate([
            'name' => 'required',
        ]);

        $category = CampaignCategory::find($id);

        $category->name = $request->name;

        $category->save();

        return redirect()->route('pages.admin.campaign-categories');
    }
}
