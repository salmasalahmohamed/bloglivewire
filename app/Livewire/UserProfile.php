<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class UserProfile extends Component
{
    public $user_data;

    public function mount(){
        $this->user_data = User::with('user')
            ->where('user_profiles.user_id',auth()->user()->id)
            ->first();
    }


    public function render()
    {
        return view('livewire.user-profile');
    }
}
