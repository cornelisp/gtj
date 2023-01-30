<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Pokaż form do rejestracji
    public function create() {
        return view('users.register');
    }

    // Tworzenie nowego użytkownika 
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

 
        $formFields['password'] = bcrypt($formFields['password']);

        // Zarejestruj
        $user = User::create($formFields);

        // Zaloguj
        auth()->login($user);

        return redirect('/')->with('message', 'Konto założone pomyślnie');
    }


    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Pomyślnie wylogowano!');

    }

    // Form logowania
    public function login() {
        return view('users.login');
    }

    // Autentykacja
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Pomyślnie zalogowano!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
