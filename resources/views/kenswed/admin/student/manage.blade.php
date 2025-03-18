<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard - Manage Students</title>

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

            <!-- Manage Students Content -->
            <main class="container-fluid px-4">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <h1 class="mt-4">Manage Students</h1>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Manage Students</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        This is the Manage Students page. If you encounter any problems, please contact the developers.
                        <a href="mailto:developers@example.com">Contact Developers</a>.
                    </div>
                </div>

                <!-- Table to Display Students -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Students
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Surname</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Date of Birth</th>
                                    <th>Gender</th>
                                    <th>Course</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->surname }}</td>
                                    <td>{{ $student->firstname }}</td>
                                    <td>{{ $student->middlename }}</td>
                                    <td>{{ $student->dob }}</td>
                                    <td>{{ $student->gender }}</td>
                                    <td>{{ $student->course->name ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <!-- Delete button -->
                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?')">
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
            </main>
            <!-- End Manage Students Content -->

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
