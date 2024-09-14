@extends('layouts.app')

@section('title', 'Sign In | Scamber')

@section('content')
    <div class="sign-in__content">
        @if (session('status'))
            <div class="mb-4 text-sm font-medium text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <div class="sign-in__form-block">
            <form method="POST" action="{{ route('login') }}" class="sign-in__form">
                @csrf
                {{--
                <input type="hidden" name="guard" value="web"> --}}
                <h1 class="sign-in__title">
                    Обміняй своє авто за вигідною пропозицією!</h1>
                <div class="sign-in-form__data">
                    <label for="email" class="">{{ __('Email') }}</label>
                    <input id="email" class="" type="email" name="email" value="{{ old('email') }}" required
                        autofocus autocomplete="username">
                    @if ($errors->has('email'))
                        <span class="">{{ $errors->first('email') }}</span>
                    @endif
                </div>

                <div class="sign-in-form__data">
                    <label for="password" class="">{{ __('Password') }}</label>
                    <input id="password" class="" type="password" name="password" required
                        autocomplete="current-password">
                    @if ($errors->has('password'))
                        <span class="">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="sign-in-form__remember-me">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="" name="remember">
                        <span class="">{{ __('Remember me') }}</span>
                    </label>
                </div>

                <div class="sign-in__forgot-password">
                    @if (Route::has('password.request'))
                        <a class="" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif


                </div>
                <button type="submit" class="sign-in__submit">
                    {{ __('Log in') }}
                </button>
            </form>
            <div class="sign-in__image">
                <img src="{{ asset('assets/dashboard/sign-in-bg.jpg') }}" alt="">
            </div>
        </div>

    </div>
@endsection
