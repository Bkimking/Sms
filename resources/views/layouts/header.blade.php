<!-- Loading Screen -->
<div id="loading-screen" class="loading-screen">
    <video autoplay muted loop>
        <source src="{{ asset('imgs/loading2.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="loading-content">
        <div class="loading-title-container">
            <span class="loading-title-static">Kenswed</span>
            <span class="loading-title-animated">
                <span class="letter">T</span>
                <span class="letter">V</span>
                <span class="letter">T</span>
                <span class="letter">C</span>
            </span>
        </div>
    </div>
</div>

<header>
    <!-- School Name & Social Media Section (section1) -->
    <div class="top-header d-flex justify-content-between align-items-center p-2"
        style="background-color: #9B1C31; color: white;">
        <div class="logo">
            <!-- School Logo (replace with actual logo image) -->
            <img src="imgs/logo.jpg" style="background-color: #9B1C31;" alt="Kenswed TVTC Logo" height="50">
        </div>
        <div class="social-media">
            <!-- Social Media Icons (use Font Awesome or similar for icons) -->
            <a href="https://www.tiktok.com/@kenswedtechnicalcollege" class="text-white me-3"><i class="fab fa-tiktok"></i></a>
            <a href="#" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
            <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
            <a href="#" class="text-white me-3"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" class="text-white me-3"><i class="fab fa-youtube"></i></a>
        </div>
    </div>

    <!-- School Logo & Email Info Section (Marquee) -->
    <div class="logo-email-section d-flex justify-content-between align-items-center p-3"
        style="background-color: white; color: black;">
        <marquee behavior="scroll" direction="left" style="width: 100%; font-weight: bold;">
            Welcome to Kenswed Technical Vocational Training College - Email us at
            <a href="mailto:training@kenswed.ac.ke" class="text-black">training@kenswed.ac.ke</a>
        </marquee>
    </div>

    <!-- Navigation Bar (section3) -->
    <nav class="navbar navbar-expand-lg navbar-light" id="navbar" style="background-color: #9B1C31;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- Home -->
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="/">Home</a>
                    </li>
                    <!-- About Us Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="aboutDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            About Us
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
                            <li><a class="dropdown-item" href="{{ route('about') }}">About us</a></li>
                            <li><a class="dropdown-item" href="{{ route('history') }}">History</a></li>
                            <li><a class="dropdown-item" href="#">Director's Welcome</a></li>
                            <li><a class="dropdown-item" href="{{ route('mission') }}">Our Mission</a></li>
                            <li><a class="dropdown-item" href="{{ route('team') }}">Our Team</a></li>
                            <li><a class="dropdown-item" href="{{ route('contact') }}">Contacts</a></li>
                        </ul>
                    </li>
                    <!-- Programmes Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="programmesDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Programmes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="programmesDropdown">
                            <!-- COMMENTED DIPLOMA -->
                            <!-- li><a class="dropdown-item" href="{{ route('diplomacourses') }}">Diploma Courses</a></li -->
                            <li><a class="dropdown-item" href="{{ route('certificatecourses') }}">Certificate
                                    Courses</a></li>
                            <li><a class="dropdown-item" href="{{ route('shortcourses') }}">Short Courses</a></li>
                        </ul>
                    </li>
                    <!-- Admissions Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="admissionsDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Admissions
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="admissionsDropdown">
                            <li><a class="dropdown-item" href="#">Admissions</a></li>
                            <li><a class="dropdown-item" href="{{ route('addr') }}">Admission Requirements</a></li>
                            <li><a class="dropdown-item" href="#">Exam Fee Schedule</a></li>
                            <li><a class="dropdown-item" href="#">Payment Details</a></li>
                            <li><a class="dropdown-item" href="#">2024 Graduation</a></li>
                            <li><a class="dropdown-item" href="#">January 2025 Intake</a></li>
                        </ul>
                    </li>
                    <!-- Media Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="mediaDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Media
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="mediaDropdown">
                            <li><a class="dropdown-item" href="{{ route('news') }}">News</a></li>
                            <li><a class="dropdown-item" href="{{ route('gallery') }}">Gallery</a></li>
                            <li><a class="dropdown-item" href="{{ route('vedios') }}">Videos</a></li>
                        </ul>
                    </li>
                    <!-- Library Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="libraryDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Library
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="libraryDropdown">
                            <li><a class="dropdown-item" href="#">Catalog</a></li>
                            <li><a class="dropdown-item" href="#">Digital Library</a></li>
                            <li><a class="dropdown-item" href="#">Library Services</a></li>
                        </ul>
                    </li>
                    <!-- Portals Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="portalsDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Portals
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="portalsDropdown">
                            <li><a class="dropdown-item" href="{{ route('login') }}">Student Portal</a></li>
                            <li><a class="dropdown-item" href="{{ route('login') }}">Staff Portal</a></li>
                            <li><a class="dropdown-item" href="#">Alumni Portal</a></li>
                        </ul>
                    </li>
                    <!-- Hiring Services Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="hiringDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hiring Services
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="hiringDropdown">
                            <li><a class="dropdown-item" href="#">Job Openings</a></li>
                            <li><a class="dropdown-item" href="#">Internship Opportunities</a></li>
                            <li><a class="dropdown-item" href="#">How to Apply</a></li>
                        </ul>
                    </li>
                    <!-- FAQ Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="faqDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            FAQ
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="faqDropdown">
                            <li><a class="dropdown-item" href="#">General Questions</a></li>
                            <li><a class="dropdown-item" href="#">Admissions FAQ</a></li>
                            <li><a class="dropdown-item" href="#">Programmes FAQ</a></li>
                        </ul>
                    </li>
                    <!-- Content Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="contentDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Content
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="contentDropdown">
                            <li><a class="dropdown-item" href="#">Articles</a></li>
                            <li><a class="dropdown-item" href="#">Publications</a></li>
                            <li><a class="dropdown-item" href="#">Blogs</a></li>
                        </ul>
                    </li>
                    <!-- Login / Registration Button and User Details  -->
                    <li class="nav-item dropdown">
                        @guest
                            @if (Route::currentRouteName() === 'login')
                                <a href="{{ route('register') }}" class="nav-link text-white">Register</a>
                            @else
                                <a href="{{ route('login') }}" class="nav-link text-white">Login</a>
                            @endif
                        @else
                            <a class="nav-link dropdown-toggle d-flex align-items-center" id="navbarDropdown"
                                href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <!-- Display Profile Picture if Available -->
                                @if (!empty(Auth::user()->profile_pic))
                                    <img src="{{ Storage::url(Auth::user()->profile_pic) }}" alt="Profile Picture"
                                        style="width: 30px; height: 30px; border-radius: 50%; object-fit: cover; margin-right: 8px;">
                                @else
                                    <i class="fas fa-user-circle fa-lg me-2"></i>
                                @endif
                                {{ Auth::user()->name }}
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @if (!Auth::user()->hasVerifiedEmail())
                                    <!-- Show only Logout if email is not verified -->
                                    <li>
                                        <a class="dropdown-item" href="{{ route('verification.notice') }}">Verify
                                            Email</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                    </li>
                                @else
                                    <!-- Show Dashboard if Email is Verified -->

                                    @if (Auth::user()->role == 1)
                                        <a class="dropdown-item" href="{{ route('admin') }}">Dashboard</a>
                                    @endif
                                    <li>
                                        <hr class="dropdown-divider" />
                                    </li>
                                    <li>
                                        <!-- Logout Link -->
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>
                                    </li>
                                @endif
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        @endguest
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

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

@if (session('warning'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{ session('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
