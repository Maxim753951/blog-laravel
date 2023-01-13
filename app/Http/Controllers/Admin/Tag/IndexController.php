<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;

class IndexController extends Controller
{
    public function __invoke()
    {
        $tags = Tag::all();
        //dd(111);
        return view('admin.tag.index', compact('tags'));
    }
}
