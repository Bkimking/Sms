<?php

namespace App\Http\Controllers;

use App\Models\HeaderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class HeaderitemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function manage()
    {
        $user = Auth::user();

        // Check if user is an admin and has an associated profile
        if ($user && $user->role == 1 && $user->admin) {
            $admin = $user->admin;

            // ✅ Check if profile fields are incomplete
            if (
                empty($admin->firstname) ||
                empty($admin->lastname) ||
                empty($admin->phone_number) ||
                empty($admin->address) ||
                empty($admin->gender)
            ) {
                return redirect()->route('admin.profile.edit')->with('warning', 'Please complete your profile to continue.');
            }
        }
        
        // Fetch all header items from the database
        $headerItems = HeaderItem::all();

        // Return the view with the fetched header items
        return view('kenswed.admin.header.manage', compact('headerItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        // Check if user is an admin and has an associated profile
        if ($user && $user->role == 1 && $user->admin) {
            $admin = $user->admin;

            // ✅ Check if profile fields are incomplete
            if (
                empty($admin->firstname) ||
                empty($admin->lastname) ||
                empty($admin->phone_number) ||
                empty($admin->address) ||
                empty($admin->gender)
            ) {
                return redirect()->route('admin.profile.edit')->with('warning', 'Please complete your profile to continue.');
            }
        }
        return view('kenswed.admin.header.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'headertitle' => 'required|string|max:255',
            'headersubtitle' => 'required|string|max:255',
            'headerparagraph' => 'required|string|max:500', // Allow longer text
            'headerimg' => 'nullable|image|mimes:jpeg,png,jpg|max:10485760', // 10MB limit
        ]);

        // Initialize a new HeaderItem instance
        $headerItem = new HeaderItem();
        $headerItem->headertitle = $request->headertitle;
        $headerItem->headersubtitle = $request->headersubtitle;
        $headerItem->headerparagraph = $request->headerparagraph;

        // Handle the file upload if present
        if ($request->hasFile('headerimg')) {
            // Check if the file size is greater than 10MB
            if ($request->file('headerimg')->getSize() > 10485760) { // 10MB in bytes
                return back()->with('error', 'Image size exceeds the 10MB limit.');
            }

            // Store the image in the 'public' disk
            $headerItem->headerimg = $request->file('headerimg')->store('headerimg', 'public');
        }

        // Save the HeaderItem to the database
        $headerItem->save();

        // Redirect back with a success message
        return redirect()->route('header.create')->with('success', 'Header item added successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(headeritem $headeritem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $headerItem = HeaderItem::findOrFail($id);

        return view('kenswed.admin.header.edit', compact('headerItem'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'headertitle' => 'required|string|max:255',
            'headersubtitle' => 'required|string|max:255',
            'headerparagraph' => 'required|string|max:500',
            'headerimg' => 'nullable|image|mimes:jpeg,png,jpg|max:10485760', // 10MB limit
        ]);

        // Retrieve the existing HeaderItem
        $headerItem = HeaderItem::findOrFail($id);
        $headerItem->headertitle = $request->headertitle;
        $headerItem->headersubtitle = $request->headersubtitle;
        $headerItem->headerparagraph = $request->headerparagraph;

        // Handle the file upload if a new image is provided
        if ($request->hasFile('headerimg')) {
            // Check if the file size is greater than 10MB
            if ($request->file('headerimg')->getSize() > 10485760) { // 10MB in bytes
                return back()->with('error', 'Image size exceeds the 10MB limit.');
            }

            // Delete the old image if it exists
            if ($headerItem->headerimg && Storage::exists('public/' . $headerItem->headerimg)) {
                Storage::delete('public/' . $headerItem->headerimg);
            }

            // Store the new image
            $headerItem->headerimg = $request->file('headerimg')->store('headerimages', 'public');
        }

        // Save the updated HeaderItem to the database
        $headerItem->save();

        // Redirect back with a success message
        return redirect()->route('header.manage')->with('success', 'Header item updated successfully!');
    }


    /**
     * Update the specified resource in storage.
     */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $headerItem = HeaderItem::findOrFail($id);
    if (!$headerItem) {
        return redirect()->route('header.manage')->with('error', 'Header item not found.');
    }
    $headerItem->delete();

    return redirect()->route('header.manage')->with('success', 'Header item deleted successfully!');
}

}
