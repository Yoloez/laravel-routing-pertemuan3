<?php

namespace App\Http\Controllers;

use App\Models\OddyModel;
use Illuminate\Http\Request;

class Oddy extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = OddyModel::query();
        $oddy_data = $query->get();
        $oddy_limit = $query->limit(5)->get();
        
        return view('image', compact('oddy_data', 'oddy_limit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
