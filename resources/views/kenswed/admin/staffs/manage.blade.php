<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard - Manage Staff</title>

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

                <h1 class="mt-4">Manage Staff</h1>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Manage Staff</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-body">
                        This is the Manage Staff page. If you encounter any issues, please contact the developers.
                        <a href="mailto:developers@example.com">Contact Developers</a>.
                    </div>
                </div>

                <!-- Table to Display Staff Members -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-users"></i> Staff List
                        <a href="{{ route('staff.create') }}" class="btn btn-primary btn-sm float-end">+ Add Staff</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Staff ID</th>
                                    <th>Profile Picture</th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Address</th>
                                    <th>Gender</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                @foreach ($staff as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->staff_id ?? 'Not Assigned' }}</td>
                                        
                                        <!-- Profile Picture -->
                                        <td>
                                            @if ($user->profile_pic)
                                                <img src="{{ asset('storage/' . $user->profile_pic) }}" alt="Profile Picture"  width="80">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>
                        
                                        <td>{{ $user->name ?? 'N/A' }}</td>
                                        <td>{{ $user->firstname ?? 'N/A' }}</td>
                                        <td>{{ $user->lastname ?? 'N/A' }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone_number ?? 'N/A' }}</td>
                                        <td>{{ $user->address ?? 'N/A' }}</td>
                        
                                        <!-- Gender -->
                                        <td>{{ ucfirst($user->gender ?? 'N/A') }}</td>
                        
                                        <!-- Status Badge -->
                                        <td>
                                            <span class="badge bg-{{ $user->status == 'active' ? 'success' : ($user->status == 'suspended' ? 'danger' : 'warning') }}">
                                                {{ ucfirst($user->status) }}
                                            </span>
                                        </td>
                        
                                        <!-- Role -->
                                        <td>
                                            @switch($user->role)
                                                @case(1) Admin @break
                                                @case(3) Super Admin @break
                                                @case(4) Teacher @break
                                                @case(5) Cafeteria @break
                                                @case(7) Media @break
                                                @default Unknown
                                            @endswitch
                                        </td>
                        
                                        <!-- Actions -->
                                        <td>
                                            <a href="{{ route('staff.view', $user->id) }}" class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                        
                                            <a href="{{ route('staff.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                        
                                            <form action="{{ route('staff.destroy', $user->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this staff member?');">
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
                <a href="{{ route('staff.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus-circle"></i> Add New Staff
                </a>
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
