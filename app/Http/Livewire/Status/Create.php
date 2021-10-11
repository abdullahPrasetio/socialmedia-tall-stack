<?php

namespace App\Http\Livewire\Status;

use Livewire\Component;

class Create extends Component
{
    public $body;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'body' => 'string|max:255'
        ]);
    }
    public function store()
    {
        $this->validate([
            'body' => 'required'
        ]);
        auth()->user()->statuses()->create([
            'hash' => \Str::random(22) . strtotime(now()),
            'body' => $this->body
        ]);
        // return redirect()->to("/timeline");
        $this->body = "";
        $this->emit("updateTimeline");
    }
    public function render()
    {
        return view('livewire.status.create');
    }
}
