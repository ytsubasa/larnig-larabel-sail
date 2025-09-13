<?php

declare(strict_types=1);

namespace APP\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;

class RegisterController extends Controller
{
    public function create()
    {
        return view('regist.register');
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'name'   => 'required|string|max:255',
                'email'  => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|confirmed|min:8',
            ],
            [
                'name.required' => '名前は必ず入力してください',
                'name.max'      => '名前は最大20文字まで入力できます',
                'email.required' => 'メールアドレスは必ず入力してください',
                'email.email'    => 'メールアドレスの形式が正しくありません',
                'email.max'      => 'メールアドレスは最大255文字まで入力できます',
                'password.min'      => 'パスワードはしっかり入力しやがれ'
            ]
        );

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

         return view('regist.complete', compact('user'));

    }

      public function authorize()
        {
            return true;
        }

       
   
}




//リダイレクト処理ーsse


final class RedirectActon extends Controller
{

    public function __invoke(Request $requst): RedirectResponse
    {

        return response()->stream(
            function () {
                while (true) {
                    echo 'data: ' . rand(1. 100) . "\n\n";
                    ob_flush();
                    flush();
                    usleep(200000);
                }
            };
            Response::HTTP_OK;
            [
                'content-type' => 'text/event-stream',
                'X-Accel=Buffering' => 'no',
                'Cache-Control' => 'no-cache',
            ]
        )



    }
}