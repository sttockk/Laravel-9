<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Pool;

class MainController extends Controller
{
    public function index()
    {
        $responses = Http::pool(fn (Pool $pool) => [
            $pool->as('posts')->get('https://gorest.co.in/public/v2/posts'),
            $pool->as('comments')->get('https://gorest.co.in/public/v2/comments'),
        ]);

        $new_posts = $responses['posts']->collect();
        $new_comments = $responses['comments']->collect();

        Post::firstOrAdd($new_posts);
        Comment::firstOrAdd($new_comments);

        $posts = Post::with('comments')->get();

        return view('api.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('api.show', compact('post'));
    }

}
