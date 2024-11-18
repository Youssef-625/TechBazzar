<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {

        return view('Admin.Users.index', [
            'users' => User::with('orders')->latest()->where('is_admin', '0')->simplePaginate(10),
        ]);
    }

    public function edit(User $user)
    {
        return view('Admin.Users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $attributes = $request->validate([
            'name' => ['string', 'required', 'min:3'],
            'email' => ['required', 'email',],
            'phone_number' => ['required'],
            'address' => ['required'],
        ]);
        if ($request['password']) {
            $request->validate(['password' => ['confirmed']]);
            $attributes['password'] = $request->password;
        }

        $user->update($attributes);
        return redirect('/admin/users');
    }
}
