<?php

namespace App\Livewire;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CommentForm extends Component
{
    public $postId;
    public $body;

    public function mount($postId)
    {
        $this->postId = $postId;
    }

    public function submit()
    {
        $this->validate([
            'body' => 'required|string',
        ]);

        $comment = new Comment();
        $comment->body = $this->body;
        $comment->post_id = $this->postId;
        $comment->user_id = Auth::id();
        $comment->save();

        $this->resetForm();
        $this->dispatch('commentAdded'); // Emit event for potential updates

        session()->flash('success', 'Comment added successfully!');
    }

    private function resetForm()
    {
        $this->body = '';
    }

    public function render()
    {
        return view('livewire.comment-form');
    }
}
