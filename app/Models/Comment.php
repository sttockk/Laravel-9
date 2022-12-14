<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public static function firstOrAdd($comments)
    {
        foreach ($comments as $comment) {
            Comment::firstOrCreate([
                'body' => $comment['body'],
            ],[
                'id' => $comment['id'],
                'post_id' => $comment['post_id'],
                'name' => $comment['name'],
                'email' => $comment['email'],
                'body' => $comment['body'],
            ]);
        }
    }
}
