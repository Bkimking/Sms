<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Application Details</title>

    @include('kenswed.admin.includes.head')
</head>

<body class="sb-nav-fixed">

    @include('kenswed.admin.includes.navbar')

    <div id="layoutSidenav">

        @include('kenswed.admin.includes.sidebar')

        <div id="layoutSidenav_content">

            <main class="container-fluid px-4">
                <h1 class="mt-4">Student Application Details</h1>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.applications') }}">Student Applications</a></li>
                    <li class="breadcrumb-item active">Application Details</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-body">
                        <h4>{{ $application->first_name }} {{ $application->surname }}</h4>
                        <p><strong>Email:</strong> {{ $application->email }}</p>
                        <p><strong>Gender:</strong> {{ ucfirst($application->gender) }}</p>
                        <p><strong>Telephone:</strong> {{ $application->tel }}</p>
                        <p><strong>Date of Birth:</strong> {{ $application->dob }}</p>
                        <p><strong>Status:</strong> {{ ucfirst($application->status) }}</p>

                        <div class="mt-3">
                            <a href="{{ route('admin.applications') }}" class="btn btn-secondary">Back</a>
                        </div>
                    </div>
                </div>
            </main>

            @include('kenswed.admin.includes.footer')

        </div>

    </div>

    @include('kenswed.admin.includes.scripts')
</body>
</html>
