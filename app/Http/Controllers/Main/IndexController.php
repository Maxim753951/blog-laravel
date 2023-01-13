<?php

namespace App\Http\Controllers\Main;

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

        /*
        $posts = Post::paginate(3);

        $randomPosts = Post::get()->random(4); // коллекции в Laravel = массивы
        //dd($randomPosts);

        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
        //dd($likedPosts);

        //return 'bbb'; //опять тест возврата
        return view('main.index', compact('posts', 'randomPosts', 'likedPosts')); // просто + путь к resources.views.
        */

        // короче так, что бы сохранить концепцию роутинга и наименований, но вообще лучше нормально, то есть роутиться в main
        return redirect()->route('post.index');
    }
}
