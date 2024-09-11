<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Blog;

class DashBoardBlogStats extends Component
{
    public $articles;
    public $thisWeekArticles;

    public function render()
    {
        $this->articles = Blog::count();
        return view('livewire.admin.dash-board-blog-stats');
    }
}
