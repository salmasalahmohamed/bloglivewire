<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\PostViewer;
use Livewire\Component;

class ViewPostComponent extends Component
{
    public  Post$post;
    public function mount(){
        $this->post=Post::with('user')->orderBy('created_at','desc')->get();
    }
    public function addViewers($postId){

        $addviewer = new PostViewer;
        $addviewer->user_id = auth()->user()->id;
        $addviewer->post_id = $postId;
        $addviewer->save();
    }
    public function render()
    {
        return view('livewire.view-post-component');
    }
}
