<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController
{
    public function showUserRegister() {
        return view('users_views.user_register_form'); 
    }

    public function doRegister(Request $request) {
        $validator = Validator::make(
            $request->all(),
            [
                "name"=>"required|string|max:20",
                "email"=> "required|email:rfc,dns|unique:App\Models\User,email",
                "password"=>"required|min:5|max:20|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/",
                "password_repeat"=>"required|same:password"
            ],[
                "name.required" => "El nombre es obligatorio",
                "name.string" => "El nombre debe ser un texto",
                "name.max" => "El nombre debe contener 20 carácteres máximo",
                "email.required" => "El email es obligatorio",
                "email.email" => "El email debe ser un email válido",
                "email.unique" => "El email ya está en uso",
                "password.required" => "La contraseña es obligatoria",
                "password_repeat.required" => "La confirmación de la contraseña es obligatoria",
                "password.min" => "La contraseña debe contener 5 carácteres mínimo",
                "password.max" => "La contraseña debe contener 20 carácteres máximo",
                "password.regex" => "La contraseña debe contener una minúscula, una mayúscula y un dígito",
                "password_repeat.same" => "Las contraseñas no coinciden"
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        

        $datosUsuario = $request->all();
        $user = new User();
        $user->name = $datosUsuario['name'];
        $user->email = $datosUsuario['email'];
        $user->password = $datosUsuario['password'];
        $user->save();

        return view('users_views.login');
    }

    public function showLogin() {
        return view('users_views.login');
    }


    public function doLogin(Request $request) {
        $validator = Validator::make(
            $request->all(),
            [
                "email" => "required|email:rfc,dns|exists:App\Models\User,email",
                "password" => "required",
            ],
            [
                "email.required" => "El email es obligatorio",
                "password.required" => "La contraseña es obligatoria",
            ]
        );

        if ($validator->fails()) {
            return redirect()->route('login')->withErrors($validator)->withInput();
        }

        $userEmail = $request->get('email');
        $userPassword = $request->get('password');
        $user = User::where('email', $userEmail)->first();
        if(!password_verify($userPassword, $user->password)) {
            $validator->errors()->add('credentials', 'Credenciales incorrectas');
            return redirect()->route('login')->withErrors($validator)->withInput();
        }

        $credentials = [
            'email' => $user->email,
            'password' => $userPassword,
        ];

        if (Auth::attempt($credentials)) { 
            $request->session()->regenerate();
            
            
            $user = User::where('email', $userEmail)->first();
            return redirect()->route('posts.index', ['id' => $user->id]);
        
        }

    }
}