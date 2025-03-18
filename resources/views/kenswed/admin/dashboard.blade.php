<!-- this is dashboard for admin -->

<!-- dashboard -->

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>

    <!-- Include Head -->
    @include('kenswed.admin.includes.head')
    <style>
        .card {
            border-radius: 10px;
        }

        .dropdown-menu {
            min-width: auto;
        }
    </style>

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
                    <h1 class="mt-4">Welcome, Admin!</h1>

                    <div class="card mb-4">
                        <div class="card-body">
                            This is the Admin Dashboard page. If you encounter any issues, please contact the
                            developers.
                            <a href="#mailto:developers@example.com">Contact Developers</a>.
                        </div>
                    </div>

                    <p class="lead">This is your dashboard where you can manage users, departments, and more.</p>

                    <div class="row">
                        <!-- Left Side (Two Cards Per Row) -->
                        <div class="col-lg-8">
                            <div class="row">
                                <!-- Staff Card -->
                                <div class="col-md-6 mb-4">
                                    <div class="card border-left-warning shadow h-100 py-2">
                                        <div class="card-body position-relative">
                                            <div class="dropdown position-absolute" style="top: 1px; right: 8px;">
                                                <button class="btn btn-sm btn-link text-dark dropdown-toggle"
                                                    type="button" id="dropdownStaff" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="dropdownStaff">
                                                    <li><button class="dropdown-item"
                                                            onclick="updateCard('Total Staff', 25)">Total Staff</button>
                                                    </li>
                                                    <li><button class="dropdown-item"
                                                            onclick="updateCard('On Leave', 5)">On Leave</button></li>
                                                    <li><button class="dropdown-item"
                                                            onclick="updateCard('Available', 18)">Available</button>
                                                    </li>
                                                    <li><button class="dropdown-item"
                                                            onclick="updateCard('New Hires', 2)">New Hires</button></li>
                                                </ul>
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div
                                                        class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                        Total Staff</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">25</div>
                                                </div>
                                                <div class="col-auto" style="padding-top: 15px;">
                                                    <i class="fas fa-user-tie fa-2x text-warning"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Student Card -->
                                <div class="col-md-6 mb-4">
                                    <div class="card border-left-primary shadow h-100 py-2">
                                        <div class="card-body position-relative">
                                            <div class="dropdown position-absolute" style="top: 1px; right: 8px;">
                                                <button class="btn btn-sm btn-link text-dark dropdown-toggle"
                                                    type="button" id="dropdownStudent" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="dropdownStudent">
                                                    <li><button class="dropdown-item"
                                                            onclick="updateCard('Total Students', 500)">Total
                                                            Students</button></li>
                                                    <li><button class="dropdown-item"
                                                            onclick="updateCard('Graduates', 120)">Graduates</button>
                                                    </li>
                                                    <li><button class="dropdown-item"
                                                            onclick="updateCard('Enrolled', 380)">Enrolled</button></li>
                                                    <li><button class="dropdown-item"
                                                            onclick="updateCard('New Admissions', 50)">New
                                                            Admissions</button></li>
                                                </ul>
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div
                                                        class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                        Total Students</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">500</div>
                                                </div>
                                                <div class="col-auto" style="padding-top: 15px;">
                                                    <i class="fas fa-user-graduate fa-2x text-primary"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Alumni Card -->
                                <div class="col-md-6 mb-4">
                                    <div class="card border-left-success shadow h-100 py-2">
                                        <div class="card-body position-relative">
                                            <div class="dropdown position-absolute" style="top: 1px; right: 8px;">
                                                <button class="btn btn-sm btn-link text-dark dropdown-toggle"
                                                    type="button" id="dropdownAlumni" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end"
                                                    aria-labelledby="dropdownAlumni">
                                                    <li><button class="dropdown-item"
                                                            onclick="updateCard('Total Alumni', 2000)">Total
                                                            Alumni</button></li>
                                                    <li><button class="dropdown-item"
                                                            onclick="updateCard('Graduates Last Year', 350)">Graduates
                                                            Last Year</button></li>
                                                    <li><button class="dropdown-item"
                                                            onclick="updateCard('Employed Alumni', 1200)">Employed
                                                            Alumni</button></li>
                                                    <li><button class="dropdown-item"
                                                            onclick="updateCard('Active Alumni', 800)">Active
                                                            Alumni</button></li>
                                                </ul>
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col mr-2">
                                                    <div
                                                        class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                        Total Alumni</div>
                                                    <div class="h5 mb-0 font-weight-bold text-gray-800">2000</div>
                                                </div>
                                                <div class="col-auto" style="padding-top: 15px;">
                                                    <i class="fas fa-users fa-2x text-success"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Add more cards here as needed -->
                            </div>
                        </div>

                        <!-- Right Side (Personal Info Card) -->
                        @if (Auth::user()->admin &&
                                (Auth::user()->admin->firstname ||
                                    Auth::user()->admin->lastname ||
                                    Auth::user()->admin->phone_number ||
                                    Auth::user()->admin->address ||
                                    Auth::user()->admin->profile_pic))
                            <div class="col-lg-4">
                                <div class="card shadow h-100">
                                    <div class="card-header bg-primary text-white text-center">
                                        <h5 class="mb-0">Personal Info</h5>
                                    </div>
                                    <div class="card-body d-flex align-items-center">
                                        <!-- Left Side: Personal Details -->
                                        <div class="flex-grow-1">
                                            <h5 class="mb-1">{{ Auth::user()->admin->firstname ?? 'Your Name' }}
                                                {{ Auth::user()->admin->lastname ?? '' }}</h5>
                                            <p class="text-muted mb-1">{{ Auth::user()->admin->role ?? 'Admin' }}</p>
                                            <p class="text-muted mb-1"><i class="fas fa-phone"></i>
                                                {{ Auth::user()->admin->phone_number ?? 'Phone Number' }}</p>
                                            <p class="text-muted mb-1"><i class="fas fa-envelope"></i>
                                                {{ Auth::user()->email ?? 'Email Address' }}</p>
                                            <p class="text-muted"><i class="fas fa-map-marker-alt"></i>
                                                {{ Auth::user()->admin->address ?? 'No Address Provided' }}</p>
                                        </div>

                                        <!-- Right Side: Profile Image -->
                                        <div class="ms-3">
                                            <img src="{{ Auth::user()->admin->profile_pic
                                                ? asset('storage/' . Auth::user()->admin->profile_pic)
                                                : asset('imgs/default_profile.svg') }}"
                                                class="rounded-circle" width="150" height="150"
                                                alt="Profile Picture">
                                        </div>
                                    </div>

                                    <!-- Bottom Section (Profile Button) -->
                                    <div class="card-footer bg-light d-flex justify-content-center">
                                        <a href="{{ route('admin.profile.view') }}"
                                            class="btn btn-primary btn-sm">View Profile</a>
                                    </div>
                                </div>
                            </div>
                        @endif


                    </div>


                </div>
            </main>
            <!-- End Main Content -->

            <!-- Footer -->
            @include('kenswed.admin.includes.footer')
            <!-- End Footer -->

        </div>

    </div>

    <!-- Scripts -->
    @include('kenswed.admin.includes.scripts')
    <script>
        function updateCard(title, count) {
            const card = event.target.closest('.card-body');
            card.querySelector('.text-uppercase').textContent = title;
            card.querySelector('.font-weight-bold').textContent = count;
        }
    </script>

    <!-- End Scripts -->
</body>

</html>
