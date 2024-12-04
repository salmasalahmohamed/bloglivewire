<?php

namespace App\Livewire;

use Livewire\Component;

class ProfileImage extends Component
{
    public $user_id;
    public $user_image;
    public function mount($userId){
        $this->user_id = $userId;
        $user_data = UserProfile::where('user_id',$this->user_id)
            ->first(['image']);

        $this->user_image = $user_data->image ?? '';
    }
    public function render()
    {
        return view('livewire.profile-image');
    }
}
