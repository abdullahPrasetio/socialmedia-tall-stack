<?php

namespace App\Http\Livewire\Status;

use Livewire\Component;
use App\Models\Timeline\Status;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Edit extends Component
{
    use AuthorizesRequests;
    public $status;
    public $body;

    public function mount($hash)
    {
        $this->status = Status::where('hash', $hash)->firstOrFail();
        $this->body = $this->status->body;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            "body" => "required"
        ]);
    }

    public function update()
    {
        $this->authorize('update', $this->status);
        $this->validate([
            "body" => "required"
        ]);
        $this->status->update([
            "body" => $this->body
        ]);
        return redirect()->route("status.show", $this->status->hash);
    }
    public function render()
    {
        $this->authorize('update', $this->status);
        return view('livewire.status.edit')->extends('layouts.app');
    }
}
