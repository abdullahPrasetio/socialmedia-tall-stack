<?php

namespace App\Models\Timeline;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $withCount = ['comments'];
    protected $with = ['comments'];
    protected $fillable = [
        'hash',
        'body'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getPublishedAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
