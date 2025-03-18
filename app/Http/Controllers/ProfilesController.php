<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilesController extends Controller
{
    /**
     * Show the form for creating a new profile.
     */

    /**
     * Store a newly created profile in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'firstname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255', // Include middlename in validation
            'lastname' => 'required|string|max:255',
            'profile_pic' => 'nullable|image|max:10485760', // 10MB limit
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:500',
        ]);

        $user = Auth::user();

        // Update user information
        $user->name = $request->username;
        $user->email = $request->email;
        $user->save();

        // Create a new profile
        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->firstname = $request->firstname;
        $profile->middlename = $request->middlename; // Add middlename
        $profile->lastname = $request->lastname;
        $profile->phone_number = $request->phone_number;
        $profile->address = $request->address;

        if ($request->hasFile('profile_pic')) {
            // Check if the file size is greater than 10MB
            if ($request->file('profile_pic')->getSize() > 10485760) { // 10MB in bytes
                return back()->with('error', 'Image size exceeds the 10MB limit.');
            }
            $profile->profile_pic = $request->file('profile_pic')->store('profile_pic', 'public');
        }

        $profile->save();

        return redirect()->route('profiles.edit')->with('success', 'Profile created successfully.');
    }


    /**
     * Show the form for editing the profile.
     */
    public function edit()
    {
        $user = Auth::user();
        $profile = $user->profile ?? new Profile(); // Provide an empty Profile object if none exists

        return view('kenswed.admin.profiles.edit', [
            'profile' => $profile,
            'User' => $user,
        ]);
    }


    /**
     * Update the specified profile in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'firstname' => 'required|string|max:255',
            'middlename' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'profile_pic' => 'nullable|image|max:2048',
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:500',
        ]);

        $user = Auth::user();
        $profile = $user->profile ?? new Profile(); // Use an empty Profile if it doesn't exist

        $user->name = $request->username;
        $user->email = $request->email;
        $user->save();

        $profile->user_id = $user->id;
        $profile->firstname = $request->firstname;
        $profile->middlename = $request->middlename;
        $profile->lastname = $request->lastname;
        $profile->phone_number = $request->phone_number;
        $profile->address = $request->address;

        if ($request->hasFile('profile_pic')) {
            $profile->profile_pic = $request->file('profile_pic')->store('profile_pics', 'public');
        }

        $profile->save();

        return redirect()->route('profiles.edit')->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified profile from storage.
     */
    public function destroy()
    {
        $user = Auth::user();

        if ($user->profile) {
            $user->profile->delete();
            return redirect()->route('home')->with('success', 'Profile reset successfully.');
        }

        return redirect()->route('home')->with('error', 'No updated profile found to delete.');
    }
}
