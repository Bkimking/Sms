<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin Dashboard - Edit About Feature</title>

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

            <!-- Edit About Feature Content -->
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

                <h1 class="mt-4">Edit About Page</h1>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit About page</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-body">
                        You are in Edit About page. If you encounter any problems, please contact the developers.
                        <a href="#mailto:developers@example.com">Contact Developers</a>.
                    </div>
                </div>

                <!-- Form for Editing About Feature -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-edit"></i> Edit About Feature
                    </div>
                    <div class="card-body">
                        <form action="{{ route('about.update', $aboutItem->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="abouttitle" class="form-label">Title</label>
                                <input type="text" name="abouttitle" id="abouttitle" class="form-control"
                                    value="{{ $aboutItem->abouttitle }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="aboutsubtitle" class="form-label">Subtitle</label>
                                <input type="text" name="aboutsubtitle" id="aboutsubtitle" class="form-control"
                                    value="{{ $aboutItem->aboutsubtitle }}">
                            </div>

                            <div class="mb-3">
                                <label for="aboutparagraph" class="form-label">Description</label>
                                <textarea name="aboutparagraph" id="aboutparagraph" class="form-control" required>{{ $aboutItem->aboutparagraph }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="aboutimg" class="form-label">Image</label>
                                <input type="file" name="aboutimg" id="aboutimg" class="form-control">
                                <div class="mt-2">
                                    <img src="{{ Storage::url($aboutItem->aboutimg) }}" alt="Current Image"
                                        style="width: 150px; height: auto;">
                                    <p class="text-muted">Current Image</p>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update Feature</button>
                        </form>
                    </div>
                </div>
            </main>
            <!-- End Edit About Feature Content -->

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
