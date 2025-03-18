<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>

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

            <!-- Department Content -->
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
                
                <h1 class="mt-4">Add Department</h1>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Add Department</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        This is the Add Department page. If you encounter any problems, please contact the developers.
                        <a href="#mailto:developers@example.com">Contact Developers</a>.
                    </div>
                </div>

                <!-- Form for Adding Department -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-plus-circle"></i> Add Department
                    </div>
                    <div class="card-body">
                        <form action="{{ route('departments.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="deptname" class="form-label">Department Name</label>
                                <input type="text" name="deptname" id="deptname" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="deptcode" class="form-label">Department Code</label>
                                <input type="text" name="deptcode" id="deptcode" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="deptdescription" class="form-label">Department Description</label>
                                <textarea name="deptdescription" id="deptdescription" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="depthead" class="form-label">Head of Department</label>
                                <select name="depthead" id="depthead" class="form-control">
                                    <option value="">Select Head of Department</option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Add Department</button>
                            <!-- Back Button -->
                            <a href="{{ route('admin') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                            <a href="{{ route('departments.manage') }}" class="btn btn-warning">Manage Departments</a>
                        </form>
                    </div>
                </div>
            </main>
            <!-- End Department Content -->

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
