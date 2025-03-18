<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard - Add About Feature</title>

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

            <!-- About Features Content -->
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

                <h1 class="mt-4">Add About Page</h1>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Add About page</li>
                </ol>
                
                <div class="card mb-4">
                    <div class="card-body">
                        You are in new About Page. If you encounter any problems, please contact the developers.
                        <a href="mailto:developers@example.com">Contact Developers</a>.
                    </div>
                </div>

                <!-- Form for Adding About Feature -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-plus-circle"></i> Add About 
                    </div>
                    <div class="card-body">
                        <form action="{{ route('about.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="abouttitle" class="form-label">Title</label>
                                <input type="text" name="abouttitle" id="abouttitle" class="form-control"
                                    placeholder="Enter title here" required>
                            </div>

                            <div class="mb-3">
                                <label for="aboutsubtitle" class="form-label">Subtitle</label>
                                <input type="text" name="aboutsubtitle" id="aboutsubtitle" class="form-control"
                                    placeholder="Enter subtitle here">
                            </div>

                            <div class="mb-3">
                                <label for="aboutparagraph" class="form-label">Description</label>
                                <textarea name="aboutparagraph" id="aboutparagraph" class="form-control" rows="5" 
                                    placeholder="Enter a detailed description" required></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="aboutimg" class="form-label">Image</label>
                                <input type="file" name="aboutimg" id="aboutimg" class="form-control">
                            </div>

                            <button type="submit" class="btn btn-primary">Add Feature</button>
                        </form>
                    </div>
                </div>
            </main>
            <!-- End About Features Content -->

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
