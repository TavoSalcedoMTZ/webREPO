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
            $user = Auth::user(); 
    
            $array = [
                'Nombre' => $user->name,
                'Email' => $user->email
            ];
    
            return view('test', ['data' => $array]);
        }
    }
    

    public function test(Request $request, string $name='Aguila'){
        $array=['Nombre'=> $name
        ,'Email'=>'prueba'
    ];
        return view ('test',['data'=>$array]);
    }
    public function showUpdate()
    {
        return view('update');
    }


    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $validated['name'];
        $user->email = $validated['email'];

        if (!empty($validated['password'])) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        $array=['Nombre' => $user->name,
        'Email'=>$user->email
    ];
    
        return view ('test',['data'=>$array]);

        
    }

    public function logout()
{
    Auth::logout();
    return redirect()->route('login');
}
}
