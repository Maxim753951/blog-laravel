<?php

namespace App\Models;

use App\Notifications\SendVerifyWithQueueNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    const ROLE_ADMIN = 0; // НАЗВАНИЕ АТРИБКТА_ЧЕМУ СООТВЕТСТВУЕТ УСЛОВНЫЙ ID-ШНИК
    const ROLE_READER = 1;

    public static function getRoles()
    {
        // создаём Меппинг, то есть соответствия, что бы не приходили 0 и 1, а что-то нормальное
        return [
            self::ROLE_ADMIN => 'Admin', // 0 => 'Admin'
            self::ROLE_READER => 'Reader',
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // дописываем, что бы разрешить изменение данного атрибута в таблице
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sendEmailVerificationNotification()
    {
        // создаём своё собственное письмо (нужно для реализации очередей)
        $this->notify(new SendVerifyWithQueueNotification());
    }

    // многие ко многим
    public function likedPosts()
    {
        return $this->belongsToMany(Post::class, 'post_user_likes', 'user_id', 'post_id');
    }

    // один ко многим
    public function comments()
    {
        return $this->hasMany(Comment::class, 'user_id', 'id');
    }
}
