<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard - Profile</title>
    @include('kenswed.admin.includes.head')
</head>

<body class="sb-nav-fixed">
    @include('kenswed.admin.includes.navbar')

    <div id="layoutSidenav">
        @include('kenswed.admin.includes.sidebar')

        <div id="layoutSidenav_content">
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

                @if (session('warning'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        {{ session('warning') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <h1 class="mt-4">Profile</h1>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">View Profile</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-body">
                        This is the View Profile page. If you encounter any issues, please contact the developers.
                        <a href="mailto:developers@example.com">Contact Developers</a>.
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        Profile for {{ Auth::user()->name ?? 'User' }}
                        <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary btn-sm float-end">Edit
                            Profile</a>
                    </div>
                    <div class="card-body">
                        <div class="row">

                            <!-- Profile Picture -->
                            <div class="col-md-4 text-center">
                                @if ($admin && $admin->profile_pic)
                                    {{-- Ensure $admin is not null --}}
                                    <img src="{{ asset('storage/' . $admin->profile_pic) }}" class="img-fluid"
                                        width="200">
                                @else
                                    <img src="{{ asset('imgs/default_profile.svg') }}"
                                        class="img-fluid rounded-circle border border-3 border-secondary"
                                        width="200">
                                    <p class="text-danger mt-2">Please insert your image on the <a
                                            href="{{ route('admin.profile.edit') }}" class="text-primary">edit page</a>.
                                    </p>
                                @endif
                            </div>

                            <!-- Profile Details -->
                            <div class="col-md-8">
                                <table class="table table-borderless table-striped">
                                    <tr>
                                        <th width="30%">First Name:</th>
                                        <td>{{ $admin->firstname ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Middle Name:</th>
                                        <td>{{ $admin->middlename ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Last Name:</th>
                                        <td>{{ $admin->lastname ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Phone Number:</th>
                                        <td>{{ $admin->phone_number ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Gender:</th>
                                        <td>{{ ucfirst($admin->gender ?? 'N/A') }}</td>
                                    </tr>

                                    <tr>
                                        <th>Address:</th>
                                        <td>{{ $admin->address ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status:</th>
                                        <td>
                                            @if ($admin)
                                                <span
                                                    class="badge bg-{{ $admin->status == 'active' ? 'success' : ($admin->status == 'suspended' ? 'danger' : 'warning') }}">
                                                    {{ ucfirst($admin->status) }}
                                                </span>
                                            @else
                                                <span class="badge bg-warning">Incomplete Profile</span>
                                            @endif
                                        </td>
                                    </tr>

                                </table>

                                <a href="{{ route('admin.profile.edit') }}" class="btn btn-primary mt-3">Edit
                                    Profile</a>

                                @if (!empty($admin->firstname) || !empty($admin->lastname) || !empty($admin->profile_pic))
                                    <form action="{{ route('admin.profile.reset') }}" method="POST" class="mt-2">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Reset Profile</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            @include('kenswed.admin.includes.footer')
        </div>
    </div>
    @include('kenswed.admin.includes.scripts')
</body>

</html>
