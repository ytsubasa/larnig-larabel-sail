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
use App\Http\Requests\RegisterUserRequest;

class RegisterController extends Controller
{
    public function create()
    {
        return view('regist.register');
    }

    public function store(RegisterUserRequest $request)
    {


        $varidated = $request->validated();

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