<!-- this is navbar for cafeteria -->

<!-- navbar -->

<!-- Loading screen -->
<div id="loading" class="loading-overlay">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden">Loading...</span>
    </div>
</div>

<!-- Navbar -->
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand -->
    <a class="navbar-brand ps-3" href="#">Dashboard</a>

    <!-- Sidebar Toggle -->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </form>

    <!-- Navbar Links -->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
        @else
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" id="navbarDropdown" href="#"
                    role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    @if (!empty(Auth::user()->profile_pic))
                        <img src="{{ Storage::url($profile->profile_pic) }}" alt="Profile Picture"
                            style="width: 30px; height: 30px; border-radius: 50%; object-fit: cover; margin-right: 8px;">
                    @else
                        <i class="fas fa-user-circle fa-lg me-2"></i>
                    @endif
                    {{ Auth::user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <!-- Update Home Link -->
                        <a class="dropdown-item text-primary" href="{{ route('Kenswed') }}">Home</a>

                    <li>
                        <hr class="dropdown-divider" />
                    </li>

                    <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </ul>
        </li>
    @endguest
    </ul>
</nav>

<!-- End navbar-->
