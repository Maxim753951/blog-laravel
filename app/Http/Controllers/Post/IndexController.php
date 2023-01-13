<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    // мы будем использовать однометодные контроллеры, то есть не будет Экшинов, просто Инвоук
    public function __invoke()
    {
        // приобращении к этому контроллеру будет автоматически вызываться этот метод, в котором
        // Экшион подразумевается по умолчанию
        // TODO: Implement __invoke() method.

        $posts = Post::paginate(3);
        //dd($posts);

        $randomPosts = Post::get()->random(2); // коллекции в Laravel = массивы
        //dd($randomPosts);

        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(5);
        //dd($likedPosts);

        //return 'bbb'; //опять тест возврата
        return view('post.index', compact('posts', 'randomPosts', 'likedPosts')); // просто + путь к resources.views.
    }
}
