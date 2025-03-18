<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\SubCourse;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CourseController extends Controller
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
        $departments = Department::all(); // Fetch all departments
        return view('kenswed.admin.courses.add', compact('teachers', 'departments'));
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
        
        // Fetch courses from the database
        $courses = Course::all(); // Adjust as needed (e.g., where clauses)

        // Pass the courses to the view
        return view('kenswed.admin.courses.manage', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_name' => 'required|string|max:255',
            'course_code' => 'required|string|max:100',
            'depart_id' => 'required|exists:departments,id',
            'teacher_id' => 'nullable|exists:users,id',
            'category' => 'required|in:Diploma,Certificate,Short Course',
            'course_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10485760', // Course image validation (10MB max)
        ]);

        // Store Course
        $course = Course::create($request->only([
            'course_name',
            'course_code',
            'course_description',
            'depart_id',
            'teacher_id',
            'category'
        ]));

        // Store Course Image
        if ($request->hasFile('course_img')) {
            $courseImagePath = $request->file('course_img')->store('course_images', 'public');
            $course->update(['course_img' => $courseImagePath]);
        }

        return redirect()->route('courses.manage')->with('success', 'Course Added Successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Fetch the course using ID
        $course = Course::findOrFail($id);

        // Fetch only users with role 4 (teachers)
        $teachers = User::where('role', 4)->get();

        // Fetch all departments to allow updating the course's department
        $departments = Department::all();

        // Return the edit view with course details
        return view('kenswed.admin.courses.edit', compact('course', 'teachers', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Retrieve the course by ID or fail if not found
        $course = Course::findOrFail($id);

        // Validate input fields
        $request->validate([
            'course_name' => 'required|string|max:255',
            'course_code' => 'required|string|max:100',
            'course_description' => 'nullable|string',
            'depart_id' => 'required|exists:departments,id',
            'teacher_id' => 'nullable|exists:users,id',
            'category' => 'required|in:Diploma,Certificate,Short Course',
            'course_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10485760', // Max 10MB
        ]);

        // Update course details
        $course->update([
            'course_name' => $request->course_name,
            'course_code' => $request->course_code,
            'course_description' => $request->course_description,
            'depart_id' => $request->depart_id,
            'teacher_id' => $request->teacher_id,
            'category' => $request->category,
        ]);

        // Update course image if provided
        if ($request->hasFile('course_img')) {
            $course->update([
                'course_img' => $request->file('course_img')->store('course_images', 'public')
            ]);
        }

        return redirect()->route('courses.manage')->with('success', 'Course Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the course by ID
        $course = Course::find($id);

        if (!$course) {
            return redirect()->route('courses.manage')->with('error', 'Course not found.');
        }

        // Delete any sub-courses related to this course
        $course->subCourses()->delete();

        // Delete the course
        $course->delete();

        return redirect()->route('courses.manage')->with('success', 'Course and related sub-courses deleted successfully.');
    }
}
