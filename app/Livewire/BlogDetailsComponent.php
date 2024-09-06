<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Illuminate\Support\Str;

class BlogDetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function render()
    {
        $blog = Blog::where('slug', $this->slug)->first();
        if (!$blog) {
            abort(404);
        }
        return view('livewire.blog-details-component', [
            'blog' => $blog,
        ]);
    }
}
