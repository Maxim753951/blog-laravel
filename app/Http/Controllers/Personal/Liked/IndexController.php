<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = auth()->user()->likedPosts; // для возврата именно от нынешнего пользователя сайта
        //dd($posts); // вывод инфы из созданного нами атрибута likedPosts
        return view('personal.liked.index', compact('posts'));
    }
}
