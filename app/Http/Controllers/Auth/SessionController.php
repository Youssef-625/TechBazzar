<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Gate;
use Illuminate\Http\Request;
use function back;
use function redirect;
use function view;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $user = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (!Auth::attempt($user)) {
            return back()->withErrors([
                'email' => 'Sorry , those credentials do not match'
            ]);
        }
        if(Gate::allows('is_admin'))
        {
            return redirect('/admin/');
        }
        $request->session()->regenerate();
        return redirect('/');
    }

    public function destroy()
    {
        auth()->logout();
        return redirect('/');
    }
}
