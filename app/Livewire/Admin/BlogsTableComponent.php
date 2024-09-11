<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Blog;
use Livewire\Attributes\On; 

class BlogsTableComponent extends Component
{
    use WithPagination;

    public $search;

    public function updatedSearch()
    {
        $this->resetPage(); // Reset pagination when search changes
    }

    #[On('deleteBlog')]
    public function delete($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        $this->dispatch('notify-success', message: 'Blog has been deleted successfully!', title: 'Article has been Deleted!');
    }

    public function render()
    {
        // Handle search and pagination
        $blogsQuery = Blog::query();

        if ($this->search) {
            $blogsQuery->where(function ($query) {
                $query->where('title', 'like', '%'.$this->search.'%')
                      ->orWhere('slug', 'like', '%'.$this->search.'%')
                      ->orWhere('descriptions', 'like', '%'.$this->search.'%');
            });
        }

        $blogs = $blogsQuery->paginate(10);

        return view('livewire.admin.blogs-table-component', ['blogs' => $blogs]);
    }
}
