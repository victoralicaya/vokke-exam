<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\KangarooRequest;
use App\Models\Kangaroo;
use Illuminate\Http\Request;

class KangaroosApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kangaroos = Kangaroo::all();

        return response()->json([
            'status' => true,
            'message' => 'Retrieved Successfully',
            'data' => $kangaroos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KangarooRequest $request)
    {
        $kangaroo = Kangaroo::create($request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Kangaroo Added',
            'data' => $kangaroo
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Kangaroo $kangaroo)
    {
        return response()->json([
            'status' => true,
            'message' => 'Retrieved Successfully',
            'data' => $kangaroo
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KangarooRequest $request, Kangaroo $kangaroo)
    {
        $kangaroo->update($request->validated());

        return response()->json([
            'status' => true,
            'message' => 'Kangaroo Updated',
            'data' => $kangaroo
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kangaroo $kangaroo)
    {
        //
    }
}
