<?php

namespace App\Http\Controllers;

use App\Models\offers_user;
use App\Http\Requests\Storeoffers_userRequest;
use App\Http\Requests\Updateoffers_userRequest;

class OffersUserController extends Controller
{
    public function index()
    {
        return response()->json(offers_user::all());
    }
    public function create()
    {
        return response()->json(['message' => 'offers_user created successfully']);
    }
    public function store(Storeoffers_userRequest $request)
    {
        $request->validate([
            'cv' => 'required',
        ]);
        offers_user::create($request->all());
        return response()->json(['message' => 'offers_user created successfully']);
    }
    public function show($id)
    {
        $offers_user = offers_user::find($id);
        return response()->json($offers_user);
    }
    public function edit($id)
    {
        $offers_user = offers_user::find($id);
        return response()->json($offers_user);
    }
    public function update(Updateoffers_userRequest $request, $id)
    {
        $request->validate([
            'cv' => 'required',
        ]);
        $offers_user = offers_user::find($id);
        $offers_user->update($request->all());
        return response()->json(['message' => 'offers_user updated successfully']);
    }
    public function destroy($id)
    {
        $offers_user = offers_user::find($id);
        $offers_user->delete();
        return response()->json(['message' => 'offers_user deleted successfully']);
    }
}
