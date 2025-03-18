<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kenswed TVTC</title>
    <!-- Include head -->
    @include('layouts.head')
    <style>
        /* Background Styling */
        body {
            background-image: url('assets/img/background.jpg');
            /* Update to match the About section */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: 'Poppins', sans-serif;
            color: #5a3e36;
        }

        .bg-faded {
            background-color: rgba(255, 248, 220, 0.95);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <!-- Include header -->
    @include('layouts.header')

    <section class="page-section about-heading">
        <div class="container">
            <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="assets/img/background.jpg" alt="About Us" />
            <div class="about-heading-content">
                <div class="row">
                    <div class="col-xl-9 col-lg-10 mx-auto">
                        <div class="bg-faded rounded p-5">
                            <h2 class="section-heading mb-4">
                                <span class="section-heading-upper">Strong Coffee, Strong Roots</span>
                                <span class="section-heading-lower">About Our Cafe</span>
                            </h2>
                            <p>Founded in 1987 by the Hernandez brothers, our establishment has been serving up rich
                                coffee sourced from artisan farmers in various regions of South and Central America. We
                                are dedicated to travelling the world, finding the best coffee, and bringing it back to
                                you here in our cafe.</p>
                            <p class="mb-0">
                                We guarantee that you will fall in
                                <em>lust</em>
                                with our decadent blends the moment you walk inside until you finish your last sip. Join
                                us for your daily routine, an outing with friends, or simply just to enjoy some alone
                                time.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Section -->
    <section class="page-section video-section text-center">
        <div class="container">
            <h2 class="section-heading mb-4">Experience Our Cafe</h2>
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <div class="embed-responsive embed-responsive-16by9">
                        <video class="embed-responsive-item" controls>
                            <source src="assets/videos/cafe-tour.mp4" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Include footer -->
    @include('layouts.footer')

    <!-- Include scripts -->
    @include('layouts.scripts')

</body>

</html>
