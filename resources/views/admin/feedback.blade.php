@extends('layouts.app')

@section('title', 'Звернення клієнтів | Scamber')

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
                    Звернення клієнтів
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

            <!-- Заявки на тест-драйв -->
            <div class="admin__feedback-block">
                <h2 class="admin__feedback-title">Заявки на тест-драйв</h2>
                <div class="admin__feedback-list">
                    @foreach ($testDrives as $testDrive)
                        <div class="admin-feedback__item-block">
                            <div class="admin__feedback-item">
                                <p class="admin-feedback__phone-number">Номер телефону:
                                    <span>{{ $testDrive->phone_number }}</span>
                                </p>
                                <div class="admin-feedback__circle"></div>
                                <p class="admin-feedback__date">
                                    {{ \Carbon\Carbon::parse($testDrive->date_of_event)->format('d.m.Y H:i') }}</p>

                                <a href="{{ route('find-car', ['car_id' => $testDrive->car->car_id]) }}" target="_blank">
                                    Переглянути авто
                                </a>
                            </div>
                            <div class="item-feedback__buttons">
                                <form method="POST" action="{{ route('admin.test-drive.update-status', $testDrive->id) }}"
                                    class="d-inline">
                                    @csrf
                                    <input type="hidden" name="status" value="submitted">
                                    <button type="submit" class="feedback-item__submit">Підтверджено</button>
                                </form>
                                <form method="POST" action="{{ route('admin.test-drive.update-status', $testDrive->id) }}"
                                    class="d-inline">
                                    @csrf
                                    <input type="hidden" name="status" value="rejected">
                                    <button type="submit" class="feedback-item__reject">Відхилено</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Замовлення конкретного авто -->
            <div class="admin__feedback-block">
                <h2 class="admin__feedback-title">Заявки на купівлю авто</h2>
                <div class="admin__feedback-list">
                    @foreach ($carOrders as $carOrder)
                        <div class="admin-feedback__item-block">
                            <div class="admin__feedback-item">
                                <p class="admin-feedback__phone-number">Номер телефону:
                                    <span>{{ $carOrder->phone_number }}</span>
                                </p>
                                <div class="admin-feedback__circle"></div>
                                <p class="admin-feedback__date">
                                    {{ \Carbon\Carbon::parse($carOrder->date_of_event)->format('d.m.Y H:i') }}</p>
                                <a href="{{ route('find-car', ['car_id' => $carOrder->car->car_id]) }}" target="_blank">
                                    Переглянути авто
                                </a>
                            </div>
                            <div class="item-feedback__buttons">
                                <form method="POST" action="{{ route('admin.car-order.update-status', $carOrder->id) }}"
                                    class="d-inline">
                                    @csrf
                                    <input type="hidden" name="status" value="submitted">
                                    <button type="submit" class="feedback-item__submit">Підтверджено</button>
                                </form>
                                <form method="POST" action="{{ route('admin.car-order.update-status', $carOrder->id) }}"
                                    class="d-inline">
                                    @csrf
                                    <input type="hidden" name="status" value="rejected">
                                    <button type="submit" class="feedback-item__reject">Відхилено</button>
                                </form>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Замовлення авто по параметрах -->
            <div class="admin__feedback-block">
                <h2 class="admin__feedback-title">Замовлення авто</h2>
                <div class="admin__feedback-list order">
                    @foreach ($orders as $order)
                        <div class="admin-feedback__item-block order">
                            <div class="admin-feedback__order-item">
                                <div class="admin-feedback__order-info">
                                    <p class="order-title">Замовник </p>
                                    <p class="info">{{ $order->client_name }} {{ $order->client_last_name }}</p>
                                </div>
                                <div class="admin-feedback__order-info">
                                    <p class="order-title">Телефон </p>
                                    <p class="info">{{ $order->phone_number }}</p>
                                </div>
                                <div class="admin-feedback__order-info">
                                    <p class="order-title">Email </p>
                                    <p class="info">{{ $order->email }}</p>
                                </div>
                                <div class="admin-feedback__order-info">
                                    <p class="order-title">Модель </p>
                                    <p class="info">{{ $order->car_model }}</p>
                                </div>
                                <div class="admin-feedback__order-info">
                                    <p class="order-title">Ціна </p>
                                    <p class="info">{{ $order->low_price }} - {{ $order->high_price }}</p>
                                </div>
                                <div class="admin-feedback__order-info">
                                    <p class="order-title">Рік виробництва</p>
                                    <p class="info">{{ $order->min_year }} - {{ $order->max_year }}</p>
                                </div>
                                <div class="admin-feedback__order-info">
                                    <p class="order-title">Деталі замовлення</p>
                                    <p class="info">{{ $order->order_details }}</p>
                                </div>
                            </div>
                            <div class="item-feedback__buttons">
                                <form method="POST"
                                    action="{{ route('admin.order-acceptance.update-status', $order->order_id) }}"
                                    class="d-inline">
                                    @csrf
                                    <input type="hidden" name="status" value="1">
                                    <button type="submit" class="feedback-item__submit">Підтверджено</button>
                                </form>
                                <form method="POST"
                                    action="{{ route('admin.order-acceptance.update-status', $order->order_id) }}"
                                    class="d-inline">
                                    @csrf
                                    <input type="hidden" name="status" value="2">
                                    <button type="submit" class="feedback-item__reject">Відхилено</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
