<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kenswed TVTC</title>
    <!-- Include head -->
    @include('layouts.head')
    <style>
        .team-section {
            background-color: #f9f9f9;
            padding: 50px 0;
        }

        .team-title {
            text-align: center;
            margin-bottom: 30px;
        }

        .team-title h2 {
            font-size: 36px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .team-title p {
            font-size: 18px;
            color: #555;
        }

        .team-member {
            text-align: center;
            margin-bottom: 30px;
        }

        .team-member img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .team-member h5 {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .team-member p {
            font-size: 16px;
            color: #777;
        }

        .leadership,
        .lecturers {
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <!-- Include header -->
    @include('layouts.header')

    <!-- Team Section -->
    <section id="team" class="team-section">
        <div class="container">
            <!-- Title -->
            <div class="team-title">
                <h2>Meet Our Team</h2>
                <p>Dedicated professionals who are passionate about driving the vision of Kenswed TVTC.</p>
            </div>

            <!-- Leadership Section -->
            <div class="leadership">
                <h3 class="text-center">Leadership Team</h3>
                <div class="row">
                    <div class="col-md-3 team-member">
                        <img src="#" alt="Director" class="img-fluid">
                        <h5>Isaac Macharia</h5>
                        <p>Director</p>
                    </div>
                    <div class="col-md-3 team-member">
                        <img src="{{ asset('imgs/maureen.jpg') }}" alt="General Manager" class="img-fluid">
                        <h5>Maureen</h5>
                        <p>General Manager</p>
                    </div>
                    <div class="col-md-3 team-member">
                        <img src="{{ asset('imgs/lilan.jpg') }}" alt="Principal" class="img-fluid">
                        <h5>Kelvin Lilan</h5>
                        <p>Principal</p>
                    </div>
                    <div class="col-md-3 team-member">
                        <img src="{{ asset('imgs/phiona.jpg') }}" alt="Secretary" class="img-fluid">
                        <h5>Fiona</h5>
                        <p>Admin</p>
                    </div>
                </div>
            </div>

            <!-- Lecturers Section -->
            <div class="lecturers">
                <h3 class="text-center">Our Lecturers</h3>
                <div class="row">
                    <div class="col-md-4 team-member">
                        <img src="{{ asset('imgs/isaac.jpg') }}" alt="Lecturer 1" class="img-fluid">
                        <h5>Isaac Muteru</h5>
                        <p>Computer Programming</p>
                    </div>
                    <div class="col-md-4 team-member">
                        <img src="{{ asset('imgs/eliza.jpg') }}" alt="Lecturer 2" class="img-fluid">
                        <h5>Elizabeth Ndungu</h5>
                        <p> Pastry</p>
                    </div>
                    <div class="col-md-4 team-member">
                        <img src="#" alt="Lecturer 3" class="img-fluid">
                        <h5>Alphonce Okiya</h5>
                        <p> Electrical Engineering</p>
                    </div>
                    <div class="col-md-4 team-member">
                        <img src="{{ asset('imgs/twino.jpg') }}" alt="Lecturer 4" class="img-fluid">
                        <h5>Bernice Kirwa</h5>
                        <p> Communication</p>
                    </div>
                    <div class="col-md-4 team-member">
                        <img src="{{ asset('imgs/eric.jpg') }}" alt="Lecturer 5" class="img-fluid">
                        <h5>Eric Mutuma</h5>
                        <p> ICT</p>
                    </div>
                    <div class="col-md-4 team-member">
                        <img src="{{ asset('imgs/bonareri.jpg') }}" alt="Lecturer 6" class="img-fluid">
                        <h5>Evaline Bonareri</h5>
                        <p>Fashion and Design</p>
                    </div>
                    <div class="col-md-4 team-member">
                        <img src="{{ asset('imgs/emily.jpg') }}" alt="Lecturer 7" class="img-fluid">
                        <h5>Emily Waita</h5>
                        <p>Fashion and Design</p>
                    </div>
                    <div class="col-md-4 team-member">
                        <img src="{{ asset('imgs/beryl.jpg') }}" alt="Lecturer 8" class="img-fluid">
                        <h5>Beryl Owiti</h5>
                        <p>Beauty and Therapy</p>
                    </div>
                    <div class="col-md-4 team-member">
                        <img src="#" alt="Lecturer 9" class="img-fluid">
                        <h5>Bilha</h5>
                        <p>Entrepreneurship</p>
                    </div>
                    <div class="col-md-4 team-member">
                        <img src="{{ asset('imgs/jacinta.jpg') }}" alt="Lecturer 10" class="img-fluid">
                        <h5>Jacinta Khamala</h5>
                        <p>Beauty and Therapy</p>
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