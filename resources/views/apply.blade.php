<!DOCTYPE html>
<html lang="en">

<head>
    <title>Apply for {{ $selected->course_name ?? $selected->sub_course_name }} - Kenswed TVTC</title>
    @include('layouts.head')
</head>

<body>
    @include('layouts.header')

    <section id="apply" class="container py-5" >
        <h1 class="text-center mb-4">Apply for {{ $selected->course_name ?? $selected->sub_course_name }}</h1>
        <div class="card shadow p-4" style="background-image: linear-gradient(to right, #9b1c31, #dc3545); padding: 50px; color: white; border-radius: 8px;">
            <form action="{{ route('apply.submit') }}" method="POST">
                @csrf
                <input type="hidden" name="selected_id" value="{{ $selected->id }}">
                <input type="hidden" name="type" value="{{ $type }}"> <!-- 'course' or 'subcourse' -->

                 <!-- Student Details -->
                 <fieldset class="mb-4" >
                    <legend>Student Details</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Surname -->
                            <div class="mb-3">
                                <label for="surname" class="form-label">Surname</label>
                                <input type="text" class="form-control" id="surname" name="surname"
                                    required>
                                <div class="invalid-feedback">Name must be at least 2 characters.</div>
                            </div>

                            <!-- First Name -->
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first_name"
                                    name="first_name" required>
                                <div class="invalid-feedback">Name must be at least 2 characters.</div>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    required>
                                <div class="invalid-feedback">Enter a valid email address.</div>
                            </div>

                            <!-- Date of Birth -->
                            <div class="mb-3">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="dob"
                                    required>
                                <div class="invalid-feedback">Student must be at least 15 years old.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- Gender -->
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                                <div class="invalid-feedback">Please select a gender.</div>
                            </div>

                            <!-- Telephone -->
                            <div class="mb-3">
                                <label for="tel" class="form-label">Telephone</label>
                                <input type="tel" class="form-control" id="tel" name="tel"
                                    required>
                                <div class="invalid-feedback">Enter a valid Kenyan phone number.</div>
                            </div>

                            <!-- KCPE & KCSE Completion -->
                            <div class="mb-3">
                                <label class="form-label">Academic Completion</label>
                                <div class="form-check">
                                    <input type="checkbox" id="done_kcpe" name="done_kcpe"
                                        onchange="toggleFileInput('kcpe_upload', this)">
                                    <label for="done_kcpe">Completed KCPE?</label>
                                </div>
                                <div id="kcpe_upload" style="display: none;">
                                    <input type="file" class="form-control" id="kcpe_certificate"
                                        name="kcpe_certificate">
                                    <div class="invalid-feedback">Only JPG, PNG, or PDF files are
                                        allowed.</div>
                                </div>

                                <div class="form-check mt-2">
                                    <input type="checkbox" id="done_kcse" name="done_kcse"
                                        onchange="toggleFileInput('kcse_upload', this)">
                                    <label for="done_kcse">Completed KCSE?</label>
                                </div>
                                <div id="kcse_upload" style="display: none;">
                                    <input type="file" class="form-control" id="kcse_certificate"
                                        name="kcse_certificate">
                                    <div class="invalid-feedback">Only JPG, PNG, or PDF files are
                                        allowed.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>

                <hr>

                <!-- Next of Kin Details -->
                <fieldset class="mb-4">
                    <legend>Next of Kin Details</legend>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Full Names -->
                            <div class="mb-3">
                                <label for="kin_name" class="form-label">Full Names</label>
                                <input type="text" class="form-control" id="kin_name"
                                    name="kin_name" required>
                                <div class="invalid-feedback">Name must be at least 2 characters.</div>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                                <label for="kin_email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="kin_email"
                                    name="kin_email" required>
                                <div class="invalid-feedback">Enter a valid email address.</div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <!-- ID Number -->
                            <div class="mb-3">
                                <label for="kin_id" class="form-label">ID Number</label>
                                <input type="text" class="form-control" id="kin_id"
                                    name="kin_id" required>
                                <div class="invalid-feedback">ID must be exactly 8 digits.</div>
                            </div>

                            <!-- Telephone -->
                            <div class="mb-3">
                                <label for="kin_tel" class="form-label">Telephone</label>
                                <input type="tel" class="form-control" id="kin_tel"
                                    name="kin_tel" required>
                                <div class="invalid-feedback">Enter a valid Kenyan phone number.</div>
                            </div>
                        </div>
                    </div>
                </fieldset> 

                <!-- Agreement Checkbox -->
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" name="agreetorules" required>
                    <label class="form-check-label">
                        I confirm that the information provided is true and I agree to the <a
                            href="#">rules and regulations</a>.
                    </label>
                    <div class="invalid-feedback">You must agree to the rules.</div>
                </div>

                <button type="submit" class="btn btn-danger w-30">Submit Application</button>
            </form>
        </div>
    </section>

    @include('layouts.footer')
    @include('layouts.scripts')
</body>

</html>
