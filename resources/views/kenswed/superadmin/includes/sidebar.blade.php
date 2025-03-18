<!-- this is sidebar for superadmin -->

<!-- sidebar -->

<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link" href="{{ route('admin') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Interface</div>
                <!-- Staff Management -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseStaff"
                    aria-expanded="false" aria-controls="collapseStaff">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                    Staff
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseStaff" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('staff.create') }}">Add Staff</a>
                        <a class="nav-link" href="{{ route('staff.manage') }}">Manage Staff</a>
                    </nav>
                </div>

                <!-- Student Management -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseStudent"
                    aria-expanded="false" aria-controls="collapseStudent">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>
                    Students
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseStudent" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('add.student') }}">Add Student</a>
                        <a class="nav-link" href="{{ route('student.manage') }}">Manage Students</a>
                        <a class="nav-link" href="#">New Admission</a>
                        <a class="nav-link" href="#">Enroled Students</a>
                        <a class="nav-link" href="#">Graduates</a>
                    </nav>
                </div>

                <!-- Alumni Management -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseAlumni"
                    aria-expanded="false" aria-controls="collapseAlumni">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>
                    Alumni
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseAlumni" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="#">Add Alumni</a>
                        <a class="nav-link" href="{{ route('admin.users') }}">Manage Alumni</a>
                    </nav>
                </div>

                <!-- Department Management -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                    data-bs-target="#collapseDepartments" aria-expanded="false" aria-controls="collapseDepartments">
                    <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                    Departments
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseDepartments" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('departments.create') }}">
                            Add Department
                        </a>
                        <a class="nav-link" href="{{ route('departments.manage') }}">
                            Manage Department
                        </a>
                    </nav>
                </div>

                <!-- Course Management -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCourses"
                    aria-expanded="false" aria-controls="collapseCourses">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Courses
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseCourses" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('courses.create') }}">
                            Add Course
                        </a>
                        <a class="nav-link" href="{{ route('courses.manage') }}">
                            Manage Course
                        </a>

                        <!-- Sub Course Dropdown -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseSubCourses" aria-expanded="false"
                            aria-controls="collapseSubCourses">
                            <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                            Sub Courses
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseSubCourses">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('subcourses.create') }}">
                                    Add Sub Course
                                </a>
                                <a class="nav-link" href="{{ route('subcourses.manage') }}">
                                    Manage Sub Course
                                </a>
                            </nav>
                        </div>
                    </nav>
                </div>

                <!-- Reports -->
                <a class="nav-link" href="{{ route('admin.reports') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Reports
                </a>
                <div class="sb-sidenav-menu-heading">Addons</div>

                <!-- Pages -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                    data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                        <!-- Authentication -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                            aria-controls="pagesCollapseAuth">
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseAuth" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="#">Login</a>
                                <a class="nav-link" href="#">Register</a>
                                <a class="nav-link" href="#">Forgot Password</a>
                            </nav>
                        </div>

                        <!-- Header Section -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#pagesCollapseHeader" aria-expanded="false"
                            aria-controls="pagesCollapseHeader">
                            Header
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseHeader" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ route('header.create') }}">Add Header</a>
                                <a class="nav-link" href="{{ route('header.manage') }}">Manage Header</a>
                            </nav>
                        </div>

                        <!-- About Section -->
                        <a class="nav-link" href="{{ route('about.create') }}">
                            About
                        </a>

                        <!-- Footer Section -->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#pagesCollapseFooter" aria-expanded="false"
                            aria-controls="pagesCollapseFooter">
                            Footer
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseFooter" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="#">Add Footer</a>
                                <a class="nav-link" href="#">Manage Footer</a>
                            </nav>
                        </div>

                        <!-- Error Pages-->
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#pagesCollapseError" aria-expanded="false"
                            aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="#">404 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div>

                <!-- otherlinks -->
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                    Charts
                </a>
                <a class="nav-link" href="#">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
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
