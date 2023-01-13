<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        // в итоге прозрачная логика
        $data = $request->validated(); // обработка запроса Реквест
        $post = $this->service->update($data, $post); // какое-то взаимодействие с базой

        return view('admin.post.show', compact('post')); // передаём ответ
    }
}
