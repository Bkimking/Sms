<!-- this is dashboard for Sponsored student -->

<!-- dashboard -->

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Sponsored student Dashboard</title>

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
                    <h1 class="mt-4">Welcome, Sponsored student!</h1>

                    <div class="card mb-4">
                        <div class="card-body">
                            This is the Sponsored student Dashboard page. If you encounter any issues, please contact the
                            developers.
                            <a href="#mailto:developers@example.com">Contact Developers</a>.
                        </div>
                    </div>

                    <p class="lead">This is your dashboard</p>

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
    <!-- End Scripts -->
</body>

</html>
