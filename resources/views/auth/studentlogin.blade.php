<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kenswed TVTC - Login</title>
    <!-- Include head -->
    @include('layouts.head')
    @vite('resources/css/studloginstyle.css')
</head>

<body>
    <!-- Include header -->
    @include('layouts.header')

        <div class="container mt-5 d-flex justify-content-center align-items-center vh-100">
            <div class="card shadow-lg p-4 d-flex flex-column flex-md-row">
                <!-- Logo / Illustration -->
                <div class="me-md-4 mb-4 mb-md-0 text-center">
                    <img src="{{ asset('imgs/logo.jpg') }}" alt="Student Illustration" class="img-fluid"
                        style="max-width: 300px;">
                </div>

                <div class="flex-fill">
                    <h2 class="text-center mb-4 text-primary">Student Login</h2>

                    <form method="POST" action="{{ route('student.login') }}">
                        @csrf

                        <!-- Admission Number -->
                        <div class="mb-3">
                            <label for="admission_no" class="form-label text-primary">Admission No</label>
                            <input type="text"
                                class="form-control border-primary @error('admission_no') is-invalid @enderror"
                                id="admission_no" name="admission_no" placeholder="Enter Admission No" required
                                value="{{ old('admission_no') }}">
                            @error('admission_no')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3 position-relative">
                            <label for="password" class="form-label text-primary">Password</label>
                            <div class="input-group">
                                <input type="password"
                                    class="form-control border-primary @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="Enter Password" required>
                                <button type="button" class="btn btn-outline-primary" id="togglePassword">
                                    <i class="bi bi-eye"></i>
                                </button>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            <div class="text-end mt-1">
                                @if (Route::has('student.password.request'))
                                    <a href="{{ route('student.password.request') }}"
                                        class="text-decoration-none text-primary">Forgot Password?</a>
                                @endif
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>


    <!-- Include footer -->
    @include('layouts.footer')

    <!-- Include scripts -->
    @include('layouts.scripts')
    <!-- Password Toggle Script -->
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordField = document.getElementById('password');
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="bi bi-eye"></i>' : '<i class="bi bi-eye-slash"></i>';
        });
    </script>

</body>

</html>
