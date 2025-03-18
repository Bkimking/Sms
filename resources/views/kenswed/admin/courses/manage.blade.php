<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard - Manage Courses</title>

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

            <!-- Course Management Content -->
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

                <h1 class="mt-4">Manage Courses</h1>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('departments.manage') }}">Manage Departments</a></li>
                    <li class="breadcrumb-item active">Manage Courses</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-body">
                        This is the Manage Courses page. If you encounter any issues, please contact the developers.
                        <a href="mailto:developers@example.com">Contact Developers</a>.
                    </div>
                </div>

                <!-- Table to Display Courses -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Course List
                        <a href="{{ route('courses.create') }}" class="btn btn-primary btn-sm float-end">+ Add course</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Course Name</th>
                                    <th>Course Code</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Department</th>
                                    <th>Teacher</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course)
                                    <tr>
                                        <td>{{ $course->id }}</td>
                                        <td>{{ $course->course_name }}</td>
                                        <td>{{ $course->course_code }}</td>
                                        <td>{{ $course->course_description }}</td>
                                        <td>{{ $course->category }}</td>
                                        <td>{{ $course->department->department_name ?? 'Not Assigned' }}</td>
                                        <td>{{ $course->teacher->name ?? 'Not Assigned' }}</td>

                                        <td>
                                            <a href="{{ route('courses.edit', $course->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <!-- Delete button -->
                                            <form action="{{ route('courses.destroy', $course->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this course?')">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="{{ route('courses.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> Add New Course
                </a>
            </main>
            <!-- End Course Management Content -->

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
