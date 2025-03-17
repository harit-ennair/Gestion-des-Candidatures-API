<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{

    // public function create()
    // {
    //     return response()->json(['message' => 'User created successfully']);
    // }
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);
    //     User::create($request->all());
    //     return response()->json(['message' => 'User created successfully']);
    // }



   // Register a new user
   public function register(Request $request)
   {
       $validator = Validator::make($request->all(), [
           'name' => 'required',
           'email' => 'required|email|unique:users,email',
           'password' => 'required|min:6',
       ]);

       if ($validator->fails()) {
           return response()->json(['errors' => $validator->errors()], 400);
       }

       $user = User::create([
           'name' => $request->name,
           'email' => $request->email,
           'password' => bcrypt($request->password),
       ]);

       return response()->json(['message' => 'User registered successfully'], 201);
   }






    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required',
    //         'password' => 'required',
    //     ]);
        
    //     if (Auth::attempt($request->only('email', 'password'))) {
    //         $user = Auth::user();
    //         $token = $user->createToken('auth_token')->plainTextToken;
    //         return response()->json(['message' => 'Login successfully','token' => $token]);
    //     } else {
    //         return response()->json(['message' => 'Login failed'], 401);
    //     }
    // }


    // Login and get a token
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        if (!$token = JWTAuth::attempt($request->only('email', 'password'))) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json(['token' => $token]);
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


    public function me()
    {
        return response()->json(auth()->user());
    }

}
