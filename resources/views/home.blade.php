@extends('layout')

@section('body-main')
    <main class="page__main main">
        <div class="main__container">
            <div class="main__content">
                <div class="main__info">
                    <h1 class="main__title">
                        Твій новий автомобіль за доступною ціною
                    </h1>
                    <p class="main__text">
                        Автосалон, де ти можеш знайти будь-який автомобіль та купити його
                        всього за декілька кліків. Вперед!
                    </p>
                    <a href="{{ route('catalog') }}" class="main__button">Обрати автомобіль</a>
                </div>
                <div class="main__image">
                    <img src="{{ asset('assets/main_car.png') }}" alt="Car" />
                </div>
            </div>
        </div>
        <div class="main__bg">
            <div class="main__bg-content"></div>
        </div>
    </main>
    <section class="main__about">
        <div class="main-about__container">
            <div class="main-about__content">
                <h2 class="main-about__title title">
                    Про мережу автосалонів Scamber
                </h2>
                <p class="main-about__description">
                    Мережа автосалонів <span>Scamber</span> спеціалізується на купівлі
                    та продажу вживаних автомобілів, а також trade-in. Наша команда
                    допоможе Вам підібрати автомобіль вашої мрії та надасть відповідь на
                    всі запитання.
                </p>
                <div class="main-about__statistics">
                    <div class="main-statistic__item">
                        <p class="main-statistic__title">2</p>
                        <div class="main-statistic__text">РОКИ НА РИНКУ</div>
                    </div>
                    <div class="main-statistic__item">
                        <p class="main-statistic__title">250+</p>
                        <div class="main-statistic__text">ПРОДАНИХ АВТОМОБІЛІВ</div>
                    </div>
                </div>
                <p class="main-about__description">
                    Наш досвід у перевірці та продажу авто дає змогу зробити процес
                    підбору безпечним та ефективним. Перед тим як автомобіль попадає в
                    наш автосалон, він проходить перевірку на дефекти та проблеми, щоб
                    ви могли бути впевнені в його надійності. Наші фахівці проведуть
                    детальний технічний огляд авто та нададуть повний звіт про його
                    стан, пробіг та дефекти.
                </p>
                <div class="main-about__why-we">
                    <div class="main-why-we__item">
                        <div class="main-why-we__image">
                            <img src="{{ asset('assets/main/about/about_1.png') }}" alt="about1" />
                        </div>
                        <p class="main-why-we__text">
                            Економимо Ваш час попередніми перевірками авто
                        </p>
                    </div>
                    <div class="main-why-we__item">
                        <div class="main-why-we__image">
                            <img src="{{ asset('assets/main/about/about_2.png') }}" alt="about2" />
                        </div>
                        <p class="main-why-we__text">
                            Велика кількість задоволених клієнтів
                        </p>
                    </div>
                    <div class="main-why-we__item">
                        <div class="main-why-we__image">
                            <img src="{{ asset('assets/main/about/about_3.png') }}" alt="about3" />
                        </div>
                        <p class="main-why-we__text">
                            Надійні умови договору та оформлення гарантії
                        </p>
                    </div>
                    <div class="main-why-we__item">
                        <div class="main-why-we__image">
                            <img src="{{ asset('assets/main/about/about_4.png') }}" alt="about4" />
                        </div>
                        <p class="main-why-we__text">
                            Продаж автомобілів, які успішно пройшли перевірку
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="main__catalog">
        <div class="main-catalog__container">
            <div class="main-catalog__header">
                <h2 class="main-catalog__title title">Каталог</h2>
                <a href="{{ route('catalog') }}" class="main-catalog__more">
                    Всі авто
                    <svg width="6.282776" height="11.288330" viewBox="0 0 6.28278 11.2883" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path id="Vector 4" d="M0.76 10.64L4.97 5.64L0.76 0.64" strokeOpacity="1.000000"
                            strokeWidth="2.000000" />
                    </svg>
                </a>
            </div>
            <div class="main-catalog__list">
                @if ($cars->isEmpty())
                    <p class="main-catalog__empty">В обраному вами місті нажаль поки немає доступних автомобілів</p>
                @else
                    @foreach ($cars as $car)
                        @include('car-item', ['car' => $car])
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <section class="order-form__section">
        <div class="order__container">
            <div class="order__content">
                <h2 class="order__title">Замовлення авто</h2>
                @if (session('success'))
                    <div class="order__success">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="{{ route('save.order') }}" method="POST" class="order__form">
                    @csrf
                    <p class="order-form__error"></p>
                    <div class="order-form__contacts">
                        <input type="text" name="client_name" placeholder="Ім’я" />
                        <input type="text" name="phone_number" placeholder="Номер телефону" />
                        <input type="text" name="client_last_name" placeholder="Прізвище" />
                        <input type="email" name="email" placeholder="Електронна адреса" />
                    </div>
                    <div class="order-form__details">
                        <div class="order-details__left">
                            <div class="car-name__block">
                                <select name="manufacturer_id" id="manufacturer">
                                    <option value="" hidden>
                                        Бренд автомобіля
                                    </option>
                                    @foreach ($manufacturers as $manufacturer)
                                        <option value="{{ $manufacturer->manufacturer_id }}">
                                            {{ $manufacturer->manufacture_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <input type="text" name="car_model" id="car_model" placeholder="Модель автомобіля" />
                            </div>
                            <div class="order__numbers-block">
                                <div class="order__numbers-output">
                                    <p class="numbers-output__title">Бюджет ($)</p>
                                    <input type="number" name="low_price" id="low_price" min="1500" value="1500">
                                    <input type="number" name="high_price" id="high_price" min="500000"
                                        value="500000">
                                </div>
                                <div class="order__numbers-output">
                                    <p class="numbers-output__title">Рік випуску</p>
                                    <input type="number" name="min_year" id="min_year" min="1954" value="1954">
                                    <input type="number" name="max_year" id="max_year" max="2024" value="2024">
                                </div>
                            </div>
                            <input type="submit" value="Замовити авто" class="order__submit" />
                        </div>
                        <div class="order-details__right">
                            <textarea name="order_details" placeholder="Ваші коментарі" id="order__comment"></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </section>
@endsection
