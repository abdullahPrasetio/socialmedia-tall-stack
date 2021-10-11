<?php

namespace App\Http\Livewire\Comment;

use Livewire\Component;
use App\Models\Timeline\Comment;

class Index extends Component
{
    public $status;
    public $body = "";
    public $commentId;
    public $commentParentId;
    protected $listeners = [
        'commentAdded'
    ];

    public function commentAdded($commentId)
    {
    }

    public function showReplyForm($id)
    {
        $this->commentParentId = $id;
        $username = Comment::find($this->commentParentId)->user->usernameOrHash;
        $this->body = "@{$username} ";
    }

    public function reply()
    {
        $this->validate([
            "body" => "required"
        ]);
        // dd($this->commentParentId);
        auth()->user()->comments()->create([
            'hash' => \Str::random(22) . strtotime(now()),
            'status_id' => $this->status->id,
            'parent_id' => $this->commentParentId ?? null,
            "body" => $this->body
        ]);

        $this->body = "";
    }
    public function mount($status)
    {
        $this->status = $status;
    }
    public function render()
    {
        // $comments = Comment::where('status_id', $this->status->id)->get();
        $comments = $this->status->comments()->where('parent_id', null)->withCount('children')->get();
        return view('livewire.comment.index', compact('comments'));
    }
}
