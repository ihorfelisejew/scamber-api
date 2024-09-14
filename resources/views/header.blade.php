<header>
    <div class="header__container">
        <div class="header__content">
            <div class="header__logo-block">
                <img src="{{ asset('assets/header/logo.png') }}" alt="Scamber">
                <p class="header__logo-text">Scamber</p>
            </div>
            <div class="header__menu-block">
                <ul class="header__menu-list">
                    <li class="header__menu-item">
                        <a href="{{ route('home') }}"
                            class="header__menu-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
                            Головна
                        </a>
                    </li>
                    <li class="header__menu-item">
                        <a href="{{ route('catalog') }}"
                            class="header__menu-link {{ Route::currentRouteName() == 'catalog' ? 'active' : '' }} {{ Route::currentRouteName() == 'car.details.view' ? 'active' : '' }}">
                            Каталог
                        </a>
                    </li>
                    <li class="header__menu-item">
                        <a href="#"
                            class="header__menu-link {{ Route::currentRouteName() == 'about' ? 'active' : '' }}">
                            Про нас
                        </a>
                    </li>
                    <li class="header__menu-item">
                        <a href="#"
                            class="header__menu-link {{ Route::currentRouteName() == 'contacts' ? 'active' : '' }}">
                            Контакти
                        </a>
                    </li>
                </ul>
            </div>
            <div class="header__contacts-block {{ Route::currentRouteName() == 'home' ? 'white-text' : '' }}">
                <a href="tel:+380 68 154 35 21" class="header__location-phone">
                    <svg width="15" height="15" viewBox="0 0 15 15" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.7964 9.84578C12.878 9.84578 11.9763 9.70215 11.1218 9.41977C10.7031 9.27695 10.1884 9.40797 9.93283 9.67043L8.24623 10.9436C6.29026 9.89953 5.08542 8.69508 4.05558 6.75379L5.29131 5.11113C5.61237 4.79051 5.72752 4.32215 5.58956 3.8827C5.30596 3.02371 5.1619 2.12242 5.1619 1.20367C5.16194 0.539961 4.62198 0 3.95831 0H1.20363C0.53996 0 0 0.539961 0 1.20363C0 8.81105 6.18897 15 13.7964 15C14.46 15 15 14.46 15 13.7964V11.0494C15 10.3857 14.46 9.84578 13.7964 9.84578Z"
                            fill="currentColor" />
                    </svg>
                    +380 68 154 35 21
                </a>
                @if (Route::current()->uri() == '/')
                    <div class="header__location-block">
                        <button class="header__location-visible" onclick="toggleHeaderLocations()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" strokeWidth="2" strokeLinecap="round"
                                strokeLinejoin="round">
                                <path
                                    d="M12 2c-4.418 0-8 3.582-8 8 0 5.385 7.84 13.307 7.98 13.492a.993.993 0 0 0 1.04 0C12.16 23.307 20 15.385 20 10c0-4.418-3.582-8-8-8zM12 12a2 2 0 1 1 0-4 2 2 0 0 1 0 4z" />
                                <circle cx="12" cy="10" r="2" fill="currentColor" />
                            </svg>
                            <p class="header__location-text">{{ $activeCity }}</p>
                            <svg width="15.000000" height="9.000000" viewBox="0 0 15 9" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="header-location__arrow">
                                <path id="Vector 1" d="M0 1.52e-5L7 7L14 1.52e-5" stroke="currentColor"
                                    strokeWidth="2.000000" />
                            </svg>
                        </button>
                        <div class="header__location-unvisible">
                            <div class="header__locations-list">
                                @foreach ($uniqueCities as $city)
                                    @if ($city !== $activeCity)
                                        <form method="POST" action="{{ route('setCity') }}" style="display:inline;">
                                            @csrf
                                            <input type="hidden" name="city" value="{{ $city }}">
                                            <button type="submit"
                                                class="header__location-item">{{ $city }}</button>
                                        </form>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif
                @auth('web')
                    <a href="{{ route('client.dashboard') }}"
                        class="header__dashboard-link {{ Route::currentRouteName() == 'home' ? 'home-icon' : 'default-icon' }}">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 2C6.48 2 2 6.48 2 12C2 17.52 6.48 22 12 22C17.52 22 22 17.52 22 12C22 6.48 17.52 2 12 2ZM12 5.9C13.16 5.9 14.1 6.84 14.1 8C14.1 9.16 13.16 10.1 12 10.1C10.84 10.1 9.9 9.16 9.9 8C9.9 6.84 10.84 5.9 12 5.9ZM12 20.2C10.25 20.2 8.61 19.44 7.5 18.14C7.53 16.8 10 16 12 16C14 16 16.47 16.8 16.5 18.14C15.39 19.44 13.75 20.2 12 20.2Z"
                                class="profile-icon" />
                        </svg>
                    </a>
                @else
                    <a href="{{ route('login') }}"
                        class="header__login-link {{ Route::currentRouteName() == 'home' ? 'white' : '' }}">Sign In</a>
                @endauth
            </div>
        </div>
    </div>
</header>
