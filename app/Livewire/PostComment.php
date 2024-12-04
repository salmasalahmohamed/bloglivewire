<?php

namespace App\Livewire;

use App\Models\Comment;
use Livewire\Component;

class PostComment extends Component
{
    public $post_id;
    public $comment = '';
    public $postComments;
    public function mount($postId){
        $this->post_id = $postId;
        $this->postComments = Comment::with('users',function ($q) use($postId){
            $q->where('post_id',$postId)->get();
        });
    }
    public function leaveComment()
    {
        $this->validate([
            'comment' => 'required'
        ]);
        $createComment = new Comment;
        $createComment->user_id = auth()->user()->id;
        $createComment->post_id = $this->post_id;
        $createComment->comment = $this->comment;
        $createComment->save();

        $this->postComments = Comment::with('users', function ($q) use ($postId) {
            $q->where('post_id', $postId)->get();
        });
    }
    public function render()
    {
        return view('livewire.post-comment');
    }
}
