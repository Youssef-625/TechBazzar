<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use function dd;
use function redirect;
use function view;

class RegisterController extends Controller
{
    public function create(Request $request)
    {
        return view('auth.register');
    }
    public function store(Request $request)
    {
        $user=$request->validate([
            'name' => ['string','required','min:3'],
            'email' =>['required','email','unique:users'],
            'password'=> ['required','confirmed'],
            'phone_number'=>['required'],
            'address'=>['required'],
        ]);

        Auth::login(User::create($user));
        return redirect('/');
    }
}
