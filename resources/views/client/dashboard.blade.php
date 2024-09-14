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
                    <a href="{{ route('client.dashboard') }}" class="dashboard-menu__link">Профіль</a>
                </li>
                <li class="dashboard-menu__item">
                    <a href="{{ route('client.sell-car') }}" class="dashboard-menu__link">Продати авто</a>
                </li>
                <li class="dashboard-menu__item">
                    <a href="{{ route('client.dashboard') }}" class="dashboard-menu__link">Історія звернень</a>
                </li>
                <li class="dashboard-menu__item">
                    <a href="{{ route('client.dashboard') }}" class="dashboard-menu__link">Історія договорів</a>
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

            <form action="{{ route('client.update') }}" method="POST" class="user-info-form">
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
                    <label for="date_of_birth">Дата народження</label>
                    <input type="date" id="date_of_birth" name="date_of_birth"
                        value="{{ old('date_of_birth', auth()->user()->date_of_birth ? \Carbon\Carbon::parse(auth()->user()->date_of_birth)->format('Y-m-d') : '') }}">
                </div>
                <div class="dashboard__from-info-group">
                    <div class="dashboard-form-group">
                        <label for="passport_number">Номер паспорту</label>
                        <input type="text" id="passport_number" name="passport_number"
                            value="{{ old('passport_number', auth()->user()->passport_number) }}">
                    </div>

                    <div class="dashboard-form-group">
                        <label for="date_of_issue">Дата видачі</label>
                        <input type="date" id="date_of_issue" name="date_of_issue"
                            value="{{ old('date_of_issue', auth()->user()->date_of_issue ? \Carbon\Carbon::parse(auth()->user()->date_of_issue)->format('Y-m-d') : '') }}">
                    </div>
                </div>


                <div class="dashboard-form-group">
                    <label for="identification_code">Ідентифікаційний код</label>
                    <input type="text" id="identification_code" name="identification_code"
                        value="{{ old('identification_code', auth()->user()->identification_code) }}">
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
