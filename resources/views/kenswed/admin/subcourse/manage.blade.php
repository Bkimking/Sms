<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard - Manage Sub Courses</title>

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

                <h1 class="mt-4">Manage Sub Courses</h1>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('courses.manage') }}">Manage Courses</a></li>
                    <li class="breadcrumb-item active">Manage Sub Courses</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-body">
                        This is the Manage Sub Course page. If you encounter any issues, please contact the developers.
                        <a href="#mailto:developers@example.com">Contact Developers</a>.
                    </div>
                </div>

                <!-- Sub Course Table -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table"></i> Sub Courses List
                        <a href="{{ route('subcourses.create') }}" class="btn btn-primary btn-sm float-end">+ Add Sub
                            Courses</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Sub Course Name</th>
                                    <th>Sub Course Code</th>
                                    <th>Image</th>
                                    <th>Parent Course</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($subcourses as $subcourse)
                                    <tr>
                                        <td>{{ $subcourse->id }}</td>
                                        <td>{{ $subcourse->sub_course_name ?? 'N/A' }}</td>
                                        <td>{{ $subcourse->sub_course_code ?? 'N/A' }}</td>
                                        <td>
                                            @if (!empty($subcourse->sub_course_img) && Storage::disk('public')->exists('subcourses/' . $subcourse->sub_course_img))
                                                <img src="{{ asset('storage/subcourses/' . $subcourse->sub_course_img) }}"
                                                    width="50" height="50" class="rounded">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($subcourse->course)
                                                {{ $subcourse->course->course_name }}
                                            @else
                                                <span class="text-danger">No Course Assigned</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('subcourses.edit', $subcourse->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('subcourses.destroy', $subcourse->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"
                                                    onclick="return confirm('Are you sure you want to delete this subcourse?');">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">No Sub Courses Available</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="{{ route('subcourses.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> Add New Sub Course
                </a>
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
