<?php

namespace App\Http\Controllers;

use App\Models\offers;
use App\Http\Requests\StoreoffersRequest;
use App\Http\Requests\UpdateoffersRequest;

class OffersController extends Controller
{
    public function index()
    {
        return response()->json(offers::all());
    }
    public function create()
    {
        return response()->json(['message' => 'offers created successfully']);
    }
    public function store(StoreoffersRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        offers::create($request->all());
        return response()->json(['message' => 'offers created successfully']);
    }
    public function show($id)
    {
        $offers = offers::find($id);
        return response()->json($offers);
    }
    public function edit($id)
    {
        $offers = offers::find($id);
        return response()->json($offers);
    }
    public function update(UpdateoffersRequest $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $offers = offers::find($id);
        $offers->update($request->all());
        return response()->json(['message' => 'offers updated successfully']);
    }
    public function destroy($id)
    {
        $offers = offers::find($id);
        $offers->delete();
        return response()->json(['message' => 'offers deleted successfully']);
    }
    
}
