<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Follower;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class MyPost extends Component
{
    public $my_Posts;
    public $post_count;
    public $my_comments_count;
    public $my_followers_count;
    public function mount(){
        $this->my_Posts=Post::where('user_id',Auth::user()->id)->get();
        $this->post_count=Post::where('user_id',Auth::user()->id)->count();
        $this->my_comments_count = Comment::where('user_id',$user_id)->count(); //here we will include also the comments this user has commented.. to make things easier
        $this->my_followers_count = Follower::where('followed_id',$user_id)->count();

    }
    public function deletePost($id){
        Post::destroy($id);
        session()->flash('message','post successfully deleted');
        $this->redirect('/my-post',navigate: true);

    }
    public function render()
    {
        return view('livewire.my-post',[
            'posts'=>$this->my_Posts,
            'post_count'=>$this->post_count,
            'comment_count' => $this->my_comments_count,
            'follower_count' => $this->my_followers_count,
        ]);
    }
}
