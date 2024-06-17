<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreatePost extends Component
{
    public $title;
    public $body;

    public function submit()
    {
        $this->validate([
            'title' => 'required|string|max:255|unique:posts,title',
            'body' => 'required|string',
        ]);

        $post = new Post();
        $post->title = $this->title;
        $post->body = $this->body;
        $post->user_id = Auth::id();
        $post->save();

        $this->resetForm();
        $this->dispatch('postCreated');
        // $this->emit('postCreated');
        session()->flash('success', 'Post created successfully!');
    }

    private function resetForm()
    {
        $this->title = '';
        $this->body = '';
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
