<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{

    public function create()
    {
        return view('pages.auth.register');
    }


    public function store(Request $request)
    {   
        $request->validate(
            [
                'name'       => 'required|string|max:255',
                'email'      => 'required|string|email|max:255|unique:users',
                'password'   => ['required'],
            ],
            [
                'nome.required'     => "O campo nome é obrigatório",
                'email.required'    => "O campo email é obrigatório",
                'password.required' => "O campo senha é obrigatório",

            ]
        );

        $user = User::create([
            'name'       => $request->name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
        ]);

        return redirect()->route('login')->withSuccess("Usuário cadastrado com sucesso");
    }

}
