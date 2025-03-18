<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentCourse;
use App\Models\StudentGuardian;
use App\Models\StudentAcademicHistory;
use App\Models\StudentMedicalHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class StudentController extends Controller
{
    /**
     * Student Dashboard
     */
    public function dashboard()
    {
        return view('kenswed.student.dashboard');
    }

    /**
     * Show student profile
     */
    public function profile()
    {
        $student = auth()->user();
        return view('kenswed.student.profile.view', compact('student'));
    }

    /**
     * Edit student profile
     */
    public function editProfile()
    {
        $student = auth()->user();
        return view('kenswed.student.profile.edit', compact('student'));
    }

    /**
     * Update student profile
     */
    public function updateProfile(Request $request)
    {
        $student = auth()->user();
        
        $request->validate([
            'surname' => 'required|string',
            'firstname' => 'required|string',
            'middlename' => 'nullable|string',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'dob' => 'required|date',
            'idnumber' => 'required|numeric|unique:students,idnumber,' . $student->id,
            'gender' => 'required|string',
            'marital_status' => 'required|string',
            'tshirtsize' => 'required|string',
            'homeaddress' => 'required|string',
            'county' => 'required|string',
            'subcounty' => 'required|string',
            'tel' => 'required|string',
        ]);

        $student->update($request->all());

        return redirect()->route('student.profile')->with('success', 'Profile updated successfully.');
    }

    /**
     * Show student's enrolled courses
     */
    public function myCourses()
    {
        $student = auth()->user();
        $courses = StudentCourse::where('student_id', $student->id)->get();

        return view('kenswed.student.course.view', compact('courses'));
    }

    /**
     * View course details
     */
    public function viewCourse($id)
    {
        $course = StudentCourse::findOrFail($id);
        return view('kenswed.student.course.detail', compact('course'));
    }

    /**
     * Show application status
     */
    public function applicationStatus()
    {
        $student = auth()->user();
        return view('kenswed.student.course.status', compact('student'));
    }

    /**
     * Show application form
     */
    public function applicationForm()
    {
        return view('kenswed.student.application-form');
    }

    /**
     * Submit student application
     */
    public function submitApplication(Request $request)
    {
        $request->validate([
            'surname' => 'required|string',
            'firstname' => 'required|string',
            'email' => 'required|email|unique:students',
            'dob' => 'required|date',
            'idnumber' => 'required|numeric|unique:students',
            'gender' => 'required|string',
            'homeaddress' => 'required|string',
            'tel' => 'required|string',
        ]);

        Student::create($request->all());

        return redirect()->route('student.application.status')->with('success', 'Application submitted successfully.');
    }

    /**
     * Show academic history
     */
    public function academicHistory()
    {
        $student = auth()->user();
        $academicHistory = StudentAcademicHistory::where('student_id', $student->id)->get();

        return view('kenswed.student.academic-history', compact('academicHistory'));
    }

    /**
     * Show medical history
     */
    public function medicalHistory()
    {
        $student = auth()->user();
        $medicalHistory = StudentMedicalHistory::where('student_id', $student->id)->get();

        return view('kenswed.student.medical-history', compact('medicalHistory'));
    }
}
