<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use App\Models\Post;

class DeleteController extends Controller
{
    public function __invoke(Post $post)
    {
        auth()->user()->likedPosts()->detach($post->id);
        // () что бы создать запрос в базу, иначе полученная коррекция

        return redirect()->route('personal.liked.index');
    }
}
