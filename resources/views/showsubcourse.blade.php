<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $subCourse->sub_course_name }} - Kenswed TVTC</title>
    @include('layouts.head')
</head>

<body>
    @include('layouts.header')

    <section id="subcourseshow" class="container py-5">
        <h1 class="text mb-4">{{ $subCourse->sub_course_name }}</h1>

        <div class="row">
            <!-- Left Section (80%) -->
            <div class="col-md-8">
                @if (!empty($subCourse->sub_course_img) && Storage::disk('public')->exists('subcourses/' . $subCourse->sub_course_img))
                    <img src="{{ asset('storage/subcourses/' . $subCourse->sub_course_img) }}" class="img-fluid mb-4"
                        width="300" height="300" alt="{{ $subCourse->sub_course_name }}">
                @endif

                <p>{{ $subCourse->sub_course_description }}</p>

                <div class="mt-4">
                    <a href="{{ route('course.show', $course->id) }}" class="btn btn-secondary">
                        Back to {{ $course->course_name }}
                    </a>
                    <!-- Apply for Subcourse -->
                    <a href="{{ route('apply.page', ['type' => 'subcourse', 'id' => $subCourse->id]) }}" class="btn btn-danger">Apply for Subcourse</a>
                </div>
            </div>

            <!-- Right Section (20%) -->
            <div class="col-md-4">
                <!-- Card: Other Sub-Courses -->
                @if ($otherSubCourses->count() > 0)
                    <div class="card mb-4">
                        <div class="card-header bg-danger text-white">Other Sub-Courses in {{ $course->course_name }}
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled">
                                @foreach ($otherSubCourses as $otherSubCourse)
                                    <li>
                                        <a href="{{ route('subcourses.show', $otherSubCourse->id) }}">
                                            {{ $otherSubCourse->sub_course_name }}
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

    @include('layouts.footer')
    @include('layouts.scripts')
</body>

</html>
