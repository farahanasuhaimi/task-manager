<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function homepage()
    {
        return view('homepage');
    }

    public function register(Request $signup)
    {
        $incomingData = $signup->validate([
            'username' => ['required', 'string', 'min:3', 'max:15', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'string', 'min:6', 'max:20', 'confirmed']
        ]);


        $incomingData['password'] = Hash::make($incomingData['password']);

        $user = User::create($incomingData);
        auth()->login($user);
        return redirect('/')->with('success', 'You are now registered!');
    }

    public function login(Request $login)
    {
        $incomingData = $login->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required'
        ]);


        //$incomingData['password'] = Hash::make($incomingData['loginpassword']);

        if (auth()->attempt(['username' => $incomingData['loginusername'], 'password' => $incomingData['loginpassword']])) {
            //$login->session()->regenerate();
            //$user = User::find($UserAvaibility->id);
            //Auth::login($user); 

            return redirect('/')->with('success', 'You are now logged in!');
        } else {
            return redirect('/')->with('error', 'Invalid login credentials');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', 'You are now logged out!');
    }
}
