<!-- this is sidebar for student -->

<!-- sidebar -->

<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('student.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <div class="sb-sidenav-menu-heading">Academics</div>

                <!-- Enrolled Courses -->
                <a class="nav-link" href="{{ route('student.courses') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    My Courses
                </a>

                <!-- Assignments -->
                <a class="nav-link" href="{{ route('student.assignments') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
                    Assignments
                </a>

                <!-- Exams -->
                <a class="nav-link" href="{{ route('student.exams') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-file-alt"></i></div>
                    Exams
                </a>

                <!-- Results -->
                <a class="nav-link" href="{{ route('student.results') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-line"></i></div>
                    Results & Reports
                </a>

                <div class="sb-sidenav-menu-heading">Account</div>

                <!-- Profile -->
                <a class="nav-link" href="{{ route('student.profile') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    Profile
                </a>

                <!-- Logout -->
                <a class="nav-link" href="{{ route('logout') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                    Logout
                </a>
            </div>
        </div>

        <!-- Footer -->
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ Auth::user()->name }}
        </div>
    </nav>
</div>

