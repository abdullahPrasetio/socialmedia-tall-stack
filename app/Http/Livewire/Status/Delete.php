<?php

namespace App\Http\Livewire\Status;

use Livewire\Component;
use App\Models\Timeline\Status;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Delete extends Component
{
    use AuthorizesRequests;
    public $status;
    public function mount($hash)
    {
        $this->status = Status::with('user')->where('hash', $hash)->firstOrFail();
    }

    public function destroy()
    {
        $this->authorize('update', $this->status);
        $this->status->delete();
        return redirect()->route("account.show", $this->status->user->usernameOrHash);
    }
    public function render()
    {
        $this->authorize('update', $this->status);
        return view('livewire.status.delete')->extends("layouts.modal");
    }
}
