@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="d-flex justify-content-center align-items-center" style="min-height: 70vh;">

    <div class="card bg-dark text-light shadow-lg border-0" style="width: 450px; border-radius: 16px;">
        <div class="card-body p-4">

            <h3 class="fw-bold mb-4 text-center">
                <i class="bi bi-person-plus-fill me-2"></i> Crea un Account
            </h3>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- NAME --}}
                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Name') }}</label>
                    <input id="name" type="text"
                           class="form-control bg-secondary text-light border-0 @error('name') is-invalid @enderror"
                           name="name" value="{{ old('name') }}" required autofocus>

                    @error('name')
                        <span class="invalid-feedback d-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- EMAIL --}}
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                    <input id="email" type="email"
                           class="form-control bg-secondary text-light border-0 @error('email') is-invalid @enderror"
                           name="email" value="{{ old('email') }}" required>

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

                {{-- CONFIRM PASSWORD --}}
                <div class="mb-3">
                    <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                    <input id="password-confirm" type="password"
                           class="form-control bg-secondary text-light border-0"
                           name="password_confirmation" required>
                </div>

                {{-- BUTTON --}}
                <div class="d-flex justify-content-between align-items-center mt-4">
                    <button type="submit" class="btn btn-primary px-4">
                        {{ __('Register') }}
                    </button>

                    <a href="{{ route('login') }}" class="text-light">
                        Hai già un account?
                    </a>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
