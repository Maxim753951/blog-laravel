<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table ='comments';
    protected  $guarded = false;

    // Релэйшены (ну в html выводить из базы)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // get-тер в модели Laravel - это специальный приём, который помогает создать атрибут,
    // который потом можно вызывать, подобно тому, как мы чтото взываем из БД
    public function getDateAsCarbonAttribute() // верблюжья аннотация
    {
        //return 'aaa';
        return Carbon::parse($this->created_at);
    }
}
