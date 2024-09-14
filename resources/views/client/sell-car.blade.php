@extends('layouts.app')

@section('title', 'Продати авто')

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
                    Продати авто
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

            <form method="POST" action="{{ route('client.sell-car.store') }}" enctype="multipart/form-data"
                class="sell-auto-form">
                @csrf

                <div class="dashboard__from-info-group">
                    <div class="dashboard-form-group">
                        <label for="manufacturer_id">Виробник</label>
                        <select name="manufacturer_id" id="manufacturer_id" required>
                            @foreach ($manufacturers as $manufacturer)
                                <option value="{{ $manufacturer->manufacturer_id }}">
                                    {{ $manufacturer->manufacture_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="dashboard-form-group">
                        <label for="model">Модель</label>
                        <input type="text" name="model" id="model" required>
                    </div>
                    <div class="dashboard-form-group">
                        <label for="complete_set">Комплектація</label>
                        <input type="text" name="complete_set" id="complete_set" required>
                    </div>
                </div>
                <div class="dashboard__from-info-group">
                    <div class="dashboard-form-group">
                        <label for="year_of_manufacture">Рік випуску</label>
                        <input type="number" name="year_of_manufacture" id="year_of_manufacture" required min="1954"
                            value="2010" max="2024">
                    </div>
                    <div class="dashboard-form-group">
                        <label for="price">Ціна</label>
                        <input type="number" name="price" id="price" required value="15000">
                    </div>
                </div>
                <div class="dashboard-form-group">
                    <label for="car_mileage">Пробіг</label>
                    <input type="number" name="car_mileage" id="car_mileage" required value="25000">
                </div>

                <div class="dashboard__from-info-group">
                    <div class="dashboard-form-group">
                        <label for="body_type">Тип кузова</label>
                        <select name="body_type" id="body_type" required>
                            <option value="Седан">Седан</option>
                            <option value="Хетчбек">Хетчбек</option>
                            <option value="Універсал">Універсал</option>
                            <option value="Купе">Купе</option>
                            <option value="Кабріолет">Кабріолет</option>
                            <option value="Спорткар">Спорткар</option>
                            <option value="Кросовер">Кросовер</option>
                            <option value="Пікап">Пікап</option>
                            <option value="Мінівен">Мінівен</option>
                            <option value="Мікроавтобус">Мікроавтобус</option>
                            <option value="Лімузин">Лімузин</option>
                            <option value="Фургон">Фургон</option>
                            <option value="Інший">Інший</option>
                        </select>
                    </div>
                    <div class="dashboard-form-group">
                        <label for="engine_type">Тип двигуна</label>
                        <select name="engine_type" id="engine_type" required>
                            <option value="Бензин">Бензин</option>
                            <option value="Дизель">Дизель</option>
                            <option value="Електричний">Електричний</option>
                            <option value="Гібрид">Гібрид</option>
                            <option value="Газ">Газ</option>
                        </select>
                    </div>
                    <div class="dashboard-form-group">
                        <label for="engine_capacity">Об'єм двигуна</label>
                        <input type="number" step="0.1" name="engine_capacity" id="engine_capacity" required>
                    </div>
                    <div class="dashboard-form-group">
                        <label for="fuel_consumption">Витрати палива</label>
                        <input type="number" step="0.1" name="fuel_consumption" id="fuel_consumption" required>
                    </div>
                </div>

                <div class="dashboard__from-info-group">
                    <div class="dashboard-form-group">
                        <label for="drive_type">Тип приводу</label>
                        <input type="text" name="drive_type" id="drive_type" required>
                    </div>
                    <div class="dashboard-form-group">
                        <label for="gearbox_type">Тип коробки передач</label>
                        <input type="text" name="gearbox_type" id="gearbox_type" required>
                    </div>
                </div>
                <div class="dashboard__from-info-group">
                    <div class="dashboard-form-group">
                        <label for="VIN_code">VIN код</label>
                        <input type="text" name="VIN_code" id="VIN_code" required>
                    </div>
                    <div class="dashboard-form-group">
                        <label for="color">Колір</label>
                        <input type="text" name="color" id="color" required>
                    </div>
                </div>
                <div class="dashboard-form-group">
                    <label for="is_accident">Був в ДТП</label>
                    <select name="is_accident" id="is_accident" required>
                        <option value="1">Так</option>
                        <option value="0">Ні</option>
                    </select>
                </div>
                <div class="dashboard-form-group">
                    <label for="photo">Фото</label>
                    <input type="file" name="photo" id="photo" accept="image/*">
                </div>

                <div class="dashboard-form-group">
                    <label for="other_desc">Детальний опис</label>
                    <textarea name="other_desc" id="other_desc"></textarea>
                </div>
                <div class="dashboard-form-group">
                    <button type="submit" class="dashboard__submit-button">Надіслати</button>
                    @error('photo')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </form>
        </div>
    </div>
@endsection
