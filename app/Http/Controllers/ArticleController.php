<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return [1,2,3];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json([
            "message" => "Article created successfully",
            "data" => $request->all()
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return [
            "id" => $id,
            "title" => "simple title",
            "body" => "body"
                ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
