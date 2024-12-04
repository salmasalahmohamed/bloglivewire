<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function HomePage(){
        return view('user.home-page');
    }
    public function myPost(){
        return view('user.my-post');
    }
    public function createPost(){
        return view('user.create-post');
    }


    public function editPost($id){
        $post=Post::find($id);
        return view('user.edit-post',get_defined_vars());
    }
    public function viewPost($id){
        $pos_datat=Post::where('id',$id)->get();
        return view('user.view-post',get_defined_vars());
    }
    public function loadProfile(){
        $logged_user = Auth::user();
        $user_profile_data = UserProfile::where('user_id',$logged_user->id)->first();
        $user_image = $user_profile_data->image;
        return view('user.user-profile',get_defined_vars());
    }

    public function loadGuestProfile($id){
        $logged_user = Auth::user();
        $guest_id = $id;
        $user_profile_data = UserProfile::where('user_id',$logged_user->id)->first();
        $user_image = $user_profile_data->image;
        return view('user.guest-profile',get_defined_vars());
    }
}
