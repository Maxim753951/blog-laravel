<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        /*
        // если мы работаем с несколькими моделями (обращаемся к нескольким таблицам в одном запросе) -
        // - лучше использовать Транзакции (try), иначе возможно дублирование... запроса?
        try {
        $data = $request->validated();


        //dd($data); //проверка редактирования текста
        //$previewImage = $data['preview_image'];
        //$mainImage = $data['main_image'];
        //$previewImagePath = Storage::put('/images', $previewImage);
        //dd($previewImagePath);
        //Post::firstOrCreate($data);


        //dd($data); //проверяем теги
        $tagIds = $data['tag_ids'];
        unset($data['tag_ids']);

        // перепишем по красоте
        //$data['preview_image'] = Storage::put('/images', $data['preview_image']); сделаем конкртней с disk
        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
        $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);

        //dd($data); //проверка получения id категории

        $post = Post::firstOrCreate($data);

        $post->tags()->attach($tagIds);
        } catch (\Exception $exception){
            abort(404);
        }

        return redirect()->route('admin.post.index');
        */

        $data = $request->validated(); // на верху так как обработка (зона http)
        $this->service->store($data);

        return redirect()->route('admin.post.index');
    }
}
