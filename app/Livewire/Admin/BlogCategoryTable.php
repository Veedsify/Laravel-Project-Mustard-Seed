<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\On;

class BlogCategoryTable extends Component
{
    use WithPagination;
    public $search = '';

    public function updatedSearch()
    {
        $this->resetPage(); // Reset pagination when search changes
    }

    #[On('deleteThis')]
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        $this->dispatch('notify-success', message: 'Category has been deleted successfully!', title: 'Category has been Deleted!');
    }

    public function render()
    {
        $categoryQuery = Category::query();
        if ($this->search) {
            $categories = $categoryQuery
                ->where('name', 'like', '%' . $this->search . '%');
        }
        $categories = $categoryQuery->paginate(10);
        return view('livewire.admin.blog-category-table', [
            'categories' => $categories
        ]);
    }
}
