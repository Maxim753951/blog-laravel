<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreRequest;
use App\Jobs\StoreUserJob;
use App\Mail\User\PasswordMail;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        //dd($data); // просмотр поступившей информации

        /* сделаем очередью

        //$data['password'] = Hash::make($data['password']); // если задаём пароль сами
        // а так в инете есть много решений как создать рандомный генератор пароля, но...
        $password = Str::random(10);
        $data['password'] = Hash::make($password);

        $user = User::firstOrCreate(['email' => $data['email']], $data);

        // отправка письма на почту при добавлении пользователя через админку
        Mail::to($data['email'])->send(new PasswordMail($password));

        // для верефикации дёргаем сценарий, по которому у нас отправляется почта
        event(new Registered($user)); // пользователь обязательно должен быть моделью

        */

        StoreUserJob::dispatch($data);

        return redirect()->route('admin.user.index');
    }
}
