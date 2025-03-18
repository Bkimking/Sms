<?php

namespace App\Http\Controllers;

use App\Models\aboutitem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutitemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutItem = aboutitem::first(); // Fetch first about item
        return view('welcome', compact('aboutItem'));
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
        // Check if there is any data in the AboutItem table
        $aboutItem = AboutItem::first();

        // If data exists, redirect to the edit page
        if ($aboutItem) {
            return redirect()->route('about.edit', $aboutItem->id);
        }

        // Otherwise, display the create page
        return view('kenswed.admin.about.create', compact('aboutItem'));
    }

    public function edit()
    {
        $aboutItem = AboutItem::first(); // Fetch first about item

        if (!$aboutItem) {
            return redirect()->route('about.create');
        }

        return view('kenswed.admin.about.edit', compact('aboutItem'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'abouttitle' => 'required|string|max:255',
            'aboutsubtitle' => 'nullable|string|max:255',
            'aboutparagraph' => 'required|string|max:500',
            'aboutimg' => 'nullable|image|mimes:jpeg,png,jpg|max:10485760',
        ]);

        $aboutItem = new AboutItem();
        $aboutItem->abouttitle = $request->abouttitle;
        $aboutItem->aboutsubtitle = $request->aboutsubtitle;
        $aboutItem->aboutparagraph = $request->aboutparagraph;

        if ($request->hasFile('aboutimg')) {
            $aboutItem->aboutimg = $request->file('aboutimg')->store('aboutimages', 'public');
        }

        $aboutItem->save();

        return redirect()->route('about.create')->with('success', 'Feature added successfully!');
    }
    /**
     * Show the form for update the specified resource.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'abouttitle' => 'required|string|max:255',
            'aboutsubtitle' => 'nullable|string|max:255',
            'aboutparagraph' => 'required|string|max:500',
            'aboutimg' => 'nullable|image|mimes:jpeg,png,jpg|max:10485760',
        ]);

        $aboutItem = AboutItem::findOrFail($id);
        $aboutItem->abouttitle = $request->abouttitle;
        $aboutItem->aboutsubtitle = $request->aboutsubtitle;
        $aboutItem->aboutparagraph = $request->aboutparagraph;

        if ($request->hasFile('aboutimg')) {
            if ($aboutItem->aboutimg && Storage::exists('public/' . $aboutItem->aboutimg)) {
                Storage::delete('public/' . $aboutItem->aboutimg);
            }

            $aboutItem->aboutimg = $request->file('aboutimg')->store('aboutimages', 'public');
        }

        $aboutItem->save();

        return redirect()->route('about.create')->with('success', 'Feature updated successfully!');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $aboutItem = AboutItem::findOrFail($id);

        if ($aboutItem->aboutimg && Storage::exists('public/' . $aboutItem->aboutimg)) {
            Storage::delete('public/' . $aboutItem->aboutimg);
        }

        $aboutItem->delete();

        return redirect()->route('about.create')->with('success', 'Feature deleted successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }
}
