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

    <!-- courseshow Section -->
    <section id="courseshow" class="container py-5">
        <h1 class="text mb-4">
            {{ $course->course_name }}
        </h1>

        <div class="row">
            <!-- Left Section (80%) -->
            <div class="col-md-8">
                <img src="{{ Storage::url($course->course_img) }}" width="300" height="300"
                    class="img-fluid mb-4 img-fluid" alt="{{ $course->course_name }}">

                <p>{{ $course->course_description }}</p>

                <!-- Action Buttons -->
                <div class="mt-4">
                    <!-- Dynamic Back to Courses Button -->
                    @if (strtolower($course->category) === 'certificate')
                        <a href="{{ route('certificatecourses') }}" class="btn btn-secondary">Back to Certificate
                            Courses</a>
                    @elseif (strtolower($course->category) === 'diploma')
                        <a href="{{ route('diplomacourses') }}" class="btn btn-secondary">Back to Diploma Courses</a>
                    @else
                        <a href="{{ route('shortcourses') }}" class="btn btn-secondary">Back to Short Courses</a>
                    @endif

                    <!-- Apply for Course -->
                    <a href="{{ route('apply.page', ['type' => 'course', 'id' => $course->id]) }}"
                        class="btn btn-danger">Apply for Course</a>

                </div>
            </div>

            <!-- Right Section (20%) -->
            <div class="col-md-4">
                <!-- Card 1: Other Courses in the Same Category -->
                @if ($otherCourses->count() > 0)
                    <div class="card mb-4">
                        <div class="card-header bg-danger text-white">Other {{ $course->category }} Courses</div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                @foreach ($otherCourses as $otherCourse)
                                    <li>
                                        <a
                                            href="{{ route('course.show', $otherCourse->id) }}">{{ $otherCourse->course_name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <!-- Card 2: Course Categories -->
                <div class="card mb-4">
                    <div class="card-header bg-danger text-white">Course Categories</div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><a href="{{ route('certificatecourses') }}">Certificate Courses</a></li>
                            <!-- COMMENTED DIPLOMA -->
                            <!-- li><a href="{{ route('diplomacourses') }}">Diploma Courses</a></li -->
                            <li><a href="{{ route('shortcourses') }}">Short Courses</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Card 3: Sub-courses under the Course -->
                @if ($subCourses->isNotEmpty())
                    <div class="card mb-4">
                        <div class="card-header bg-danger text-white">
                            Sub-Courses Under {{ $course->course_name }}
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                @foreach ($subCourses as $subCourse)
                                    <li>
                                        <a href="{{ route('subcourses.show', $subCourse->id) }}">
                                            {{ $subCourse->sub_course_name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

            </div>

        </div> <!-- End of Row -->
    </section>

    <!-- Include footer -->
    @include('layouts.footer')

    <!-- Include scripts -->
    @include('layouts.scripts')

</body>

</html>
