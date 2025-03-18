<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard</title>

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

            <!-- HeaderItem Content -->
            <main class="container-fluid px-4">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <h1 class="mt-4">Add Header Item</h1>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Add Header Item</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        This is the Add Header Item page. If you encounter any problems, please contact the developers.
                        <a href="#mailto:developers@example.com">Contact Developers</a>.
                    </div>
                </div>

                <!-- Form for Adding Header Item -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-plus-circle"></i> Add Header Item
                    </div>
                    <div class="card-body">
                        <form action="{{ route('header.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="headertitle" class="form-label">Header Title</label>
                                <input type="text" name="headertitle" id="headertitle" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="headersubtitle" class="form-label">Header Subtitle</label>
                                <input type="text" name="headersubtitle" id="headersubtitle" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label for="headerparagraph" class="form-label">Header Content</label>
                                <input type="text" name="headerparagraph" id="headerparagraph" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label for="headerimg" class="form-label">Header Image</label>
                                <input type="file" name="headerimg" id="headerimg" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">Add Header Item</button>
                            <!-- Back Button -->
                            <a href="{{ route('admin') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                            <a href="{{ route('header.manage') }}" class="btn btn-warning">Manage Header Item</a>
                        </form>
                    </div>
                </div>
            </main>
            <!-- End HeaderItem Content -->

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