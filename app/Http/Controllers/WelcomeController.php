<?php

namespace App\Http\Controllers;

use App\Models\welcome;
use Illuminate\Http\Request;
use App\Models\HeaderItem; // Ensure the correct model namespace is imported
use App\Models\aboutitem; // Ensure the correct model namespace is imported
use App\Models\Course;
use App\Models\SubCourse;
use App\Models\Student;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aboutItem = AboutItem::all(); // Fetch all About records

        // Fetch all courses with their images
        $courses = Course::all();

        // Fetch all subcourses with their images
        $subcourses = SubCourse::all();

        return view('welcome', compact('aboutItem', 'courses', 'subcourses'));
    }

    public function applicationform()
    {
        return view('application');
    }
    public function testapplicationform()
    {
        return view('test');
    }

    public function about()
    {
        $aboutItem = AboutItem::all(); // Fetch all About records
        return view('about', compact('aboutItem'));
    }

    public function team()
    {
        $aboutItem = AboutItem::all(); // Fetch all About records
        return view('team', compact('aboutItem'));
    }

    public function shortcourse()
    {
        $aboutItem = AboutItem::all(); // Fetch all About records
        $courses = Course::whereRaw('LOWER(category) = ?', ['short course'])->get(); // Fetch short courses
        return view('shortcourses', compact('aboutItem', 'courses'));
    }

    public function certificatecourse()
    {
        $aboutItem = AboutItem::all(); // Fetch all About records
        $courses = Course::whereRaw('LOWER(category) = ?', ['certificate'])->get();
        return view('certificatecourses', compact('aboutItem', 'courses'));
    }

    public function diplomacourse()
    {
        $aboutItem = AboutItem::all(); // Fetch all About records
        $courses = Course::whereRaw('LOWER(category) = ?', ['diploma'])->get(); // Fetch diploma courses
        return view('diplomacourses', compact('aboutItem', 'courses'));
    }

    public function showcourse($course_id)
    {
        $aboutItem = AboutItem::all();

        // Fetch course with its sub-courses
        $course = Course::with('subCourses')->find($course_id);

        if (!$course) {
            return redirect()->route('courses.index')->with('error', 'Course not found');
        }

        // Fetch other courses within the same category (excluding the current course)
        $otherCourses = Course::where('category', $course->category)
            ->where('id', '!=', $course->id)
            ->get();

        // Fetch sub-courses explicitly
        $subCourses = $course->subCourses; // Make sure this relationship is set

        return view('showcourse', compact('aboutItem', 'course', 'otherCourses', 'subCourses'));
    }

    public function showsubcourse($subcourse_id)
    {
        // Fetch the sub-course along with its related course
        $subCourse = SubCourse::with('course')->find($subcourse_id);

        if (!$subCourse) {
            return redirect()->route('courses.index')->with('error', 'Sub-course not found');
        }

        // Fetch the main course of this sub-course
        $course = $subCourse->course;

        // Fetch other sub-courses within the same main course (excluding the current sub-course)
        $otherSubCourses = SubCourse::where('course_id', $course->id)
            ->where('id', '!=', $subCourse->id)
            ->get();

        return view('showsubcourse', compact('subCourse', 'course', 'otherSubCourses'));
    }

    public function library()
    {
        $aboutItem = AboutItem::all(); // Fetch all About records
        return view('library', compact('aboutItem'));
    }

    public function addr()
    {
        $aboutItem = AboutItem::all(); // Fetch all About records
        return view('addr', compact('aboutItem'));
    }

    public function mission()
    {
        $aboutItem = AboutItem::all(); // Fetch all About records
        return view('mission', compact('aboutItem'));
    }

    public function contact()
    {
        $aboutItem = AboutItem::all(); // Fetch all About records
        return view('contact', compact('aboutItem'));
    }
    
    public function news()
    {
        $aboutItem = AboutItem::all(); // Fetch all About records
        return view('news', compact('aboutItem'));
    }

    public function gallery()
    {
        $aboutItem = AboutItem::all(); // Fetch all About records
        return view('gallery', compact('aboutItem'));
    }

    public function history()
    {
        $aboutItem = AboutItem::all(); // Fetch all About records
        return view('history', compact('aboutItem'));
    }
    public function studentportal()
    {
        $aboutItem = AboutItem::all(); // Fetch all About records
        return view('auth.studentlogin', compact('aboutItem'));
    }
    public function studentlogin() {}
    public function adminportal()
    {
        $aboutItem = AboutItem::all(); // Fetch all About records
        return view('adminlogin', compact('aboutItem'));
    }

    public function showApplyPage($type, $id)
    {
        if ($type === 'course') {
            $selected = Course::findOrFail($id);
        } elseif ($type === 'subcourse') {
            $selected = Subcourse::findOrFail($id);
        } else {
            abort(404);
        }

        return view('apply', compact('selected', 'type'));
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


        return redirect('')->with('success', 'Student added successfully!');
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
    public function show(welcome $welcome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(welcome $welcome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, welcome $welcome)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(welcome $welcome)
    {
        //
    }
}
