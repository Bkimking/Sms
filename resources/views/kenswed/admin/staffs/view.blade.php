<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard - View Staff</title>

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

            <!-- Content -->
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

                <h1 class="mt-4">View Staff: {{ $staff->name }}</h1>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('staff.manage') }}">Manage Staff</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('staff.edit', $staff->id) }}">Edit Staff</a></li>
                    <li class="breadcrumb-item active">View Staff</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-body">
                        This is the View Staff page. If you encounter any issues, please contact the developers.
                        <a href="mailto:developers@example.com">Contact Developers</a>.
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-user"></i> Staff Details
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Profile Picture</th>
                                <td>
                                    @if ($staff->profile_pic)
                                        <img src="{{ asset('storage/' . $staff->profile_pic) }}" alt="Profile Picture"
                                            class="img-thumbnail" width="100">
                                    @else
                                        <span class="text-muted">No Profile Picture</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Staff ID</th>
                                <td>{{ $staff->staff_id ?? 'Not Assigned' }}</td>
                            </tr>
                            <tr>
                                <th>First Name</th>
                                <td>{{ $staff->firstname ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Middle Name</th>
                                <td>{{ $staff->middlename ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Last Name</th>
                                <td>{{ $staff->lastname ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Username</th>
                                <td>{{ $staff->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $staff->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone Number</th>
                                <td>{{ $staff->phone_number ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $staff->address ?? 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{ ucfirst($staff->gender ?? 'N/A') }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <span
                                        class="badge bg-{{ $staff->status == 'active' ? 'success' : ($staff->status == 'suspended' ? 'danger' : 'warning') }}">
                                        {{ ucfirst($staff->status) }}
                                    </span>
                                </td>
                            </tr>
                            <tr>
                                <th>Date Joined</th>
                                <td>{{ $staff->created_at ? $staff->created_at->format('d M Y') : 'N/A' }}</td>
                            </tr>
                            <tr>
                                <th>Role</th>
                                <td>
                                    @switch($staff->role)
                                        @case(1)
                                            Admin
                                        @break

                                        @case(3)
                                            Super Admin
                                        @break

                                        @case(4)
                                            Teacher
                                        @break

                                        @case(5)
                                            Cafeteria
                                        @break

                                        @case(7)
                                            Media
                                        @break

                                        @default
                                            Unknown Role
                                    @endswitch
                                </td>
                            </tr>
                        </table>

                        <!-- Back Button -->
                        <a href="{{ route('staff.manage') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </div>
                </div>

            </main>
            <!-- End Content -->

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
