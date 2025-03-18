<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Staffid;
use App\Models\Admin;

class StaffController extends Controller
{
    // Show Add Staff Form
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
        return view('kenswed.admin.staffs.add'); // Ensure this Blade file exists
    }

    // Store a new staff member
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'role' => 'required|in:1,3,4,5,7',
            'password' => 'required|min:8',
            'staff_id' => 'required|string|max:255|unique:staffids,staff_id', // Ensure staff_id is provided & unique
        ]);

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        // Store staff_id in the staffids table
        Staffid::create([
            'user_id' => $user->id, // Link to the user
            'staff_id' => $request->staff_id, // Use the provided staff_id
        ]);

        return redirect()->route('staff.manage')->with('success', 'Staff member added successfully!');
    }

    // Show all staff members
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

        // Fetch all staff members along with their staff_id, profile picture, and additional details
        $staff = User::leftJoin('staffids', 'users.id', '=', 'staffids.user_id')
            ->leftJoin('admins', 'users.id', '=', 'admins.user_id') // Join with admins table
            ->select(
                'users.id',
                'users.name',
                'users.email',
                'users.role',
                'staffids.staff_id',
                'admins.firstname',
                'admins.middlename',
                'admins.lastname',
                'admins.profile_pic',
                'admins.phone_number',
                'admins.address',
                'admins.gender',
                'admins.status'
            )
            ->get();

        return view('kenswed.admin.staffs.manage', compact('staff'));
    }

    // Show edit form
    public function edit($id)
    {
        $staff = User::findOrFail($id);
        return view('kenswed.admin.staffs.edit', compact('staff'));
    }

    // Show staff view form 
public function show($id)
{
    // Fetch the staff details along with related information
    $staff = User::leftJoin('staffids', 'users.id', '=', 'staffids.user_id')
        ->leftJoin('admins', 'users.id', '=', 'admins.user_id') // Join with admins table
        ->select(
            'users.id',
            'users.name',
            'users.email',
            'users.role',
            'users.created_at',
            'staffids.staff_id',
            'admins.firstname',
            'admins.middlename',
            'admins.lastname',
            'admins.profile_pic',
            'admins.phone_number',
            'admins.address',
            'admins.gender',
            'admins.status'
        )
        ->where('users.id', $id)
        ->firstOrFail();

    return view('kenswed.admin.staffs.view', compact('staff'));
}

    // Update staff details
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'role' => 'required|in:1,3,4,5,7',
            'password' => 'nullable|min:8',
            'staff_id' => 'required|string|max:255|unique:staffids,staff_id,' . $id . ',user_id', // Ensure staff_id is unique but ignore the current user_id
        ]);

        // Find staff member
        $staff = User::findOrFail($id);

        // Update staff details
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->role = $request->role;

        // Update password only if provided
        if ($request->filled('password')) {
            $staff->password = Hash::make($request->password);
        }

        $staff->save();

        // Update or create staff_id in staffids table
        Staffid::updateOrCreate(
            ['user_id' => $staff->id], // Match condition
            ['staff_id' => $request->staff_id] // New or updated value
        );

        return redirect()->route('staff.manage')->with('success', 'Staff member updated successfully!');
    }

    // Delete a staff member
    public function destroy($id)
    {
        $staff = User::findOrFail($id);

        // Delete the related record in the staffids table
        Staffid::where('user_id', $staff->id)->delete();

        // Delete the user from the users table
        $staff->delete();

        return redirect()->route('staff.manage')->with('success', 'Staff member deleted successfully!');
    }
}
