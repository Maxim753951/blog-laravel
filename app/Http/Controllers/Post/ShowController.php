<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Carbon\Carbon;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {
        // локализация в app.Providers.AppServiceProvider.php
        $date = Carbon::parse($post->created_at);
        //dd($date->format('Y---m---d'));
        //dd($date->translatedFormat('F'));

        // Чэйнинг - написание запроса цепочкой строк
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=', $post->id)
            ->get()
            ->take(3);
        //dd($relatedPosts);

        return view('post.show', compact('post', 'date', 'relatedPosts'));
    }
}
