@extends('layouts.app')

@section('title', 'Особистий кабінет | Scamber')

@section('content')
    <div class="dashboard__content">
        <aside class="dashboard__navbar">
            <ul class="dashboard__menu">
                <div class="navbar__header">
                    <img src="{{ asset('assets/dashboard/profile_image.png') }}" alt="">
                    <p class="navbar-header__client-name">
                        {{ Auth::user()->name }}
                    </p>
                </div>
                <li class="dashboard-menu__item">
                    <a href="{{ route('admin.dashboard') }}" class="dashboard-menu__link">Профіль</a>
                </li>
                <li class="dashboard-menu__item">
                    <a href="{{ route('admin.feedback') }}" class="dashboard-menu__link">Звернення клієнтів</a>
                </li>
            </ul>
            <div class="dashboard__copyright">Copyright by Ihor Felisieiev © 2024</div>
        </aside>
        <div class="dashboard__info-block">
            <div class="dashboard-info__header">
                <h1 class="dashboard__title">
                    Особистий кабінет
                </h1>

                <form method="POST" action="{{ route('logout') }}" class="dashboard__log-out">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.update') }}" method="POST" class="user-info-form">
                @csrf
                @method('PUT')

                <div class="dashboard-form-group">
                    <label for="name">Ім'я та прізвище</label>
                    <div class="dashboard__input-group">
                        <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}"
                            required>
                        <input type="text" id="last_name" name="last_name"
                            value="{{ old('last_name', auth()->user()->last_name) }}" required>
                    </div>
                </div>

                <div class="dashboard__from-info-group">
                    <div class="dashboard-form-group">
                        <label for="phone_number">Телефон</label>
                        <input type="text" id="phone_number" name="phone_number"
                            value="{{ old('phone_number', auth()->user()->phone_number) }}" required>
                    </div>

                    <div class="dashboard-form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email"
                            value="{{ old('email', auth()->user()->email) }}" required>
                    </div>
                </div>
                <div class="dashboard-form-group">
                    <label for="login">Логін</label>
                    <input type="text" id="login" name="login" value="{{ old('login', auth()->user()->login) }}"
                        required>
                </div>

                <div class="dashboard-form-group">
                    <label for="password">Поточний пароль</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="dashboard-form-group">
                    <button type="submit" class="dashboard__submit-button">Зберегти зміни</button>
                </div>
            </form>
        </div>
    </div>
@endsection
