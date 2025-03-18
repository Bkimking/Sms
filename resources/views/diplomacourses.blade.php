<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kenswed TVTC - Diploma Courses</title>
    <!-- Include head -->
    @include('layouts.head')
</head>

<body>
    <!-- Include header -->
    @include('layouts.header')

    <!-- Diploma Course Section -->
    <section id="diplomacourse" class="container py-5">

        <h1 class="text-center mb-4">Diploma Courses</h1>
        <p class="text-center mb-5">
            Kenswed TVTC offers a variety of diploma courses designed to provide in-depth knowledge
            and practical skills to help students excel in their careers.
        </p>

        <div class="row">
            @foreach ($courses as $course)
                @if (strtolower($course->category) === 'diploma')
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <img src="{{ Storage::url($course->course_img) }}" class="card-img-top img-fluid"
                                width="300" height="300" alt="{{ $course->course_name }}"> <!-- Course Image -->
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
