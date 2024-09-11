<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Category;

class BlogCreateForm extends Component
{
    use WithFileUploads;

    public $image;
    public $title;
    public $categories;
    public $editor;
    public $selectedCategory;

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:1024', // 1MB Max
        ]);
    }

    public function render()
    {
        $this->categories = Category::all();
        return view('livewire.admin.blog-create-form');
    }
}
