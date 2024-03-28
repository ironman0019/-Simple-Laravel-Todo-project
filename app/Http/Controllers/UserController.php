<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // show register form
    public function create()
    {
        return view('users.signup');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed',
        ]);

        //hash password
        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        // Login user
        auth()->login($user);

        return redirect(route('post.index'))->with('message', 'user signup and login successfully!');

    }

    // show login page
    public function login()
    {
        return view('users.login');
    }

    // login user
    public function auth(Request $request)
    {
        $formFields = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(auth()->attempt($formFields)) {
            
            $request->session()->regenerate();

            return redirect(route('post.index'))->with('message', 'You are Logged in!');
        }

        return back()->withErrors(['email' => 'invalid cardentials!'])->onlyInput('email');
    }

    // log out
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect(route('post.index'))->with('message', 'You have been logged out!');
    }
}
