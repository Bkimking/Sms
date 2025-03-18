<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard - Add Staff</title>

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

            <!-- Staff Content -->
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

                <h1 class="mt-4">Add Staff</h1>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Add Staff</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-body">
                        This is the Add Staff page. If you encounter any issues, please contact the developers.
                        <a href="#mailto:developers@example.com">Contact Developers</a>.
                    </div>
                </div>

                <!-- Form for Adding Staff -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-plus-circle"></i> Add Staff
                    </div>
                    <div class="card-body">
                        <form action="{{ route('staff.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Username</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="role" class="form-label">Role</label>
                                <select name="role" id="role" class="form-control" required>
                                    <option value="">Select Role</option>
                                    <option value="1">Admin</option>
                                    <option value="3">Super Admin</option>
                                    <option value="4">Teacher</option>
                                    <option value="5">Cafeteria</option>
                                    <option value="7">Media</option>
                                </select>
                            </div>

                            <!-- Staff ID Field -->
                            <div class="mb-3">
                                <label for="staff_id" class="form-label">Staff ID</label>
                                <div class="input-group">
                                    <input type="text" name="staff_id" id="staff_id" class="form-control" required>
                                    <button type="button" class="btn btn-outline-secondary" id="generateStaffId">
                                        <i class="fas fa-key"></i> <!-- Font Awesome Key Icon -->
                                    </button>
                                </div>
                            </div>

                            <!-- Password Field -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                    <input type="password" name="password" id="password" class="form-control" required>
                                    <button type="button" class="btn btn-outline-secondary" id="togglePassword">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <small id="passwordError" class="text-danger"></small> <!-- Error message -->
                            </div>

                            <button type="submit" class="btn btn-primary" id="submitBtn">Add Staff</button>
                            <a href="{{ route('admin') }}" class="btn btn-secondary">Back</a>
                            <a href="{{ route('staff.manage') }}" class="btn btn-warning">Manage Staff</a>
                        </form>
                    </div>
                </div>
            </main>
            <!-- End Staff Content -->

            <!-- Footer -->
            @include('kenswed.admin.includes.footer')
            <!-- End Footer -->

        </div>

    </div>

    <!-- Scripts -->
    @include('kenswed.admin.includes.scripts')

    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            let passwordField = document.getElementById('password');
            let icon = this.querySelector('i');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        document.getElementById('submitBtn').addEventListener('click', function(event) {
            let passwordField = document.getElementById('password');
            let passwordError = document.getElementById('passwordError');

            if (passwordField.value.length < 8) {
                event.preventDefault(); // Stop form submission
                passwordError.textContent = "Password must be at least 8 characters long.";
            } else {
                passwordError.textContent = ""; // Clear error if valid
            }
        });

        document.getElementById('generateStaffId').addEventListener('click', function() {
            const randomNumber = Math.floor(100 + Math.random() * 900); // Generate 3-digit random number
            const staffId = `STA-${randomNumber}`;
            document.getElementById('staff_id').value = staffId;
        });
    </script>
    <!-- End Scripts -->

</body>

</html>
