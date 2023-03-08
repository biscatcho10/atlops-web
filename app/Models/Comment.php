<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'order_id',
        'parent_id',
        'comment'
    ];

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function orders(){
        return $this->belongsTo(Order::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class,'parent_id');
    }

    public function getUserInfo($id)
    {
        $user = User::where('id', $id)->first();
        return $user;
    }


    public function getChildComment(){
        $self_comments = Comment::where('parent_id', $this->id)->get();
        return $self_comments ?? [];
    }
}
