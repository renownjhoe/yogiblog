<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Livewire\Component;

class ShowPost extends Component
{
    public $post;

    public function mount()
    {
        $postId = Route::current()->parameter('id');
        $this->post = Post::findOrFail($postId);
    }

    public function render()
    {
        return view('livewire.show-post');
    }
}
