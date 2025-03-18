<!DOCTYPE html>
<html lang="en">
<head>
    <title>Enrolled Students</title>

    @include('kenswed.admin.includes.head')
</head>

<body class="sb-nav-fixed">

    @include('kenswed.admin.includes.navbar')

    <div id="layoutSidenav">

        @include('kenswed.admin.includes.sidebar')

        <div id="layoutSidenav_content">

            <main class="container-fluid px-4">
                <h1 class="mt-4">Enrolled Students</h1>

                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="{{ route('admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Enrolled Students</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-user-graduate"></i> Enrolled Students List</div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Gender</th>
                                    <th>Tel</th>
                                    <th>Enrollment Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->first_name }} {{ $student->surname }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ ucfirst($student->gender) }}</td>
                                    <td>{{ $student->tel }}</td>
                                    <td>{{ $student->created_at->format('Y-m-d') }}</td>
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
