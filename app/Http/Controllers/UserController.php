<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    // Muestra el formulario de registro
    public function showRegister()
    {
        return view('register');
    }

    // Procesa el formulario de registro
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login'); 
    }
   
    public function showLogin()
    {
        return view('login');
    }

    
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            echo "Usuario autenticado: " . Auth::user()->name;
            echo "Correo: " .Auth::user()->email;

            test();
        }


    }

    public function test(Request $request, string $name='Aguila'){
        $array=['Nombre'=> $name
        ,'Email'=>'prueba'
    ];
        return view ('test',['data'=>$array]);
    }
}