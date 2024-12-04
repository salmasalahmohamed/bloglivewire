<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditPost extends Component
{
    use WithFileUploads;
    public $title;
    public $content;
    public $photo;
    public Post $post;
    public function mount($post_data){
        $this->post=$post_data;
    }
    public function update(){
       $data= $this->validate([
            'title'=>'required',
            'content'=>'required',
           'photo'=>'required|image',


       ]);
        $this->post->update(['title'=>$this->title,'content'=>$this->content,'photo'=>$this->photo]);
        $this->photo->store('photos');

        $this->redirect('/my-post',navigate: true);

    }
    public function render()
    {
        return view('livewire.edit-post');
    }
}
