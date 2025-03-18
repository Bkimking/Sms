<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kenswed TVTC</title>
    <!-- Include head -->
    @include('layouts.head')
    <style>
        #mission {
            background-color: #f8f9fa;
            padding: 50px 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        #mission h2 {
            color: #007bff;
            margin-bottom: 20px;
            font-weight: bold;
        }

        #mission p {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #6c757d;
            margin-bottom: 30px;
        }

        #mission .mission-images {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 15px;
        }

        #mission .mission-images img {
            max-width: 300px;
            width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>
    <!-- Include header -->
    @include('layouts.header')

    <!-- Mission Section -->
    <section id="mission" class="container my-5">
        <h2>Our Mission</h2>
        <p>
            At Kenswed TVTC, our mission is to empower individuals with practical and professional skills that prepare
            them for success in their careers and communities. We are dedicated to excellence in training, nurturing
            talent, and fostering innovation in every student. Our goal is to create an environment where every learner
            can thrive, innovate, and contribute positively to society.
        </p>
        <div class="mission-images">
            <img src="imgs/IMG_8551.jpg" alt="Kenswed Campus">
            <img src="imgs/IMG_8559.jpg" alt="Students Engaged in Learning">
            <img src="imgs/_MG_9940.jpg" alt="Hands-On Training Workshop">
        </div>
    </section>

    <!-- Include footer -->
    @include('layouts.footer')

    <!-- Include scripts -->
    @include('layouts.scripts')

</body>

</html>
