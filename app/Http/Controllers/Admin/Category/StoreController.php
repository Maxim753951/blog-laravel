<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Models\Category;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        //dd($data);

        // из-за отсутствия реализации сложной логики обойдёмся без Сервисов
        //Category::create($data); // нет проверки на уникальность значения, что здесь, что в базе
        //Category::firstOrCreate(['title' => $data['title']], [ // по каким ключам искать в базе
        //    'title' => $data['title'] // создание по этому правилу в случае отсутствия найденного
        //]);
        //Category::firstOrCreate(['title' => $data['title']]); // можно при провеке и создании по 1 ключу
        Category::firstOrCreate($data); // можно так, если ключ называется как в базе

        return redirect()->route('admin.category.index');
    }
}
