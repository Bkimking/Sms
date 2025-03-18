<!-- this is dashboard for student -->

<!-- dashboard -->

<!DOCTYPE html>
<html lang="en">

<head>

    <title>student Dashboard</title>

    <!-- Include Head -->
    @include('kenswed.student.includes.head')
    <!-- End Head -->

</head>

<body class="sb-nav-fixed">

    <!-- Navbar -->
    @include('kenswed.student.includes.navbar')
    <!-- End Navbar -->

    <div id="layoutSidenav">

        <!-- Sidebar -->
        @include('kenswed.student.includes.sidebar')
        <!-- End Sidebar -->

        <div id="layoutSidenav_content">

            <!-- Main Content -->

            <main>
                <div class="container-fluid px-4">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session('warning'))
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            {{ session('warning') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Welcome, {{ Auth::user()->name }}!</h1>
                        <p class="lead">This is your student dashboard</p>

                        <!-- Course Overview -->
                        <div class="row">
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">My Courses</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link"
                                            href="{{ route('student.courses') }}">View Details</a>
                                        <div class="small text-white"><i class="fas fa-arrow-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Assignments Due</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link"
                                            href="{{ route('student.assignments') }}">Check Now</a>
                                        <div class="small text-white"><i class="fas fa-arrow-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Exam Schedule</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link"
                                            href="{{ route('student.exams') }}">View</a>
                                        <div class="small text-white"><i class="fas fa-arrow-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Latest Announcements -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-bullhorn me-1"></i>
                                Announcements
                            </div>
                            <div class="card-body">
                                <ul>
                                    <li>New Assignment: Project Proposal (Due in 3 days)</li>
                                    <li>Upcoming Exam: Mathematics (March 15)</li>
                                    <li>School Event: Hackathon Registration Open!</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!-- End Main Content -->


            <!-- Footer -->
            @include('kenswed.student.includes.footer')
            <!-- End Footer -->

        </div>

    </div>

    <!-- Scripts -->
    @include('kenswed.student.includes.scripts')
    <!-- End Scripts -->
</body>

</html>
