@extends('layout')

@section('body-main')
    <div class="car-details__page">
        <div class="car-details__container">
            <div class="catalog__links-block">
                <a href="/">Головна</a>
                <svg width="6.001709" height="11.004089" viewBox="0 0 6.00171 11.0041" fill="none"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <path id="Vector" d="M0.5 10.5L5.5 5.5L0.5 0.5" stroke="#000694" stroke-opacity="1.000000"
                        stroke-width="1.000000" stroke-linejoin="round" stroke-linecap="round" />
                </svg>
                <a href="{{ route('catalog') }}">Каталог</a>
                <svg width="6.001709" height="11.004089" viewBox="0 0 6.00171 11.0041" fill="none"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <path id="Vector" d="M0.5 10.5L5.5 5.5L0.5 0.5" stroke="#000694" stroke-opacity="1.000000"
                        stroke-width="1.000000" stroke-linejoin="round" stroke-linecap="round" />
                </svg>
                <a href="{{ route('find-car', ['car_id' => $car->car_id]) }}">
                    {{ $car->manufacturer->manufacture_name }}
                    {{ $car->model }}
                </a>
            </div>
            <h1 class="car-details__car-name title">
                {{ $car->manufacturer->manufacture_name }}
                {{ $car->model }}
                {{ $car->year_of_manufacture }}
            </h1>
            <div class="car-details__content">
                <div class="car-details__photo-block">
                    <img src="{{ asset('cars/' . $car->photo_url) }}"
                        alt="{{ $car->manufacturer->manufacture_name }} {{ $car->model }}">
                </div>
                <div class="car-details__info-block">
                    <div class="car-details__info-list">
                        <div class="car-details__info-item">
                            <p class="car-details__info-title">Пробіг</p>
                            <p class="car-details__info-text">{{ $car->car_mileage }}</p>
                        </div>
                        <div class="car-details__info-item">
                            <p class="car-details__info-title">Коробка передач</p>
                            <p class="car-details__info-text">{{ $car->gearbox_type }}</p>
                        </div>
                        <div class="car-details__info-item">
                            <p class="car-details__info-title">Двигун</p>
                            <p class="car-details__info-text">{{ $car->engine_type }}, {{ $car->engine_capacity }} л.</p>
                        </div>
                        <div class="car-details__info-item">
                            <p class="car-details__info-title">Тип кузова</p>
                            <p class="car-details__info-text">{{ $car->body_type }}</p>
                        </div>
                        <div class="car-details__info-item">
                            <p class="car-details__info-title">Привід</p>
                            <p class="car-details__info-text">{{ $car->drive_type }}</p>
                        </div>
                        <div class="car-details__info-item">
                            <p class="car-details__info-title">Середні витрати пального</p>
                            <p class="car-details__info-text">{{ $car->fuel_consumption }} л.</p>
                        </div>
                    </div>
                    <button class="car-details__test-drive" onclick="openModal('test-drive__form')">Записатися на
                        тест-драйв
                    </button>
                </div>
                <div class="car-details__order-block">
                    <div class="car-details__credit-block">
                        <div class="car-details__price-block">
                            <div class="car-details__price-icon">
                                <svg width="24.500000" height="27.000000" viewBox="0 0 24.5 27" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <path id="Vector"
                                        d="M1 22.25C1 24.32 6 26 12.25 26C18.5 26 23.5 24.32 23.5 22.25L23.5 4.75C23.5 2.67 18.46 1 12.25 1C6.03 1 1 2.67 1 4.75L1 22.25ZM23.5 4.75C23.5 6.82 18.46 8.5 12.25 8.5C6.03 8.5 1 6.82 1 4.75M23.5 13.5C23.5 15.57 18.5 17.25 12.25 17.25C6 17.25 1 15.57 1 13.5"
                                        stroke="#0B0B0B" stroke-opacity="1.000000" stroke-width="2.000000"
                                        stroke-linejoin="round" stroke-linecap="round" />
                                </svg>

                            </div>
                            <div class="car-details__price">
                                <p class="car-details__price-text">
                                    {{ number_format($car->price / 12, 0, ',', ' ') }} $/міс.
                                </p>
                                <p class="car-details__price-uah">
                                    {{ number_format(($car->price / 12) * 40, 0, ',', ' ') }} грн.
                                </p>
                            </div>
                        </div>
                        <button class="car-details__order-button"
                            onclick="openModal('calc-credit__form')">Розрахувати</button>
                    </div>
                    <div class="car-details__buy-block">
                        <div class="car-details__price-block">
                            <div class="car-details__price-icon">
                                <svg width="27.000000" height="27.000000" viewBox="0 0 27 27" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <path id="Vector"
                                        d="M13.5 26C6.59 26 1 20.4 1 13.5C1 6.59 6.59 1 13.5 1C20.4 1 26 6.59 26 13.5C26 20.4 20.4 26 13.5 26ZM13.5 18.5L18.5 13.5L13.5 8.5M18.5 13.5L8.5 13.5"
                                        stroke="#0B0B0B" stroke-opacity="1.000000" stroke-width="2.000000"
                                        stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="car-details__price">
                                <p class="car-details__price-title">
                                    Ціна авто
                                </p>
                                <p class="car-details__price-text">
                                    {{ number_format($car->price, 0, ',', ' ') }} $
                                </p>
                                <p class="car-details__price-uah">
                                    {{ number_format($car->price * 40, 0, ',', ' ') }} грн.
                                </p>
                            </div>
                        </div>
                        <button class="car-details__order-button" onclick="openModal('car-order__form')">Придбати</button>
                    </div>
                </div>
            </div>
            <div class="car-details__desctiption">
                <h1 class="car-details__desc-title title">Опис</h1>
                <h2 class="car-details__desc-car-name">
                    {{ $car->manufacturer->manufacture_name }}
                    {{ $car->model }}
                </h2>
                <div class="car-details__desc-list">
                    <div class="car-details__desc-item">
                        <p class="car-details__desc-name">
                            Рік випуску:
                        </p>
                        <p class="car-details__desc-value">{{ $car->year_of_manufacture }}</p>
                    </div>
                    <div class="car-details__desc-item">
                        <p class="car-details__desc-name">
                            Комплектація:
                        </p>
                        <p class="car-details__desc-value">{{ $car->complete_set }}</p>
                    </div>
                    <div class="car-details__desc-item">
                        <p class="car-details__desc-name">
                            Тип кузова:
                        </p>
                        <p class="car-details__desc-value">{{ $car->body_type }}</p>
                    </div>
                    <div class="car-details__desc-item">
                        <p class="car-details__desc-name">
                            Колір:
                        </p>
                        <p class="car-details__desc-value">{{ $car->color }}</p>
                    </div>
                    <div class="car-details__desc-item">
                        <p class="car-details__desc-name">
                            Пробіг авто:
                        </p>
                        <p class="car-details__desc-value">{{ $car->car_mileage / 1000 }} тис. км.</p>
                    </div>
                    <div class="car-details__desc-item">
                        <p class="car-details__desc-name">
                            Тип коробки передач:
                        </p>
                        <p class="car-details__desc-value">{{ $car->gearbox_type }}</p>
                    </div>
                    <div class="car-details__desc-item">
                        <p class="car-details__desc-name">
                            Тип двигуна:
                        </p>
                        <p class="car-details__desc-value">{{ $car->engine_type }}, {{ $car->engine_capacity }} л.</p>
                    </div>
                    <div class="car-details__desc-item">
                        <p class="car-details__desc-name">
                            Середні витрати пального:
                        </p>
                        <p class="car-details__desc-value">{{ $car->fuel_consumption }} л. / 100км.</p>
                    </div>
                    <div class="car-details__desc-item">
                        <p class="car-details__desc-name">
                            Тип приводу:
                        </p>
                        <p class="car-details__desc-value">{{ $car->drive_type }}</p>
                    </div>
                    <div class="car-details__desc-item">
                        <p class="car-details__desc-name">
                            VIN-код:
                        </p>
                        <p class="car-details__desc-value">{{ $car->VIN_code }}</p>
                    </div>

                </div>
                <div class="car-details__desc-other">
                    <p class="car-details__desc-name">
                        Інша інформація:
                    </p>
                    <p class="car-details__desc-value">{{ $car->other_desc }}</p>
                </div>
            </div>
        </div>
    </div>
    @extends('modal')
@endsection

@section('modal-content')
    @if (session('success'))
        <script>
            setTimeout(function() {
                alert(
                    "Ваша заявка успішно відправлена! Незабаром з вами зв'яжеться менеджер автосалону для уточнення деталей"
                );
            }, 100);
        </script>
    @endif
    <form method="POST" action="{{ route('test-drive-store') }}" class="modal-content test-drive__form">
        @csrf
        <input type="hidden" name="car_id" value="{{ $car->car_id }}">
        <p class="modal__title">
            Записатись на тест-драйв
        </p>
        <div class="modal__inputs">
            <input type="text" id="client_name" name="client_name" required placeholder="Ваше ім'я">
            <input type="text" id="phone_number" name="phone_number" required placeholder="Ваш номер телефону">
        </div>
        <div class="date-of-event-block">
            <div class="modal__date-time-inputs">
                <label for="date_of_event">Дата</label>
                <input type="date" id="date_of_event" name="date_of_event" required
                    value="{{ old('date_of_event', \Carbon\Carbon::now('Europe/Kiev')->toDateString()) }}">
            </div>
            <div class="modal__date-time-inputs">
                <label for="time_of_event">Час</label>
                <input type="time" id="time_of_event" name="time_of_event" required
                    value="{{ old('time_of_event', \Carbon\Carbon::now('Europe/Kiev')->format('H:i')) }}">
            </div>
        </div>

        <button type="submit" class="modal__submit-button">Записатися</button>
    </form>
    <form method="POST" action="{{ route('car-order-store') }}" class="modal-content car-order__form">
        @csrf
        <input type="hidden" name="car_id" value="{{ $car->car_id }}">
        <p class="modal__title">
            Відправити заявку на купівлю авто
        </p>
        <div class="modal__inputs">
            <input type="text" id="client_name" name="client_name" required placeholder="Ваше ім'я">
            <input type="text" id="phone_number" name="phone_number" required placeholder="Ваш номер телефону">
        </div>
        <div class="date-of-event-block">
            <div class="modal__date-time-inputs">
                <label for="date_of_event">Дата</label>
                <input type="date" id="date_of_event" name="date_of_event" required
                    value="{{ old('date_of_event', \Carbon\Carbon::now('Europe/Kiev')->toDateString()) }}">
            </div>
            <div class="modal__date-time-inputs">
                <label for="time_of_event">Час</label>
                <input type="time" id="time_of_event" name="time_of_event" required
                    value="{{ old('time_of_event', \Carbon\Carbon::now('Europe/Kiev')->format('H:i')) }}">
            </div>
        </div>

        <button type="submit" class="modal__submit-button">Купити авто</button>
    </form>
    <form class="modal-content calc-credit__form">
        <p class="modal__title">
            Розрахувати вартість оплати на місяць
        </p>
        <div class="calc-credit__month-block modal__date-time-inputs">
            <label for="calc-credit__month">Кількість місяців</label>
            <select name="calc-credit__month" id="calc-credit__month"
                onchange="calcCreditPrice(this, {{ $car->price }})">
                <option value="6">6</option>
                <option value="9">9</option>
                <option value="12" selected>12</option>
                <option value="24">24</option>
            </select>
        </div>
        <div class="calc-credit__price-block">
            <p class="calc-credit__price">{{ number_format($car->price / 12, 0, ',', ' ') }} $</p>
            <p class="calc-credit__price calc-credit__price-uah">{{ number_format(($car->price / 12) * 40, 0, ',', ' ') }}
                грн.</p>
        </div>

    </form>
@endsection
