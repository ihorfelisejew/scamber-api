@extends('layout')

@section('body-main')
    <section class="catalog__page">
        <div class="catalog-page__container">
            <div class="catalog__links-block">
                <a href="/">Головна</a>
                <svg width="6.001709" height="11.004089" viewBox="0 0 6.00171 11.0041" fill="none"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <path id="Vector" d="M0.5 10.5L5.5 5.5L0.5 0.5" stroke="#000694" stroke-opacity="1.000000"
                        stroke-width="1.000000" stroke-linejoin="round" stroke-linecap="round" />
                </svg>
                <a href="{{ route('catalog') }}">Каталог</a>
                @if ($activeCity !== 'Вся Україна')
                    <svg width="6.001709" height="11.004089" viewBox="0 0 6.00171 11.0041" fill="none"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path id="Vector" d="M0.5 10.5L5.5 5.5L0.5 0.5" stroke="#000694" stroke-opacity="1.000000"
                            stroke-width="1.000000" stroke-linejoin="round" stroke-linecap="round" />
                    </svg>
                    <a
                        href="{{ route('catalog', ['city' => $activeCity, 'manufacturer' => null]) }}">{{ $activeCity }}</a>
                @endif
                @if ($selectedManufacturer)
                    <svg width="6.001709" height="11.004089" viewBox="0 0 6.00171 11.0041" fill="none"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <path id="Vector" d="M0.5 10.5L5.5 5.5L0.5 0.5" stroke="#000694" stroke-opacity="1.000000"
                            stroke-width="1.000000" stroke-linejoin="round" stroke-linecap="round" />
                    </svg>
                    <a
                        href="{{ route('catalog', ['city' => $activeCity, 'manufacturer' => $selectedManufacturer]) }}">{{ $selectedManufacturer }}</a>
                @endif

            </div>
            <div class="catalog-page__header">
                <h2 class="catalog-page__title title">Каталог</h2>
                <div class="catalog-page__filters">
                    <div class="catalog__filter-item">
                        <button class="filter__button" onclick="toggleDropdown('cityDropdown')">
                            {{ $activeCity }}
                            <svg width="15.000000" height="9.000000" viewBox="0 0 15 9" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="catalog__filter-arrow">
                                <path id="Vector 1" d="M0 1.52e-5L7 7L14 1.52e-5" stroke="currentColor"
                                    strokeWidth="2.000000" />
                            </svg>
                        </button>
                        <div id="cityDropdown" class="dropdown-content">
                            <div class="filter__content-block">
                                @if ($activeCity !== 'Вся Україна')
                                    <a
                                        href="{{ route('catalog', ['city' => 'Вся Україна', 'manufacturer' => request('manufacturer')]) }}">
                                        Вся Україна
                                    </a>
                                @endif
                                @foreach ($uniqueCities as $city)
                                    @if ($city !== $activeCity)
                                        <a
                                            href="{{ route('catalog', ['city' => $city, 'manufacturer' => request('manufacturer')]) }}">{{ $city }}</a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="catalog__filter-item">
                        <button class="filter__button" onclick="toggleDropdown('manufacturerDropdown')">
                            {{ $selectedManufacturer ?? 'Вибрати виробника' }}
                            <svg width="15.000000" height="9.000000" viewBox="0 0 15 9" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="catalog__filter-arrow">
                                <path id="Vector 1" d="M0 1.52e-5L7 7L14 1.52e-5" stroke="currentColor"
                                    strokeWidth="2.000000" />
                            </svg>
                        </button>
                        <div id="manufacturerDropdown" class="dropdown-content">
                            <div class="filter__content-block">
                                @if ($selectedManufacturer)
                                    <a href="{{ route('catalog', ['city' => $activeCity]) }}">Всі виробники</a>
                                    @foreach ($manufacturers as $manufacturer)
                                        @if ($manufacturer->manufacture_name !== $selectedManufacturer)
                                            <a
                                                href="{{ route('catalog', ['city' => $activeCity, 'manufacturer' => $manufacturer->manufacture_name]) }}">{{ $manufacturer->manufacture_name }}</a>
                                        @endif
                                    @endforeach
                                @else
                                    @foreach ($manufacturers as $manufacturer)
                                        @if ($manufacturer->manufacture_name !== $selectedManufacturer)
                                            <a
                                                href="{{ route('catalog', ['city' => $activeCity, 'manufacturer' => $manufacturer->manufacture_name]) }}">{{ $manufacturer->manufacture_name }}</a>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="catalog-page__list">
                @if ($cars->isEmpty())
                    <p class="catalog-page__empty">За даними фільтрами автомобілів не знайдено</p>
                @else
                    @foreach ($cars as $car)
                        @include('car-item', ['car' => $car])
                    @endforeach
                @endif
            </div>
            <div class="catalog-pagination">
                {{ $cars->links() }}
            </div>
        </div>
    </section>

    <script>
        function toggleDropdown(id) {
            var dropdown = document.getElementById(id);
            dropdown.classList.toggle('active');

            document.addEventListener('click', function(event) {
                var isClickInside = dropdown.contains(event.target);
                var dropdownButton = document.querySelector('[onclick="toggleDropdown(\'' + id + '\')"]');
                var isClickOnButton = dropdownButton.contains(event.target);

                if (!isClickInside && !isClickOnButton) {
                    dropdown.classList.remove('active');
                }
            });
        }
    </script>
@endsection
