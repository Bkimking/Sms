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

    <div class="container">
        <div class="row justify-content-center align-items-center" style="padding: 20px;">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center text-white" style=" background-color:#9B1C31;">
                        <h4>{{ __('Login') }}</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <!-- Email Address -->
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <!-- Remember Me -->
                            <div class="mb-3 form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                            <!-- Submit Button -->
                            <div class="d-grid">
                                <button type="submit" class="btn text-white" style=" background-color:#9B1C31;">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <!-- Forgot Password -->
                            @if (Route::has('password.request'))
                                <div class="mt-3 text-center">
                                    <a class="text-decoration-none" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include footer -->
    @include('layouts.footer')

    <!-- Include scripts -->
    @include('layouts.scripts')
</body>

</html>
