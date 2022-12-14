<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function firstOrAdd($posts)
    {
        foreach ($posts as $post) {
            Post::firstOrCreate([
                'title' => $post['title'],
            ],[
                'id' => $post['id'],
                'user_id' => $post['user_id'],
                'title' => $post['title'],
                'body' => $post['body'],
            ]);
        }
    }
}
