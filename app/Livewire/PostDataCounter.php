<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostDataCounter extends Component
{
    public $postLikes;

    public function mount(){
        $this->postLikes = Post::with('likes',function ($q){
            $q->where('user_id',auth()->user()->id)->count();
        });
    }
    public function render()
    {
        return view('livewire.post-data-counter');
    }
}
