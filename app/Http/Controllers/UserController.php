<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function create()
    {
        return response()->json(['message' => 'User created successfully']);
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        User::create($request->all());
        return response()->json(['message' => 'User created successfully']);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->all())) {
            return response()->json(['message' => 'Login successfully']);
        } else {
            return response()->json(['message' => 'Login failed']);
        }
    }
    public function edit($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::find($id);
        $user->update($request->all());
        return response()->json(['message' => 'User updated successfully']);
    }

}
