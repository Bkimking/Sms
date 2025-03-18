<!DOCTYPE html>
<html lang="en">
<head>
    <title>View Student Applications</title>

    @include('kenswed.admin.includes.head')

    <style>
        #sub-options-container {
            display: none;
        }
        #sub-options-container.show {
            display: block !important;
        }
    </style>
</head>

<body class="sb-nav-fixed">

    @include('kenswed.admin.includes.navbar')

    <div id="layoutSidenav">

        @include('kenswed.admin.includes.sidebar')

        <div id="layoutSidenav_content">

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

                <h1 class="mt-4">Pending Student Applications</h1>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">View Student Applications</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-body">
                        <p>Below is the list of students who have applied. Approve them to add them to the system.</p>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-user-check"></i> Approve Applications</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Tel</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($applications as $application)
                                <tr>
                                    <td>{{ $application->first_name }} {{ $application->surname }}</td>
                                    <td>{{ $application->email }}</td>
                                    <td>{{ ucfirst($application->gender) }}</td>
                                    <td>{{ $application->tel }}</td>
                                    <td>{{ ucfirst($application->status) }}</td>
                                    <td>
                                        <!-- View Button -->
                                        <a href="{{ route('admin.application.view', $application->id) }}" class="btn btn-primary btn-sm">View</a>

                                        <!-- Approve Button -->
                                        <form action="{{ route('admin.application.approve', $application->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                        </form>

                                        <!-- Reject Button -->
                                        <form action="{{ route('admin.application.reject', $application->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </main>

            @include('kenswed.admin.includes.footer')

        </div>

    </div>

    @include('kenswed.admin.includes.scripts')
</body>
</html>
