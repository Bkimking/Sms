<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

        $teachers = User::where('role', 4)->get(); // Fetch only users with role 4 (teachers)
        return view('kenswed.admin.departments.add', compact('teachers'));
    }


    public function manage(Request $request)
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

        $departments = Department::all(); // Fetch all departments
        $teachers = User::where('role', 4)->get(); // Fetch only users with role 4 (teachers)
        return view('kenswed.admin.departments.manage', compact('departments', 'teachers'));
    }


    /**
     * Store a newly created department.
     */
    public function store(Request $request)
    {
        // Validate request input
        $request->validate([
            'deptname' => 'required|string|max:255',
            'deptcode' => 'required|string|max:255|unique:departments,department_code',
            'deptdescription' => 'nullable|string',
            'depthead' => 'nullable|exists:users,id',
        ]);

        try {
            // Create a new department record
            Department::create([
                'department_name' => $request->deptname,
                'department_code' => $request->deptcode,
                'department_description' => $request->deptdescription,
                'head_of_department' => $request->depthead,
            ]);

            return redirect()->route('departments.manage')->with('success', 'Department added successfully.');
        } catch (\Exception $e) {
            return redirect()->route('departments.manage')->with('error', 'Failed to add department: ' . $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(department $departments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        $teachers = User::where('role', 4)->get(); // Fetch only users with role 4 (teachers)
        return view('kenswed.admin.departments.edit', compact('department', 'teachers'));
    }

    public function update(Request $request, $id)
    {
        // Validate request input
        $request->validate([
            'deptname' => 'required|string|max:255',
            'deptcode' => "required|string|max:255|unique:departments,department_code,$id",
            'deptdescription' => 'nullable|string',
            'depthead' => 'nullable|exists:users,id', // Ensure depthead exists in users table
        ]);

        try {
            $department = Department::findOrFail($id);

            // Ensure the selected department head is a user with role 4 (teacher)
            if ($request->depthead && !User::where('id', $request->depthead)->where('role', 4)->exists()) {
                return redirect()->route('departments.manage')->with('error', 'Selected head of department is not a valid teacher.');
            }

            // Update department details
            $department->department_name = $request->deptname;
            $department->department_code = $request->deptcode;
            $department->department_description = $request->deptdescription;
            $department->head_of_department = $request->depthead;

            $department->save();

            return redirect()->route('departments.manage')->with('success', 'Department updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('departments.manage')->with('error', 'Failed to update department: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the department
        $department = Department::find($id);

        if (!$department) {
            return redirect()->route('departments.manage')->with('error', 'Department not found.');
        }

        // Loop through each course and delete its sub-courses first
        foreach ($department->courses as $course) {
            $course->subCourses()->delete(); // Delete sub-courses first
            $course->delete(); // Then delete the course
        }

        // Now delete the department
        $department->delete();

        return redirect()->route('departments.manage')->with('success', 'Department and all related courses and sub-courses deleted successfully.');
    }
}
