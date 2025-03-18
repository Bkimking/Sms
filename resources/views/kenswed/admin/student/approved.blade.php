<!DOCTYPE html>
<html lang="en">

<head>
    <title>Enroll Student</title>

    <!-- Include Head -->
    @include('kenswed.admin.includes.head')
    <!-- End Head -->
    <style>
        #sub-options-container {
            display: none;
            /* Initially hidden */
        }

        #sub-options-container.show {
            display: block !important;
        }
    </style>
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

            <!-- Enroll Student Content -->
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

                <h1 class="mt-4">View Student</h1>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Enroll Student</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-body">
                        This is the Enroll Student page.
                        If you encounter any issues, please contact the developers.
                        <a href="mailto:developers@example.com">Contact Developers</a>.
                    </div>
                </div>

                <div class="card-body">
                    <div class="card mb-4">
                        <div class="card-header">Enroll a New Student</div>
                        <div class="card-body">
                            <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data"
                                novalidate>
                                @csrf

                                <!-- Student Details -->
                                <fieldset class="mb-4">
                                    <legend>Student Details</legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- Surname -->
                                            <div class="mb-3">
                                                <label for="surname" class="form-label">Surname</label>
                                                <input type="text" class="form-control" id="surname" name="surname"
                                                    required>
                                                <div class="invalid-feedback">Name must be at least 2 characters.</div>
                                            </div>

                                            <!-- First Name -->
                                            <div class="mb-3">
                                                <label for="first_name" class="form-label">First Name</label>
                                                <input type="text" class="form-control" id="first_name"
                                                    name="first_name" required>
                                                <div class="invalid-feedback">Name must be at least 2 characters.</div>
                                            </div>

                                            <!-- Email -->
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    required>
                                                <div class="invalid-feedback">Enter a valid email address.</div>
                                            </div>

                                            <!-- Date of Birth -->
                                            <div class="mb-3">
                                                <label for="dob" class="form-label">Date of Birth</label>
                                                <input type="date" class="form-control" id="dob" name="dob"
                                                    required>
                                                <div class="invalid-feedback">Student must be at least 15 years old.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <!-- Gender -->
                                            <div class="mb-3">
                                                <label for="gender" class="form-label">Gender</label>
                                                <select class="form-control" id="gender" name="gender" required>
                                                    <option value="">Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                                <div class="invalid-feedback">Please select a gender.</div>
                                            </div>

                                            <!-- Telephone -->
                                            <div class="mb-3">
                                                <label for="tel" class="form-label">Telephone</label>
                                                <input type="tel" class="form-control" id="tel" name="tel"
                                                    required>
                                                <div class="invalid-feedback">Enter a valid Kenyan phone number.</div>
                                            </div>

                                            <!-- KCPE & KCSE Completion -->
                                            <div class="mb-3">
                                                <label class="form-label">Academic Completion</label>
                                                <div class="form-check">
                                                    <input type="checkbox" id="done_kcpe" name="done_kcpe"
                                                        onchange="toggleFileInput('kcpe_upload', this)">
                                                    <label for="done_kcpe">Completed KCPE?</label>
                                                </div>
                                                <div id="kcpe_upload" style="display: none;">
                                                    <input type="file" class="form-control" id="kcpe_certificate"
                                                        name="kcpe_certificate">
                                                    <div class="invalid-feedback">Only JPG, PNG, or PDF files are
                                                        allowed.</div>
                                                </div>

                                                <div class="form-check mt-2">
                                                    <input type="checkbox" id="done_kcse" name="done_kcse"
                                                        onchange="toggleFileInput('kcse_upload', this)">
                                                    <label for="done_kcse">Completed KCSE?</label>
                                                </div>
                                                <div id="kcse_upload" style="display: none;">
                                                    <input type="file" class="form-control" id="kcse_certificate"
                                                        name="kcse_certificate">
                                                    <div class="invalid-feedback">Only JPG, PNG, or PDF files are
                                                        allowed.</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <hr>

                                <!-- Next of Kin Details -->
                                <fieldset class="mb-4">
                                    <legend>Next of Kin Details</legend>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- Full Names -->
                                            <div class="mb-3">
                                                <label for="kin_name" class="form-label">Full Names</label>
                                                <input type="text" class="form-control" id="kin_name"
                                                    name="kin_name" required>
                                                <div class="invalid-feedback">Name must be at least 2 characters.</div>
                                            </div>

                                            <!-- Email -->
                                            <div class="mb-3">
                                                <label for="kin_email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="kin_email"
                                                    name="kin_email" required>
                                                <div class="invalid-feedback">Enter a valid email address.</div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <!-- ID Number -->
                                            <div class="mb-3">
                                                <label for="kin_id" class="form-label">ID Number</label>
                                                <input type="text" class="form-control" id="kin_id"
                                                    name="kin_id" required>
                                                <div class="invalid-feedback">ID must be exactly 8 digits.</div>
                                            </div>

                                            <!-- Telephone -->
                                            <div class="mb-3">
                                                <label for="kin_tel" class="form-label">Telephone</label>
                                                <input type="tel" class="form-control" id="kin_tel"
                                                    name="kin_tel" required>
                                                <div class="invalid-feedback">Enter a valid Kenyan phone number.</div>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>                                

                                <hr>

                                <fieldset class="mb-4">
                                    <legend>Course Selection</legend>

                                    <!-- Course Dropdown -->
                                    <div class="mb-3">
                                        <label for="course_id" class="form-label">Select Course</label>
                                        <select name="course_id" id="course_id" class="form-control" required
                                            onchange="updateSubCourses()">
                                            <option value="">Select Course</option>
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="invalid-feedback">Please select a course.</div>
                                    </div>

                                    <!-- Sub-course Dropdown (Initially Hidden) -->
                                    <div class="mb-3" id="subcourse_section" style="display: none;">
                                        <label for="subcourse_id" class="form-label">Select Sub-Course</label>
                                        <select class="form-control" id="subcourse_id" name="subcourse_id">
                                            <option value="">Select Sub-Course</option>
                                        </select>
                                        <div class="invalid-feedback">Please select a sub-course.</div>
                                    </div>
                                </fieldset>

                                <!-- Agreement Checkbox -->
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" name="agreetorules" required>
                                    <label class="form-check-label">
                                        I confirm that the information provided is true and I agree to the <a
                                            href="#">rules and regulations</a>.
                                    </label>
                                    <div class="invalid-feedback">You must agree to the rules.</div>
                                </div>

                                <h5>Create a password of student</h5>

                                <!-- Password -->
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password" name="password"
                                            required>
                                        <button type="button"
                                            class="btn btn-outline-secondary password-toggle">🔒</button>
                                    </div>
                                    <small class="text-muted">The password should be their admission number or at least
                                        8 characters long.</small>
                                    <div class="invalid-feedback">Password must be at least 8 characters.</div>
                                </div>

                                <!-- Confirm Password -->
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" required>
                                        <button type="button"
                                            class="btn btn-outline-secondary password-toggle">🔒</button>
                                    </div>
                                    <div class="invalid-feedback">Passwords must match.</div>
                                </div>

                                <!-- Submit & Manage Buttons -->
                                <button type="submit" class="btn btn-primary">Enroll Student</button>
                                <a class="btn btn-warning" href="{{ route('student.manage') }}">Manage Students</a>
                            </form>
                        </div>
                    </div>
                </div>

            </main>
            <!-- End Enroll Student Content -->

            <!-- Footer -->
            @include('kenswed.admin.includes.footer')

            <!-- End Footer -->

        </div>

    </div>

    <!-- Scripts -->
    @include('kenswed.admin.includes.scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Function to toggle file input visibility
            function toggleFileInput(inputId, checkbox) {
                let inputField = document.getElementById(inputId);
                if (checkbox.checked) {
                    inputField.style.display = "block";
                } else {
                    inputField.style.display = "none";
                    inputField.querySelector("input").value = ""; // Clear file input if unchecked
                }
            }

            // Add event listeners for KCPE & KCSE checkboxes
            document.getElementById("done_kcpe").addEventListener("change", function() {
                toggleFileInput("kcpe_upload", this);
            });

            document.getElementById("done_kcse").addEventListener("change", function() {
                toggleFileInput("kcse_upload", this);
            });

            // Password toggle functionality
            document.querySelectorAll(".password-toggle").forEach(function(toggleButton) {
                toggleButton.addEventListener("click", function() {
                    let passwordField = this.previousElementSibling;
                    if (passwordField.type === "password") {
                        passwordField.type = "text";
                        this.innerHTML = "👁️"; // Change icon to open eye
                    } else {
                        passwordField.type = "password";
                        this.innerHTML = "🔒"; // Change icon to closed lock
                    }
                });
            });
        });
    </script>

    <!-- JavaScript for Handling Sub-Courses -->
    <script>
        var courses = @json($courses); // Make sure subcourses data is properly passed

        function updateSubCourses() {
            let courseId = document.getElementById("course_id").value;
            let subcourseDropdown = document.getElementById("subcourse_id");
            let subcourseSection = document.getElementById("subcourse_section");

            // Clear previous sub-course options
            subcourseDropdown.innerHTML = '<option value="">Select Sub-Course</option>';

            if (courseId) {
                let selectedCourse = courses.find(course => course.id == courseId);

                if (selectedCourse && selectedCourse.subcourses.length > 0) {
                    subcourseSection.style.display = "block";

                    selectedCourse.subcourses.forEach(subcourse => {
                        // Ensure the key matches the actual field name in your database
                        let option = new Option(subcourse.sub_course_name, subcourse.id);
                        subcourseDropdown.add(option);
                    });
                } else {
                    subcourseSection.style.display = "none";
                }
            } else {
                subcourseSection.style.display = "none";
            }
        }
    </script>

    <!-- End Scripts -->
</body>

</html>
