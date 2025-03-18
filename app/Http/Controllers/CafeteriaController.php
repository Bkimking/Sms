<?php

namespace App\Http\Controllers;

use App\Models\cafeteria;
use Illuminate\Http\Request;

class CafeteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function dashboard()
    {
        return view('kenswed/cafeteria/dashboard');
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
    public function show(cafeteria $cafeteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cafeteria $cafeteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cafeteria $cafeteria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cafeteria $cafeteria)
    {
        //
    }
}
