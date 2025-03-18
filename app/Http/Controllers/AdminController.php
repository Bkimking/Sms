<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Staffid;
use App\Models\Course;
use App\Models\Student;
use App\Models\StudentGuardian;
use App\Models\StudentCourse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Application;
use Illuminate\Support\Carbon;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kenswed/user/dashboard');
    }

    public function dashboard()
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

        return view('kenswed/admin/dashboard');
    }

    public function users()
    {
        return view('kenswed/admin/users');
    }

    public function reports()
    {
        return view('kenswed/admin/reports');
    }
    public function settings()
    {
        return view('kenswed/admin/settings');
    }
    /**
     * Show the form for creating a new admin profiles.
     */
    public function create() {}

    public function show()
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
        $admin = Auth::user()->admin; // Get the logged-in admin's profile
        return view('kenswed.admin.profiles.view', compact('admin'));
    }

    /**
     * Show the form for editing the profile.
     */
    public function edit()
    {
        $admin = Auth::user()->admin;
        return view('kenswed.admin.profiles.edit', compact('admin'));
    }

    /**
     * Update the specified admin profile.
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // Ensure the user has an admin profile
        $admin = $user->admin;
        if (!$admin) {
            $admin = new Admin([
                'user_id' => $user->id,
                'status' => 'inactive' // Default status
            ]);
            $user->admin()->save($admin);
        }

        // Validate the request
        $request->validate([
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'address' => 'nullable|string',
            'gender' => 'nullable|string|in:male,female', // Ensure gender is either 'male' or 'female'
            'profile_pic' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle profile picture upload
        if ($request->hasFile('profile_pic')) {
            if (!empty($admin->profile_pic)) {
                Storage::delete('public/' . $admin->profile_pic); // Delete old image
            }
            $profilePicPath = $request->file('profile_pic')->store('profile_pictures', 'public');
            $admin->profile_pic = $profilePicPath;
        }

        // Update admin details
        $admin->update([
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'gender' => $request->gender, // Update gender
        ]);

        return redirect()->route('admin')->with('success', 'Profile updated successfully.');
    }

    public function reset()
    {
        $admin = Auth::user()->admin;

        if ($admin) {
            // Delete profile picture if it exists
            if (!empty($admin->profile_pic)) {
                Storage::delete('public/' . $admin->profile_pic);
            }

            // Reset profile fields
            $admin->fill([
                'firstname' => null,
                'middlename' => null,
                'lastname' => null,
                'phone_number' => null,
                'address' => null,
                'profile_pic' => null,
                'gender' => null,
            ])->save();
        }

        return redirect()->route('admin.profile.edit')
            ->with('success', 'Profile reset successfully.')
            ->with('warning', 'Update your profile before going to the dashboard.');
    }

    /**
     * Remove the specified profile.
     */
    public function destroy() {}

    //student added my admin
    public function addstudent()
    {
        $admins = Admin::all();
        $courses = Course::with('subcourses')->get(); // Fetch courses with sub-courses

        return view('kenswed/admin/student/add', compact('admins', 'courses'));
    }

    //student stored my admin
    public function storestudent(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'surname' => 'string',
            'first_name' => 'string',
            'email' => 'email|unique:users,email',
            'dob' => 'date',
            'gender' => 'string',
            'tel' => ['string', 'regex:/^(?:\+254|0)[17][0-9]{8}$/'], // Kenya phone validation
            'kcpe_certificate' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
            'kcse_certificate' => 'nullable|file|mimes:jpg,png,pdf|max:2048',
            'kin_name' => 'string',
            'kin_email' => 'nullable|email',
            'kin_id' => 'nullable',
            'kin_tel' => ['nullable', 'regex:/^(?:\+254|0)[17][0-9]{8}$/'], // Kenya phone validation
            'course_id' => 'nullable|exists:courses,id', // Ensure course exists
            'subcourse_id' => 'nullable|exists:sub_courses,id', // Ensure sub-course exists (optional)
            'password' => 'string|min:8|confirmed', // Ensure password confirmation
            'agreetorules' => 'accepted',
        ]);

        // Handle file uploads
        $kcpe_certificate_path = $request->hasFile('kcpe_certificate')
            ? $request->file('kcpe_certificate')->store('certificates', 'public')
            : null;

        $kcse_certificate_path = $request->hasFile('kcse_certificate')
            ? $request->file('kcse_certificate')->store('certificates', 'public')
            : null;

        // Create User (Set role = 2 for students)
        $user = User::create([
            'name' => $validatedData['first_name'],
            'email' => $validatedData['email'],
            'role' => 2, // Student role
            'password' => Hash::make($validatedData['password']), // Hash password
        ]);

        // Create Student Profile
        $student = Student::create([
            'user_id' => $user->id, // Link student to user
            'surname' => $validatedData['surname'],
            'dob' => $validatedData['dob'],
            'gender' => $validatedData['gender'],
            'tel' => $validatedData['tel'],
            'kcpe_certificate' => $kcpe_certificate_path,
            'kcse_certificate' => $kcse_certificate_path,
        ]);

        // Create Guardian Record
        StudentGuardian::create([
            'student_id' => $student->id,
            'guardianfullname' => $validatedData['kin_name'],
            'guardianemail' => $validatedData['kin_email'],
            'guardianidnumber' => $validatedData['kin_id'],
            'guardiantel' => $validatedData['kin_tel'],
        ]);

        // Create course Record
        StudentCourse::create([
            'student_id' => $student->id,
            'course' => $validatedData['course_id'],
            'subcourse' => $validatedData['subcourse_id'],
        ]);

        return redirect()->route('student.manage')->with('success', 'Student enrolled successfully!');
    }

    public function manageStudent()
    {
        // Get all students and their details
        $students = Student::with(['user', 'guardian'])->get();

        return view('kenswed/admin/student/manage', compact('students'));
    }
    public function editStudent() {}

    // View student applications
    public function viewApplications()
    {
        $applications = Application::where('status', 'pending')->get();
        return view('kenswed.admin.student.view', compact('applications'));
    }

    // View a single student's application details
    public function viewApplicationDetails($id)
    {
        $application = Application::findOrFail($id);
        return view('kenswed.admin.student.details', compact('application'));
    }

    // Approve student application
    public function approveApplication($id)
    {
        $application = Application::findOrFail($id);
        $application->status = 'approved';
        $application->save();

        // Create a new user account for the student
        $user = User::create([
            'name' => $application->first_name,
            'email' => $application->email,
            'role' => 2, // Student role
            'password' => Hash::make('password123'), // Default password (change later)
            'email_verified_at' => Carbon::now(), // Automatically mark email as verified
        ]);

        // Register student details
        Student::create([
            'user_id' => $user->id,
            'surname' => $application->surname,
            'email' => $application->email,  // <-- Add this line to fix the error
            'dob' => $application->dob,
            'gender' => $application->gender,
            'tel' => $application->tel,
            'kcpe_certificate' => $application->kcpe_certificate,
            'kcse_certificate' => $application->kcse_certificate,
        ]);

        return redirect()->route('student.manage')->with('success', 'Student application approved successfully!');
    }

    // Reject student application
    public function rejectApplication($id)
    {
        $application = Application::findOrFail($id);
        $application->status = 'rejected';
        $application->save();

        return redirect()->route('admin.applications')->with('error', 'Student application rejected.');
    }

    public function adminEnrolledStudents()
    {
        $students = Application::where('status', 'approved')->get();
        return view('kenswed.admin.student.enrolled', compact('students'));
    }

    public function adminRejectedStudents()
    {
        $students = Application::where('status', 'rejected')->get();
        return view('kenswed.admin.student.rejected', compact('students'));
    }


    //student added my admin
    public function viewCourse()
    {
        $courses = Course::with('subcourses')->get();
        return view('kenswed/admin/course/view', compact('courses'));
    }
}
