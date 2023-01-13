<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes; // это отдельный Трейд (дополнение к классу)

    // прописывается сразу после создания модели (базы данных)
    protected $table ='categories'; //в принципе laravel связал автоматически, но
    //для привычке и потенциальных требований компании - явная привязка к таблицам
    protected  $guarded = false; // это правило нужно, что мы мы могли изменять данные в таблице
    //иначе ошибка Филлэбл (нет разрешённых колонок для изменения), то есть не поменять миграцию

    public function posts()
    {
        return $this->hasMany(Post::class, 'category_id', 'id');
    }
}
