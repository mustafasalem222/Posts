<?php

namespace App\Http\Controllers;


use App\Models\Employer;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'max:254', 'unique:users'],
            'password' => ['required', Password::min(5)->letters()->numbers()->max(100), 'confirmed']
        ]);

        // Add employer_id after validation
        $user = User::create($attributes);

        Employer::create([
            'user_id' => $user->id,
            'name' => fake()->company()
        ]);




        Auth::login($user);

        return redirect('/');
    }
}