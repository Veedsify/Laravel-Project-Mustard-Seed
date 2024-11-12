<?php

namespace App\Livewire;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class BlogDetailsComponent extends Component
{
    public $slug;
    public $name = '';
    public $email = '';
    public $comment = '';

    public function mount($slug)
    {
        $this->slug = $slug;
        $user = Auth::user();
        if ($user) {
            $this->name = $user->name;
            $this->email = $user->email;
        }
    }

    public function saveComment()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'comment' => 'required'
        ]);

        $newComment = new Comment();
        $newComment->user_id = Auth::id();
        $newComment->blog_id = Blog::where('slug', $this->slug)->first()->id;
        $newComment->content = $this->comment;
        $newComment->save();

        $this->dispatch('notify', message: 'Your Comment Has Been Added, Do Wait For Approval');
        $this->reset('comment');
    }

    public function render()
    {
        $blog = Blog::where('slug', $this->slug)->first();
        if (!$blog) {
            abort(404);
        }
        $categories = Category::all();
        $relatedBlogs = Blog::where('category_id', $blog->category_id)->where('id', '!=', $blog->id)->get()->take(3);
        return view('livewire.blog-details-component', [
            'blog' => $blog,
            'categories' => $categories,
            'relatedBlogs' => $relatedBlogs
        ]);
    }
}
