<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {
        // validate
        request()->validate([
            'body' => 'required'
        ]);

        // action
        $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);

        // redirect
        return back();
    }
}
