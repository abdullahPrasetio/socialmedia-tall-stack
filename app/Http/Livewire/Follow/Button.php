<?php

namespace App\Http\Livewire\Follow;

use Livewire\Component;

class Button extends Component
{
    public $user;

    public function mount($user)
    {
        $this->user = $user;
    }
    public function follow()
    {
        auth()->user()->follow($this->user);
        // untuk realtime
        $this->emit('statisticUpdated');
    }

    public function unfollow()
    {
        auth()->user()->unfollow($this->user);
        // untuk realtime
        $this->emit('statisticUpdated');
    }

    public function render()
    {
        return view('livewire.follow.button');
    }
}
