<?php

namespace App\Livewire;

use Livewire\Component;

class PostViewer extends Component
{
    public $post_viewers;
    public function mount($postId){
        // count the viewers of specific post
        $this->post_viewers = PostViewer::where('post_id',$postId)->count();
    }
    public function render()
    {
        return view('livewire.post-viewer');
    }
}
