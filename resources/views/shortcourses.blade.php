<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kenswed TVTC - Short Courses</title>
    <!-- Include head -->
    @include('layouts.head')
</head>

<body>
    <!-- Include header -->
    @include('layouts.header')

    <!-- Short Course Section -->
    <section id="shortcourse" class="container py-5">

        <h1 class="text-center mb-4">Short Courses</h1>
        <p class="text-center mb-5">
            Kenswed TVTC offers a variety of short courses designed to equip you with practical skills
            and knowledge in various fields. These courses are ideal for individuals looking to enhance
            their career opportunities or acquire new skills in a short period.
        </p>

        <div class="row">
            @foreach ($courses as $course)
                @if (strtolower($course->category) === 'short course')
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="{{ Storage::url($course->course_img) }}" class="card-img-top img-fluid" alt="{{ $course->course_name }}" width="300" height="300"><!-- Course Image -->
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->course_name }}</h5> <!-- Course Title -->
                                <p class="card-text">{{ $course->course_description }}</p> <!-- Course Description -->
                                <a href="{{ route('course.show', $course->id) }}" class="btn btn-danger">Learn More</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

    </section>

    <!-- Include footer -->
    @include('layouts.footer')

    <!-- Include scripts -->
    @include('layouts.scripts')
</body>

</html>
