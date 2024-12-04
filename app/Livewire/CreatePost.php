<?php

namespace App\Livewire;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePost extends Component
{
    use WithFileUploads;
    public $title;
    public $content;
    public $photo;
  public function save(){
      $this->validate([
          'title'=>'required',
          'content'=>'required',
'photo'=>'required|image',
      ]);

      Post::create(['title'=>$this->title,'content'=>$this->content, 'user_id'=>Auth::user()->id,
          'photo'=>$this->photo
      ]);
      $this->photo->store('photos');

      $this->title='';
      $this->content='';
      $this->redirect('/home',navigate: true);

  }




    public function render()
    {
        return view('livewire.create-post');
    }
}
