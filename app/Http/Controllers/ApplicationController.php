<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function submitApplication(Request $request)
    {
        $validatedData = $request->validate([
            'surname' => 'required|string',
            'first_name' => 'required|string',
            'email' => 'required|email|unique:applications,email',
            'dob' => 'required|date',
            'gender' => 'required|string',
            'tel' => ['required', 'regex:/^(?:\+254|0)[17][0-9]{8}$/'],
            'kcpe_certificate' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
            'kcse_certificate' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
            'kin_name' => 'required|string',
            'kin_email' => 'required|email',
            'kin_id' => 'required|string',
            'kin_tel' => ['required', 'regex:/^(?:\+254|0)[17][0-9]{8}$/'],
            'selected_id' => 'required',
            'type' => 'required|in:course,subcourse',
            'agreetorules' => 'accepted',
        ]);

        $kcpe_certificate_path = $request->hasFile('kcpe_certificate') ? $request->file('kcpe_certificate')->store('certificates', 'public') : null;
        $kcse_certificate_path = $request->hasFile('kcse_certificate') ? $request->file('kcse_certificate')->store('certificates', 'public') : null;

        Application::create([
            'surname' => $validatedData['surname'],
            'first_name' => $validatedData['first_name'],
            'email' => $validatedData['email'],
            'dob' => $validatedData['dob'],
            'gender' => $validatedData['gender'],
            'tel' => $validatedData['tel'],
            'kcpe_certificate' => $kcpe_certificate_path,
            'kcse_certificate' => $kcse_certificate_path,
            'kin_name' => $validatedData['kin_name'],
            'kin_email' => $validatedData['kin_email'],
            'kin_id' => $validatedData['kin_id'],
            'kin_tel' => $validatedData['kin_tel'],
            'course_id' => $validatedData['type'] === 'course' ? $validatedData['selected_id'] : null,
            'subcourse_id' => $validatedData['type'] === 'subcourse' ? $validatedData['selected_id'] : null,
            'status' => 'pending',
        ]);

        return redirect()->route('apply.page', ['type' => $validatedData['type'], 'id' => $validatedData['selected_id']])->with('success', 'Application submitted successfully! Await admin approval.');
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
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Application $application)
    {
        //
    }
}
