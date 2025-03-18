<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Header Item</title>

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

            <!-- Edit HeaderItem Content -->
            <main class="container-fluid px-4">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn btn-link text-decoration-none text-dark p-0 ms-3" data-bs-dismiss="alert" aria-label="Close">
                        x
                    </button>
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn btn-link text-decoration-none text-dark p-0 ms-3" data-bs-dismiss="alert" aria-label="Close">
                        x
                    </button>
                </div>
                @endif

                <h1 class="mt-4">Edit Header Item</h1>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Header Item</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-body">
                        This is the Edit Header Item page. If you encounter any problems, please contact the developers.
                        <a href="#mailto:developers@example.com">Contact Developers</a>.
                    </div>
                </div>

                <!-- Edit Form -->
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-edit me-1"></i>
                        Update Header Item
                    </div>
                    <div class="card-body">
                        <form action="{{ route('header.update', $headerItem->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="headertitle" class="form-label">Title</label>
                                <input type="text" name="headertitle" id="headertitle" class="form-control" value="{{ old('headertitle', $headerItem->headertitle) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="headersubtitle" class="form-label">Subtitle</label>
                                <input type="text" name="headersubtitle" id="headersubtitle" class="form-control" value="{{ old('headersubtitle', $headerItem->headersubtitle) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="headerparagraph" class="form-label">Content</label>
                                <textarea name="headerparagraph" id="headerparagraph" class="form-control" rows="4" required>{{ old('headerparagraph', $headerItem->headerparagraph) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="headerimg" class="form-label">Image</label>
                                <input type="file" name="headerimg" id="headerimg" class="form-control">
                                @if($headerItem->headerimg)
                                <div class="mt-2">
                                    <img src="{{ Storage::url($headerItem->headerimg) }}" alt="Current Image" style="width: 150px; height: auto;">
                                    <p class="text-muted">Current Image</p>
                                </div>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Save Changes
                            </button>
                            <a href="{{ route('header.manage') }}" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Back
                            </a>
                        </form>
                    </div>
                </div>
            </main>
            <!-- End Edit HeaderItem Content -->

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