<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard - Add Course</title>

    <!-- Include Head -->
    @include('kenswed.admin.includes.head')
    <!-- End Head -->
</head>

<body class="sb-nav-fixed">

    <!-- Navbar -->
    @include('kenswed.admin.includes.navbar')
    <!-- End Navbar -->

    <div id="layoutSidenav">

        <!-- Sidebar -->
        @include('kenswed.admin.includes.sidebar')
        <!-- End Sidebar -->

        <div id="layoutSidenav_content">

            <!-- Course Content -->
            <main class="container-fluid px-4">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <h1 class="mt-4">Add Course</h1>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Add Course</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-body">
                        This is the Add Course page. If you encounter any issues, please contact the developers.
                        <a href="mailto:developers@example.com">Contact Developers</a>.
                    </div>
                </div>

                <!-- Form for Adding Course -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-plus-circle"></i> Add Course
                    </div>
                    <div class="card-body">
                        <form action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="course_name" class="form-label">Course Name</label>
                                <input type="text" name="course_name" id="course_name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="course_code" class="form-label">Course Code</label>
                                <input type="text" name="course_code" id="course_code" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="course_description" class="form-label">Course Description</label>
                                <textarea name="course_description" id="course_description" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="course_img" class="form-label">Course Image</label>
                                <input type="file" name="course_img" id="course_img" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="depart_id" class="form-label">Department</label>
                                <select name="depart_id" id="depart_id" class="form-control" required>
                                    <option value="">Select Department</option>
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->department_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="teacher_id" class="form-label">Teacher</label>
                                <select name="teacher_id" id="teacher_id" class="form-control">
                                    <option value="">Select Teacher</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="category" class="form-label">Course Category</label>
                                <select name="category" id="category" class="form-control" required>
                                    <option value="Certificate">Certificate</option>
                                    <option value="Diploma">Diploma</option>
                                    <option value="Short Course">Short Course</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Add Course</button>

                            <!-- Back & Manage Buttons -->
                            <a href="{{ route('admin') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                            <a href="{{ route('courses.manage') }}" class="btn btn-warning">Manage Courses</a>
                        </form>
                    </div>
                </div>
            </main>
            <!-- End Course Content -->

            <!-- Footer -->
            @include('kenswed.admin.includes.footer')
            <!-- End Footer -->

        </div>

    </div>

    <!-- Scripts -->
    @include('kenswed.admin.includes.scripts')

    <!-- End Scripts -->
</body>

</html>
