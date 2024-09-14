<div class="catalog__item">
    <div class="catalog-item__header">
        <div class="catalog-item__manufacturer">
            <div class="manufacturer-circle circle"></div>
            <p class="manufacturer-name">{{ $car->manufacturer->manufacture_name }}</p>
        </div>
        <div class="catalog-item__body-type">
            <div class="body-type-circle circle"></div>
            <p class="body-type-name">{{ $car->body_type }}</p>
        </div>
    </div>
    <div class="catalog-item__photo">
        <img src="{{ asset('cars/' . $car->photo_url) }}"
            alt="{{ $car->manufacturer->manufacture_name }} {{ $car->model }}">
    </div>
    <h3 class="catalog-item__title">{{ $car->manufacturer->manufacture_name }} {{ $car->model }}
        {{ $car->year_of_manufacture }}</h3>
    <div class="catalog-list__desc">
        <div class="catalog-desc__item">
            <div class="catalog-desc__icon">
                <img src="{{ asset('assets/cars-catalog/car_mileage_icon.png') }}" alt="Car mileage icon">
            </div>
            <p class="catalog-desc__text">{{ $car->car_mileage }} км.</p>
        </div>
        <div class="catalog-desc__item">
            <div class="catalog-desc__icon">
                <img src="{{ asset('assets/cars-catalog/gearbox_type_icon.png') }}" alt="Gearbox type icon">
            </div>
            <p class="catalog-desc__text">{{ $car->gearbox_type }}</p>
        </div>
        <div class="catalog-desc__item">
            <div class="catalog-desc__icon">
                <img src="{{ asset('assets/cars-catalog/engine_type_icon.png') }}" alt="Engine type icon">
            </div>
            <p class="catalog-desc__text">{{ $car->engine_type }}, {{ $car->engine_capacity }} л.</p>
        </div>
        <div class="catalog-desc__item">
            <div class="catalog-desc__icon">
                <img src="{{ asset('assets/cars-catalog/is_accident_icon.png') }}" alt="Accident status icon">
            </div>
            <p class="catalog-desc__text">{{ $car->is_accident }}</p>
        </div>
    </div>
    <div class="catalog-item__footer">
        <p class="catalog-item__price">{{ $car->price }}$</p>
        <a href="{{ route('find-car', ['car_id' => $car->car_id]) }}" class="catalog-item__details">Детальніше</a>
    </div>
</div>
