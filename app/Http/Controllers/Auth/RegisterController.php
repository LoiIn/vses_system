<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function register(RegisterRequest $request){
        $accountInput = $request->only(['name','email','password']);
        $accountInput['password'] = Hash::make($accountInput['password']);
        $user = User::create($accountInput);
        $user->save();
        Auth::login($user);
        return redirect()->route('home');
    }
}
