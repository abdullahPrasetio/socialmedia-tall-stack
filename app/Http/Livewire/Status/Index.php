<?php

namespace App\Http\Livewire\Status;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Timeline\Status;

class Index extends Component
{
    use WithPagination;
    public $perPage = 10;
    public $statusId;
    protected $listeners = ['updateTimeline'];

    public function updateTimeline()
    {
    }
    public function loadMore()
    {
        // sleep(1);
        $this->perPage += 10;
    }

    public function render()
    {
        $ids = auth()->user()->follows()->pluck('id');
        $ids->push(auth()->id());
        $statuses = Status::whereIn('user_id', $ids)->with('user')->latest()->paginate($this->perPage);
        return view('livewire.status.index', compact('statuses'));
    }
}
