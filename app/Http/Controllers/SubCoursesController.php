<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\SubCourse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SubCoursesController extends Controller
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

        $courses = course::all();
        return view('kenswed.admin.subcourse.add', compact('courses'));
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

        $subcourses = SubCourse::with('course')->get();
        $courses = course::all();
        return view('kenswed.admin.subcourse.manage', compact('subcourses', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sub_course_name' => 'nullable|string|max:255',
            'sub_course_code' => 'nullable|string|max:50',
            'sub_course_description' => 'nullable|string',
            'sub_course_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'course_id' => 'nullable|exists:courses,id',
        ]);

        // Create a new SubCourse instance
        $subcourse = new SubCourse(); // Updated Model Name
        $subcourse->sub_course_name = $request->sub_course_name; // Fixed column name
        $subcourse->sub_course_code = $request->sub_course_code;
        $subcourse->sub_course_description = $request->sub_course_description;
        $subcourse->course_id = $request->course_id;

        // Handle image upload if provided
        if ($request->hasFile('sub_course_img')) {
            $file = $request->file('sub_course_img');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            // Debug: Check if the file exists before moving
            if (!$file->isValid()) {
                dd("File upload failed!");
            }

            $file->move(public_path('subcourses'), $filename);
            $subcourse->sub_course_img = $filename;
        }


        // Save the subcourse
        $subcourse->save();

        // Redirect with success message
        return redirect()->route('subcourses.manage')->with('success', 'Sub Course Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCourse $sub_courses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $subcourse = SubCourse::findOrFail($id);
        $courses = Course::all();
        return view('kenswed.admin.subcourse.edit', compact('subcourse', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, $id)
     {
         // Validate the form fields
         $request->validate([
             'course_id' => 'required|exists:courses,id',
             'subcourse_name' => 'required|string|max:255',
             'subcourse_code' => 'required|string|max:50',
             'subcourse_description' => 'nullable|string',
             'subcourse_img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image validation
         ]);
     
         // Find the sub-course
         $subcourse = SubCourse::findOrFail($id);
     
         // Update sub-course details
         $subcourse->course_id = $request->course_id;
         $subcourse->sub_course_name = $request->subcourse_name;
         $subcourse->sub_course_code = $request->subcourse_code;
         $subcourse->sub_course_description = $request->subcourse_description;
     
         // Handle Image Upload
         if ($request->hasFile('subcourse_img')) {
             // Delete old image if it exists
             if ($subcourse->sub_course_img && Storage::disk('public')->exists('subcourses/' . $subcourse->sub_course_img)) {
                 Storage::disk('public')->delete('subcourses/' . $subcourse->sub_course_img);
             }
     
             // Store new image
             $imagePath = $request->file('subcourse_img')->store('subcourses', 'public');
             $subcourse->sub_course_img = basename($imagePath);
         }
     
         // Save the updated sub-course
         $subcourse->save();
     
         return redirect()->route('subcourses.manage')->with('success', 'Sub-Course Updated Successfully!');
     }
     
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the sub-course by ID
        $subCourse = SubCourse::find($id);

        if (!$subCourse) {
            return redirect()->route('subcourses.manage')->with('error', 'Sub-course not found.');
        }

        // Delete the sub-course
        $subCourse->delete();

        return redirect()->route('subcourses.manage')->with('success', 'Sub-course deleted successfully.');
    }
}
