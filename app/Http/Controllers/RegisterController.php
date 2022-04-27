<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', ["active" => "Register"]);
    }

    public function store(Request $request)
    {
        // $request = request()->all();
        $validate = $request->validate([
            'name' => 'required|max:255|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255',
        ]);

        $validate['password'] = Hash::make($validate['password']);

        $registration = User::create($validate);
        if (!$registration) {
            return redirect('/register')->with('error', 'Register Failed');
        }

        return redirect('/login')->with('success', 'Register Success');
    }
}
