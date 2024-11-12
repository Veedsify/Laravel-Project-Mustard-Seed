<?php

namespace App\Livewire\Comps;

use App\Models\Blog;
use Livewire\Component;

class HomeBlogSection extends Component
{
    public function render()
    {
        $blogs = Blog::where('is_published', true)->latest()->take(3)->get();
        return view('livewire.comps.home-blog-section', [
            'blogs' => $blogs,
        ]);
    }
}
