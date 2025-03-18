<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kenswed TVTC - Gallery</title>
    @include('layouts.head')
    <style>
        /* gallery section */
        .gallery .box-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(20rem, 1fr));
            gap: 1rem;
        }

        .gallery .box-container .box {
            position: relative;
            border: 0.5rem solid #333;
            border-radius: .5rem;
            height: 20rem;
            cursor: pointer;
            overflow: hidden;
        }

        .gallery .box-container .box img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        }

        .gallery .box-container .box:hover img {
            transform: scale(1.1);
            filter: grayscale();
        }

        .gallery .box-container .box .title {
            position: absolute;
            top: -10rem;
            left: 0;
            right: 0;
            background: #333;
            color: #fff;
            text-align: center;
            padding-bottom: 0.5rem;
            font-size: 1.5rem;
        }

        .gallery .box-container .box:hover .title {
            top: 0;
        }

        .gallery .box-container .box .icons {
            position: absolute;
            bottom: -10rem;
            left: 0;
            right: 0;
            background: #333;
            padding-top: 0.5rem;
            text-align: center;
        }

        .gallery .box-container .box:hover .icons {
            bottom: 0;
        }

        .gallery .box-container .box .icons a {
            font-size: 1.5rem;
            margin: .3rem 0.5rem;
            color: #fff;
        }

        .gallery .box-container .box .icons a:hover {
            color: var(--main-color);
        }

        .heading {
            text-align: center;
            color: red;
            font-size: 2.5rem;
            margin-bottom: 2rem;
        }
    </style>
</head>

<body>

    <!-- Header Section -->
    @include('layouts.header')

    <!-- gallery section starts  -->

    <section class="gallery" id="gallery">

        <h1 class="heading">Our <span>Gallery</span></h1>

        <div class="box-container">

            <div class="box">
                <img src="{{ asset('imgs/_MG_0731.jpg') }}" alt="">
                <h3 class="title">Mr & Mrs Kenswed</h3>
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
            </div>

            <div class="box">
                <img src="{{ asset('imgs/IMG_9414.jpg') }}" alt="">
                <h3 class="title">photos and events</h3>
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
            </div>

            <div class="box">
                <img src="{{ asset('imgs/IMG_6083 (1).jpg') }}" alt="">
                <h3 class="title">photos and events</h3>
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
            </div>

            <div class="box">
                <img src="{{ asset('imgs/IMG_prog1.jpg') }}" alt="">
                <h3 class="title">photos and events</h3>
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
            </div>

            <div class="box">
                <img src="{{ asset('imgs/IMG_pastry1.jpg') }}" alt="">
                <h3 class="title">photos and events</h3>
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
            </div>

            <div class="box">
                <img src="{{ asset('imgs/_MG_0042.JPG') }}" alt="">
                <h3 class="title">Kenswed class reps</h3>
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
            </div>

            <div class="box">
                <img src="{{ asset('imgs/_MG_0136.JPG') }}" alt="">
                <h3 class="title">photos and events</h3>
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
            </div>

            <div class="box">
                <img src="{{ asset('imgs/IMG_4314.jpg') }}" alt="">
                <h3 class="title">photos and events</h3>
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
            </div>

            <div class="box">
                <img src="{{ asset('imgs/_MG_0747.jpg') }}" alt="">
                <h3 class="title">photos and events</h3>
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
            </div>

            <div class="box">
                <img src="{{ asset('imgs/_MG_8650.jpg') }}" alt="">
                <h3 class="title"></h3>
                <div class="icons">
                    <a href="#" class="fas fa-heart"></a>
                    <a href="#" class="fas fa-share"></a>
                    <a href="#" class="fas fa-eye"></a>
                </div>
            </div>

        </div>

    </section>

    <!-- gallery section ends -->

    <!-- Footer Section -->
    @include('layouts.footer')

    <!-- Scripts -->
    @include('layouts.scripts')
</body>

</html>
