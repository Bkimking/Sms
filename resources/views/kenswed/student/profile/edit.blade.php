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
                    <li class="breadcrumb-item active">Edit Profile</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-body">
                        This is the Edit Profile page. If you encounter any issues, please contact the developers.
                        <a href="#mailto:developers@example.com">Contact Developers</a>.
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        Update Profile
                        @if (Auth::user()->admin && Auth::user()->admin->firstname)
                            <a href="{{ route('admin.profile.view') }}" class="btn btn-primary btn-sm float-end">View
                                Profile</a>
                        @endif
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label>First Name:</label>
                                <input type="text" name="firstname" class="form-control"
                                    value="{{ old('firstname', $admin->firstname ?? '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label>Middle Name:</label>
                                <input type="text" name="middlename" class="form-control"
                                    value="{{ old('middlename', $admin->middlename ?? '') }}">
                            </div>

                            <div class="mb-3">
                                <label>Last Name:</label>
                                <input type="text" name="lastname" class="form-control"
                                    value="{{ old('lastname', $admin->lastname ?? '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label>Phone Number:</label>
                                <input type="text" name="phone_number" class="form-control"
                                    value="{{ old('phone_number', $admin->phone_number ?? '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label>Address:</label>
                                <input type="text" name="address" class="form-control"
                                    value="{{ old('address', $admin->address ?? '') }}" required>
                            </div>

                            <!-- Gender Selection -->
                            <div class="mb-3">
                                <label>Gender:</label>
                                <select name="gender" class="form-control" required>
                                    <option value="" disabled selected>Select Gender</option>
                                    <option value="male"
                                        {{ old('gender', $admin->gender ?? '') == 'male' ? 'selected' : '' }}>Male
                                    </option>
                                    <option value="female"
                                        {{ old('gender', $admin->gender ?? '') == 'female' ? 'selected' : '' }}>Female
                                    </option>
                                </select>
                            </div>

                            <!-- Profile Picture -->
                            <div class="mb-3">
                                <label>Profile Picture:</label>
                                <input type="file" name="profile_pic" class="form-control">
                            </div>

                            <!-- Current Profile Picture -->
                            @if (Auth::user()->admin && Auth::user()->admin->profile_pic)
                                <div class="mb-3">
                                    <p class="mb-1">Current Profile Picture:</p>
                                    <img src="{{ asset('storage/' . (Auth::user()->admin->profile_pic ?? 'default_profile.svg')) }}"
                                        class="img-thumbnail" width="150" height="150" alt="Profile Picture">
                                </div>
                            @endif

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-success">Update Profile</button>

                        </form>
                        @if (!empty($admin->firstname) || !empty($admin->lastname) || !empty($admin->profile_pic))
                        <form action="{{ route('admin.profile.reset') }}" method="POST" class="mt-2">
                            @csrf
                            <button type="submit" class="btn btn-danger">Reset Profile</button>
                        </form>
                    @endif
                    </div>
                </div>
            </main>
            @include('kenswed.admin.includes.footer')
        </div>
    </div>
    @include('kenswed.admin.includes.scripts')
</body>

</html>
