<?php

//commented verification of email

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('Kenswed');

Route::get('/application-form', [App\Http\Controllers\WelcomeController::class, 'applicationform'])->name('applicationform');
Route::post('/student/create', [App\Http\Controllers\StudentController::class, 'store'])->name('student.create');

Route::get('/test-application-form', [App\Http\Controllers\WelcomeController::class, 'testapplicationform'])->name('testapplicationform');
Route::post('/student/insert', [App\Http\Controllers\StudentController::class, 'insert'])->name('student.insert');

Route::get('/about', [App\Http\Controllers\WelcomeController::class, 'about'])->name('about');

Route::get('/team', [App\Http\Controllers\WelcomeController::class, 'team'])->name('team');

Route::get('/mission', [App\Http\Controllers\WelcomeController::class, 'mission'])->name('mission');

Route::get('/contact', [App\Http\Controllers\WelcomeController::class, 'contact'])->name('contact');

Route::get('/library', [App\Http\Controllers\WelcomeController::class, 'library'])->name('library');

Route::get('/faq', [App\Http\Controllers\WelcomeController::class, 'faq'])->name('faq');

Route::get('/news', [App\Http\Controllers\WelcomeController::class, 'news'])->name('news');

Route::get('/vedios', [App\Http\Controllers\WelcomeController::class, 'vedios'])->name('vedios');

Route::get('/blog', [App\Http\Controllers\WelcomeController::class, 'blog'])->name('blog');

Route::get('/gallery', [App\Http\Controllers\WelcomeController::class, 'gallery'])->name('gallery');

Route::get('/history', [App\Http\Controllers\WelcomeController::class, 'history'])->name('history');

Route::get('/resources', [App\Http\Controllers\WelcomeController::class, 'resources'])->name('resources');

Route::get('/addr', [App\Http\Controllers\WelcomeController::class, 'addr'])->name('addr');

Route::get('/shortcourses', [App\Http\Controllers\WelcomeController::class, 'shortcourse'])->name('shortcourses');

Route::get('/certificatecourses', [App\Http\Controllers\WelcomeController::class, 'certificatecourse'])->name('certificatecourses');

Route::get('/diplomacourses', [App\Http\Controllers\WelcomeController::class, 'diplomacourse'])->name('diplomacourses');

//show specific course per course id 
Route::get('/courses/show/{course_id}', [App\Http\Controllers\WelcomeController::class, 'showcourse'])->name('course.show');

Route::get('/apply', [App\Http\Controllers\WelcomeController::class, 'apply'])->name('apply');


//show specific subcourse per course
Route::get('/subcourses/show/{subcourse_id}', [App\Http\Controllers\WelcomeController::class, 'showsubcourse'])->name('subcourses.show');


//Routes for the application
Route::get('/application', [App\Http\Controllers\WelcomeController::class, 'application'])->name('application');
Route::post('/apply/submit', [App\Http\Controllers\ApplicationController::class, 'submitApplication'])->name('apply.submit');
Route::get('/apply/{type}/{id}', [App\Http\Controllers\WelcomeController::class, 'showApplyPage'])->name('apply.page');


//

//students portal routes
Route::get('/student/portal', [App\Http\Controllers\WelcomeController::class, 'studentportal'])->name('student.portal');
Route::post('/student/login', [App\Http\Controllers\WelcomeController::class, 'studentlogin'])->name('student.login');


Auth::routes(['verify' => true]);
Auth::routes();

Route::get('/home', function () {
    if (Auth::check()) {
        $user = Auth::user();
        switch ($user->role) {
            case 1:
                return redirect()->route('admin');
                break;
            case 2:
                return redirect()->route('student');
                break;
            case 3:
                return redirect()->route('superadmin');
                break;
            case 4:
                return redirect()->route('teacher');
                break;
            case 5:
                return redirect()->route('cafeteria');
                break;
            case 6:
                return redirect()->route('alumni');
                break;
            case 7:
                return redirect()->route('media');
                break;
            case 8:
                return redirect()->route('sponsored');
                break;
            case 9:
                return redirect()->route('user');
                break;
            default:
                return redirect()->route('home');
        }
    } else {
        return redirect()->route('login');
    }
})->name('home');

// Admin routes
Route::middleware(['admin' /*, 'verified',*/])->group(function () {

    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin');
    Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/reports', [App\Http\Controllers\AdminController::class, 'reports'])->name('admin.reports');
    Route::get('/admin/settings', [App\Http\Controllers\AdminController::class, 'settings'])->name('admin.settings');

    // Profile routes
    Route::get('/admin/profile', [App\Http\Controllers\AdminController::class, 'show'])->name('admin.profile.view');
    Route::get('/admin/profile/edit', [App\Http\Controllers\AdminController::class, 'edit'])->name('admin.profile.edit');
    Route::put('/admin/profile/update', [App\Http\Controllers\AdminController::class, 'update'])->name('admin.profile.update');
    Route::post('/admin/profile/reset', [App\Http\Controllers\AdminController::class, 'reset'])->name('admin.profile.reset');

    // Header routes
    Route::get('/admin/headeritem/create', [App\Http\Controllers\HeaderitemController::class, 'create'])->name('header.create');
    Route::post('/admin/headeritem/store', [App\Http\Controllers\HeaderitemController::class, 'store'])->name('header.store');
    Route::get('/admin/headeritem/manage', [App\Http\Controllers\HeaderitemController::class, 'manage'])->name('header.manage');
    Route::get('/admin/headeritems/edit/{id}', [App\Http\Controllers\HeaderitemController::class, 'edit'])->name('header.edit');
    Route::put('/admin/headeritems/update/{id}', [App\Http\Controllers\HeaderitemController::class, 'update'])->name('header.update');
    Route::delete('/admin/headeritems/{id}', [App\Http\Controllers\HeaderitemController::class, 'destroy'])->name('header.destroy');

    // About routes
    Route::get('/admin/aboutitem', [App\Http\Controllers\AboutitemController::class, 'create'])->name('about.create');
    Route::get('/admin/aboutitem/show', [App\Http\Controllers\AboutitemController::class, 'show'])->name('about.show');
    Route::get('/admin/aboutitem/edit/{id}', [App\Http\Controllers\AboutitemController::class, 'edit'])->name('about.edit');
    Route::post('/admin/aboutitem/store', [App\Http\Controllers\AboutitemController::class, 'store'])->name('about.store');
    Route::put('/admin/aboutitem/update/{id}', [App\Http\Controllers\AboutitemController::class, 'update'])->name('about.update');
    Route::delete('/admin/aboutitem/delete/{id}', [App\Http\Controllers\AboutitemController::class, 'destroy'])->name('about.destroy');

    // mission routes update soon
    Route::get('/admin/aboutitem', [App\Http\Controllers\AboutitemController::class, 'create'])->name('about.create');
    Route::get('/admin/aboutitem/show', [App\Http\Controllers\AboutitemController::class, 'show'])->name('about.show');
    Route::get('/admin/aboutitem/edit/{id}', [App\Http\Controllers\AboutitemController::class, 'edit'])->name('about.edit');
    Route::post('/admin/aboutitem/store', [App\Http\Controllers\AboutitemController::class, 'store'])->name('about.store');
    Route::put('/admin/aboutitem/update/{id}', [App\Http\Controllers\AboutitemController::class, 'update'])->name('about.update');
    Route::delete('/admin/aboutitem/delete/{id}', [App\Http\Controllers\AboutitemController::class, 'destroy'])->name('about.destroy');

    // departments routes
    Route::get('/admin/departments', [App\Http\Controllers\DepartmentsController::class, 'create'])->name('departments.create');
    Route::get('/admin/departments/manage', [App\Http\Controllers\DepartmentsController::class, 'manage'])->name('departments.manage');
    Route::get('/admin/departments/edit/{id}', [App\Http\Controllers\DepartmentsController::class, 'edit'])->name('departments.edit');
    Route::post('/admin/departments/store', [App\Http\Controllers\DepartmentsController::class, 'store'])->name('departments.store');
    Route::put('/admin/departments/update/{id}', [App\Http\Controllers\DepartmentsController::class, 'update'])->name('departments.update');
    Route::delete('/admin/departments/delete/{id}', [App\Http\Controllers\DepartmentsController::class, 'destroy'])->name('departments.destroy');

    // courses routes
    Route::get('/admin/courses', [App\Http\Controllers\CourseController::class, 'create'])->name('courses.create');
    Route::get('/admin/courses/manage', [App\Http\Controllers\CourseController::class, 'manage'])->name('courses.manage');
    Route::get('/admin/courses/edit/{id}', [App\Http\Controllers\CourseController::class, 'edit'])->name('courses.edit');
    Route::post('/admin/courses/store', [App\Http\Controllers\CourseController::class, 'store'])->name('courses.store');
    Route::put('/admin/courses/update/{id}', [App\Http\Controllers\CourseController::class, 'update'])->name('courses.update');
    Route::delete('/admin/courses/delete/{id}', [App\Http\Controllers\CourseController::class, 'destroy'])->name('courses.destroy');

    // subcourses routes
    Route::get('/admin/subcourses', [App\Http\Controllers\SubCoursesController::class, 'create'])->name('subcourses.create');
    Route::post('/admin/subcourses/store', [App\Http\Controllers\SubCoursesController::class, 'store'])->name('subcourses.store');
    Route::get('/admin/subcourses/manage', [App\Http\Controllers\SubCoursesController::class, 'manage'])->name('subcourses.manage');
    Route::get('/admin/subcourses/edit/{id}', [App\Http\Controllers\SubCoursesController::class, 'edit'])->name('subcourses.edit');
    Route::put('/admin/subcourses/update/{id}', [App\Http\Controllers\SubCoursesController::class, 'update'])->name('subcourses.update');
    Route::delete('/admin/subcourses/delete/{id}', [App\Http\Controllers\SubCoursesController::class, 'destroy'])->name('subcourses.destroy');

    // Staff routes in admin
    Route::get('/admin/staff', [App\Http\Controllers\StaffController::class, 'create'])->name('staff.create');
    Route::get('/admin/staff/manage', [App\Http\Controllers\StaffController::class, 'manage'])->name('staff.manage');
    Route::get('/admin/staff/edit/{id}', [App\Http\Controllers\StaffController::class, 'edit'])->name('staff.edit');
    Route::get('/admin/staff/view/{id}', [App\Http\Controllers\StaffController::class, 'show'])->name('staff.view');
    Route::post('/admin/staff/store', [App\Http\Controllers\StaffController::class, 'store'])->name('staff.store');
    Route::put('/admin/staff/update/{id}', [App\Http\Controllers\StaffController::class, 'update'])->name('staff.update');
    Route::delete('/admin/staff/delete/{id}', [App\Http\Controllers\StaffController::class, 'destroy'])->name('staff.destroy');

    // student routes from the admin routes
    Route::get('/admin/add/student', [App\Http\Controllers\AdminController::class, 'addstudent'])->name('add.student');
    Route::post('/admin/student/store', [App\Http\Controllers\AdminController::class, 'storestudent'])->name('student.store');
    Route::get('/admin/student/manage', [App\Http\Controllers\AdminController::class, 'managestudent'])->name('student.manage');
    Route::get('/admin/student/edit/{id}', [App\Http\Controllers\AdminController::class, 'editstudent'])->name('student.edit');
    Route::get('/admin/student/view/{id}', [App\Http\Controllers\AdminController::class, 'showstudent'])->name('student.view');
    Route::put('/admin/student/update/{id}', [App\Http\Controllers\AdminController::class, 'updatestudent'])->name('student.update');
    Route::delete('/admin/student/destroy/{id}', [App\Http\Controllers\AdminController::class, 'destroystudent'])->name('student.destroy');

    //student application approval routes
    Route::get('/admin/applications', [App\Http\Controllers\AdminController::class, 'viewApplications'])->name('admin.applications');
    Route::get('/admin/applications/view/{id}', [App\Http\Controllers\AdminController::class, 'viewApplicationDetails'])->name('admin.application.view');
    Route::post('/admin/applications/approve/{id}', [App\Http\Controllers\AdminController::class, 'approveApplication'])->name('admin.application.approve');
    Route::post('/admin/applications/reject/{id}', [App\Http\Controllers\AdminController::class, 'rejectApplication'])->name('admin.application.reject');
    Route::get('/admin/student/manage', [App\Http\Controllers\AdminController::class, 'adminmanagestudent'])->name('admin.student.manage');

    Route::get('/admin/student/enrolled', [App\Http\Controllers\AdminController::class, 'adminEnrolledStudents'])->name('admin.student.enrolled'); // Enrolled Students Route
    Route::get('/admin/student/rejected', [App\Http\Controllers\AdminController::class, 'adminRejectedStudents'])->name('admin.student.rejected'); // Rejected Students Route
});

// Student routes
Route::middleware(['student'/*, 'verified'*/])->group(function () {
    // Dashboard
    Route::get('/student', [App\Http\Controllers\StudentController::class, 'dashboard'])->name('student.dashboard');

    // Profile routes
    Route::get('/student/profile', [App\Http\Controllers\StudentController::class, 'profile'])->name('student.profile');
    Route::get('/student/profile/edit', [App\Http\Controllers\StudentController::class, 'editProfile'])->name('student.profile.edit');
    Route::put('/student/profile/update', [App\Http\Controllers\StudentController::class, 'updateProfile'])->name('student.profile.update');

    // Course routes
    Route::get('/student/courses', [App\Http\Controllers\StudentController::class, 'myCourses'])->name('student.courses');
    Route::get('/student/course/{id}', [App\Http\Controllers\StudentController::class, 'viewCourse'])->name('student.course.view');

    // Assignments
    Route::get('/student/assignments', [App\Http\Controllers\StudentController::class, 'assignments'])->name('student.assignments');
    Route::get('/student/assignment/{id}', [App\Http\Controllers\StudentController::class, 'viewAssignment'])->name('student.assignment.view');

    // Exams
    Route::get('/student/exams', [App\Http\Controllers\StudentController::class, 'exams'])->name('student.exams');
    Route::get('/student/exam/{id}', [App\Http\Controllers\StudentController::class, 'viewExam'])->name('student.exam.view');

    // Results
    Route::get('/student/results', [App\Http\Controllers\StudentController::class, 'results'])->name('student.results');
    Route::get('/student/report/{id}', [App\Http\Controllers\StudentController::class, 'viewReport'])->name('student.report.view');

    // Logout
    Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});

// Superadmin routes
Route::middleware(['superadmin'/*, 'verified',*/])->group(function () {
    Route::get('/superadmin', [App\Http\Controllers\SuperadminController::class, 'dashboard'])->name('superadmin');
});

// Teacher routes
Route::middleware(['teacher'/*, 'verified',*/])->group(function () {
    Route::get('/teacher', [App\Http\Controllers\TeacherController::class, 'dashboard'])->name('teacher');
});

// Cafeteria routes
Route::middleware(['cafeteria'/*, 'verified',*/])->group(function () {
    Route::get('/cafeteria', [App\Http\Controllers\CafeteriaController::class, 'dashboard'])->name('cafeteria');
});

// Alumni routes
Route::middleware(['alumni'/*, 'verified',*/])->group(function () {
    Route::get('/alumni', [App\Http\Controllers\AlumniController::class, 'dashboard'])->name('alumni');
});

// Media routes
Route::middleware(['media'/*, 'verified',*/])->group(function () {
    Route::get('/media', [App\Http\Controllers\MediaController::class, 'dashboard'])->name('media');
});

// Sponsored routes
Route::middleware(['Sponsored'/*, 'verified',*/])->group(function () {
    Route::get('/Sponsored', [App\Http\Controllers\SponsoredController::class, 'index'])->name('Sponsored');
});

// User routes
Route::middleware(['user'/*, 'verified',*/])->group(function () {
    Route::get('/user', [App\Http\Controllers\AdminController::class, 'index'])->name('user');
});
