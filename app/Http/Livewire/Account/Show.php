<?php

namespace App\Http\Livewire\Account;

use App\Models\User;
use Livewire\Component;
use App\Models\Timeline\Status;

class Show extends Component
{
    public $user;
    public $perPage = 10;
    public $bio;
    public $readmore = true;
    public $character = 120;
    public function loadMore()
    {
        $this->perPage += 10;
    }

    public function readMore()
    {
        $this->bio = $this->user->description;
        $this->readmore = false;
    }

    public function less()
    {
        $this->bio = \Str::limit($this->user->description, $this->character);
        $this->readmore = true;
    }

    public function mount($identifier)
    {
        $this->user = User::where('username', $identifier)->orWhere('hash', $identifier)->firstOrFail();
        $this->bio = \Str::limit($this->user->description, $this->character);
    }
    public function render()
    {
        $statuses = Status::with('user')->where('user_id', $this->user->id)->latest()->paginate($this->perPage);
        return view('livewire.account.show', compact('statuses'));
    }
}
