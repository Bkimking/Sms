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

    <!-- Include footer -->
    @include('layouts.footer')

    <!-- Include scripts -->
    @include('layouts.scripts')

</body>

</html>
