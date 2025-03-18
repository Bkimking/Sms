<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard - Edit Sub Course</title>

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

                <h1 class="mt-4">Edit Sub Course</h1>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Sub Course</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-body">
                        This is the Edit Sub Course page. If you encounter any issues, please contact the developers.
                        <a href="#mailto:developers@example.com">Contact Developers</a>.
                    </div>
                </div>

                <!-- Form for Editing Sub Course -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-edit"></i> Edit Sub Course
                    </div>
                    <div class="card-body">
                        <form action="{{ route('subcourses.update', $subcourse->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Select Parent Course -->
                            <div class="mb-3">
                                <label for="course_id" class="form-label">Parent Course</label>
                                <select name="course_id" id="course_id" class="form-control" required>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}"
                                            {{ $subcourse->course_id == $course->id ? 'selected' : '' }}>
                                            {{ $course->course_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="subcourse_name" class="form-label">Sub Course Name</label>
                                <input type="text" name="subcourse_name" id="subcourse_name" class="form-control"
                                    value="{{ old('subcourse_name', $subcourse->sub_course_name) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="subcourse_code" class="form-label">Sub Course Code</label>
                                <input type="text" name="subcourse_code" id="subcourse_code" class="form-control"
                                    value="{{ old('subcourse_code', $subcourse->sub_course_code) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="subcourse_description" class="form-label">Sub Course Description</label>
                                <textarea name="subcourse_description" id="subcourse_description" class="form-control" rows="3">{{ old('subcourse_description', $subcourse->sub_course_description) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="subcourse_img" class="form-label">Sub Course Image</label>
                                <input type="file" name="subcourse_img" id="subcourse_img" class="form-control">
                            
                                @if (!empty($subcourse->sub_course_img) && Storage::disk('public')->exists('subcourses/' . $subcourse->sub_course_img))
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/subcourses/' . $subcourse->sub_course_img) }}" width="100">
                                    </div>
                                @else
                                    <span class="text-muted">No Image Available</span>
                                @endif
                            </div>                            

                            <button type="submit" class="btn btn-primary">Update Sub Course</button>

                            <a href="{{ route('subcourses.manage') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
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
