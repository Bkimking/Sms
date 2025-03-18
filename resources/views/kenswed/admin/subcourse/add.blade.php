<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard - Add Sub Course</title>

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

            <!-- Sub Course Content -->
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

                <h1 class="mt-4">Add Sub Course</h1>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('courses.manage') }}">Manage Courses</a></li>
                    <li class="breadcrumb-item active">Add Sub Course</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-body">
                        This is the Add Sub Course page. If you encounter any issues, please contact the developers.
                        <a href="#mailto:developers@example.com">Contact Developers</a>.
                    </div>
                </div>

                <!-- Form for Adding Sub Course -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-plus-circle"></i> Add Sub Course
                    </div>
                    <div class="card-body">
                        <form action="{{ route('subcourses.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Select Parent Course -->
                            <div class="mb-3">
                                <label for="course_id" class="form-label">Parent Course</label>
                                <select name="course_id" id="course_id" class="form-control" required>
                                    <option value="">Select Course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="subcourse_name" class="form-label">Sub Course Name</label>
                                <input type="text" name="sub_course_name" id="sub_course_name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="subcourse_code" class="form-label">Sub Course Code</label>
                                <input type="text" name="sub_course_code" id="sub_course_code" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="subcourse_description" class="form-label">Sub Course Description</label>
                                <textarea name="sub_course_description" id="sub_course_description" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="subcourse_img" class="form-label">Sub Course Image</label>
                                <input type="file" name="sub_course_img" id="sub_course_img" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">Add Sub Course</button>

                            <!-- Back & Manage Buttons -->
                            <a href="{{ route('admin') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                            <a href="{{ route('subcourses.manage') }}" class="btn btn-warning">Manage Sub Courses</a>
                        </form>
                    </div>
                </div>
            </main>
            <!-- End Sub Course Content -->

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
