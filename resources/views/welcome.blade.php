<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kenswed TVTC</title>
    <!-- Include head -->
    @include('layouts.head')
</head>

<body>
    <!-- Include header -->
    @include('layouts.header')

    <!-- Hero Section -->
    <section>
        <div id="heroCarousel" class="carousel slide vh-80" data-bs-ride="carousel">
            <div class="carousel-inner vh-90">
                <!-- Slides for Courses -->
                @foreach ($courses as $course)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }} vh-80">
                        <div class="d-flex justify-content-center align-items-center vh-80 text-white text-center hero-bg"
                            style="background-image: url('{{ asset('storage/' . $course->course_img) }}');">
                            <div class="hero-content">
                                <h1 class="display-4 fw-bold">{{ $course->course_name }}</h1>
                                <p class="lead">{{ Str::limit($course->course_description, 150) }}</p>
                                <a href="{{ route('course.show', $course->id) }}" class="btn btn-danger btn-glow">Learn
                                    More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- New Intake Section -->
    <section id="new-intake" class="text-center py-5">
        <div class="container">
            <h2 class="mb-4">January 2025 Intake</h2>
            <ul class="list-unstyled text-muted">
                <li>1. Download & print the application form <a href="#" class="text-danger fw-bold">Click here to
                        download</a></li>
                <li>2. Obtain Application form from the Office of the Academic Register.</li>
                <li>3. Send email to <a href="mailto:admission@KenswedTVTC.ac.ke"
                        class="text-primary">admission@KenswedTVTC.ac.ke</a></li>
                <li>4. Call <a href="tel:+254743208307" class="text-primary">0743208307</a></li>
            </ul>
            <a href="#" class="btn btn-danger btn-lg my-4">ONLINE APPLICATION FOR JANUARY 2025 INTAKE</a>
            <p class="text-muted">
                Placed by KUCCPS? <a href="#" class="text-danger fw-bold">CLICK HERE to download your letter</a>
            </p>
        </div>
    </section>

    <!-- About Section -->
    @if ($aboutItem->count() > 0)
        @foreach ($aboutItem as $abouts)
            <section id="about" class="container py-5">
                <div class="row">
                    <div class="col-lg-6">
                        <h2>{{ $abouts->abouttitle ?? 'Default Title' }}</h2>
                        <h5>{{ $abouts->aboutsubtitle ?? 'Default Subtitle' }}</h5>
                        <p>{{ $abouts->aboutparagraph ?? 'Default paragraph content goes here.' }}</p>
                    </div>
                    <div class="col-lg-6">
                        <img src="{{ asset('storage/' . ($abouts->aboutimg ?? 'imgs/logo.jpg')) }}"
                            alt="About Kenswed img" class="img-fluid">
                    </div>
                </div>
            </section>
        @endforeach
    @else
        <p>No about information available.</p>
    @endif

    <!-- Programs Section -->
    <section id="programs" class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="text-left">Our Programs</h2>
            <div id="programsCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($courses->chunk(2) as $courseChunk)
                        <!-- Display 2 courses per slide -->
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <div class="row justify-content-center">
                                @foreach ($courseChunk as $course)
                                    <div class="col-md-5 mb-4">
                                        <div class="card shadow-sm">
                                            <img src="{{ asset('storage/' . $course->course_img) }}"
                                                class="card-img-top" alt="{{ $course->course_name }}">

                                            <div class="card-body text-center">
                                                <h5 class="card-title">{{ $course->course_name }}</h5>
                                                <p class="card-text">
                                                    {{ Str::limit($course->course_description, 100) }}
                                                </p>
                                                <a href="{{ route('course.show', $course->id) }}"
                                                    class="btn btn-danger">
                                                    Learn More
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Carousel Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#programsCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#programsCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Sponsor Section -->
    <div class="sponsors-section">
        <div class="sponsors-container">
            <img src="{{ asset('imgs/logo.jpg') }}" alt="Sponsor 1" class="sponsor-img">
            <img src="{{ asset('imgs/orgs-img.png') }}" alt="Sponsor 2" class="sponsor-img">
            <img src="{{ asset('imgs/hospital-logo.png') }}" alt="Sponsor 3" class="sponsor-img">
            <img src="{{ asset('imgs/logo.jpg') }}" alt="Sponsor 4" class="sponsor-img">
            <img src="{{ asset('imgs/kgep.jpg') }}" alt="Sponsor 5" class="sponsor-img">

            <!-- Duplicate the images for seamless scrolling -->
            <img src="{{ asset('imgs/logo.jpg') }}" alt="Sponsor 1" class="sponsor-img">
            <img src="{{ asset('imgs/orgs-img.png') }}" alt="Sponsor 2" class="sponsor-img">
            <img src="{{ asset('imgs/hospital-logo.png') }}" alt="Sponsor 3" class="sponsor-img">
            <img src="{{ asset('imgs/logo.jpg') }}" alt="Sponsor 4" class="sponsor-img">
            <img src="{{ asset('imgs/kgep.jpg') }}" alt="Sponsor 5" class="sponsor-img">
        </div>
    </div>

    <!-- Include footer -->
    @include('layouts.footer')

    <!-- Include scripts -->
    @include('layouts.scripts')

</body>

</html>
