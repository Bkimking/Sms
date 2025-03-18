<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard - Edit Staff</title>

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
                <h1 class="mt-4">Edit Staff Member</h1>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('staff.manage') }}">Manage Staff</a></li>
                    <li class="breadcrumb-item active">Edit Staff</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-body">
                        This is the Edit Staff page. If you encounter any issues, please contact the developers.
                        <a href="#mailto:developers@example.com">Contact Developers</a>.
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-user-edit"></i> Edit Staff Member
                    </div>
                    <div class="card-body">
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <form action="{{ route('staff.update', $staff->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <!-- Staff ID Field -->
                                <div class="mb-3">
                                    <label for="staff_id" class="form-label">Staff ID</label>
                                    <div class="input-group">
                                        <input type="text" name="staff_id" id="staff_id" class="form-control"
                                            value="{{ optional($staff->staffid)->staff_id }}" readonly>
                                        <button type="button" class="btn btn-outline-secondary" id="generateStaffId">
                                            <i class="fas fa-key"></i> <!-- Font Awesome Key Icon -->
                                        </button>
                                        <!-- Lock/Unlock Button -->
                                        <button type="button" class="btn btn-outline-secondary" id="toggleStaffIdLock">
                                            <i id="lockIcon" class="fas fa-lock"></i> <!-- Default Locked Icon -->
                                        </button>
                                    </div>
                                    <small class="text-muted">Staff ID cannot be changed unless unlocked.</small>
                                </div>

                                <!-- Name Field -->
                                <div class="mb-3 ">
                                    <label for="name" class="form-label">Username</label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ $staff->name }}" required>
                                </div>

                                <!-- Email Field -->
                                <div class="mb-3 ">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="{{ $staff->email }}" required>
                                </div>

                                <!-- Role Selection -->
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="role" id="role" class="form-control" required>
                                        <option value="1" {{ $staff->role == 1 ? 'selected' : '' }}>Admin</option>
                                        <option value="3" {{ $staff->role == 3 ? 'selected' : '' }}>Super Admin
                                        </option>
                                        <option value="4" {{ $staff->role == 4 ? 'selected' : '' }}>Teacher
                                        </option>
                                        <option value="5" {{ $staff->role == 5 ? 'selected' : '' }}>Cafeteria
                                        </option>
                                        <option value="7" {{ $staff->role == 7 ? 'selected' : '' }}>Media</option>
                                    </select>
                                </div>

                                <!-- Password Field (Optional) -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">New Password (Optional)</label>
                                    <div class="input-group">
                                        <input type="password" name="password" id="password" class="form-control"
                                            minlength="8">
                                        <button type="button" class="btn btn-outline-secondary togglePassword">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                    <small class="text-muted">Leave blank if you do not want to change the
                                        password.</small>
                                </div>
                            </div>

                            <!-- Submit & Cancel Buttons -->
                            <div class="mt-3">
                                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Update
                                    Staff</button>
                                <a href="{{ route('staff.manage') }}" class="btn btn-secondary"><i
                                        class="fas fa-times"></i> Cancel</a>
                            </div>
                        </form>
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

    <script>
        // togglePassword
        document.querySelectorAll('.togglePassword').forEach(button => {
            button.addEventListener('click', function() {
                let passwordField = this.previousElementSibling;
                let icon = this.querySelector('i');

                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    icon.classList.replace('fa-eye', 'fa-eye-slash');
                } else {
                    passwordField.type = 'password';
                    icon.classList.replace('fa-eye-slash', 'fa-eye');
                }
            });
        });

        // Generate Staff ID
        document.getElementById('generateStaffId').addEventListener('click', function() {
            const randomNumber = Math.floor(100 + Math.random() * 900); // Generate 3-digit random number
            const staffId = `STA-${randomNumber}`;
            document.getElementById('staff_id').value = staffId;
        });

        // Lock/Unlock Staff ID
        document.getElementById('toggleStaffIdLock').addEventListener('click', function() {
            let staffIdField = document.getElementById('staff_id');
            let lockIcon = document.getElementById('lockIcon');

            if (staffIdField.hasAttribute('readonly')) {
                staffIdField.removeAttribute('readonly'); // Enable Editing
                staffIdField.focus(); // Focus on the field
                lockIcon.classList.replace('fa-lock', 'fa-lock-open'); // Change to Unlocked Icon
            } else {
                staffIdField.setAttribute('readonly', true); // Disable Editing
                lockIcon.classList.replace('fa-lock-open', 'fa-lock'); // Change back to Locked Icon
            }
        });
    </script>

</body>

</html>
