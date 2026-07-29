@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">

    <div class="card bg-dark text-light shadow-lg border-0" style="width: 420px; border-radius: 16px;">
        <div class="card-body p-4">

            <h3 class="fw-bold mb-4 text-center">
                <i class="bi bi-person-circle me-2"></i> Login
            </h3>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- EMAIL --}}
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email"
                           class="form-control bg-secondary text-light border-0 @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required autofocus>

                    @error('email')
                        <span class="invalid-feedback d-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- PASSWORD --}}
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" type="password"
                           class="form-control bg-secondary text-light border-0 @error('password') is-invalid @enderror"
                           name="password" required>

                    @error('password')
                        <span class="invalid-feedback d-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- REMEMBER ME --}}
                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                           {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

                {{-- BUTTONS --}}
                <div class="d-flex justify-content-between align-items-center mt-4">

                    <button type="submit" class="btn btn-primary px-4">
                        {{ __('Login') }}
                    </button>

                    @if (Route::has('password.request'))
                        <a class="text-light" href="{{ route('password.request') }}">
                            {{ __('Forgot Password?') }}
                        </a>
                    @endif

                </div>

            </form>

        </div>
    </div>

</div>
@endsection
