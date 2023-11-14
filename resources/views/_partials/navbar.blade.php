<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img class="non_scroll_logo" width="120px" height="auto" src="{{ asset('images/logo/white.png') }}"
                alt="">
            <img class="scroll_logo" width="120px" height="auto" src="{{ asset('images/logo/black.png') }}"
                alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li @class(['nav-item', 'active' => Route::is('home')])><a href="{{ route('home') }}" class="nav-link"> <i
                            class="fa fa-home"></i> {{ __('Home') }}</a></li>
                <li @class(['nav-item', 'active' => Route::is('events.*')])><a href="{{ route('events.index') }}"
                        class="nav-link">{{ __('Events') }}</a></li>
                <li @class(['nav-item', 'active' => Route::is('sermons.*')])><a href="{{ route('sermons.index') }}" class="nav-link"><i
                            class="fa fa-tv"></i> {{ __('Watch') }}</a></li>
                <li @class(['nav-item', 'active' => Route::is('livres.*')])><a href="{{ route('livres.index') }}" class="nav-link"><i
                            class="flag flag-united-states"></i>{{ __('Books') }}</a></li>
                <li @class(['nav-item', 'active' => Route::is('free_bible')])> <a href="{{ route('free_bible') }}"
                        class="nav-link">{{ __('Free Bible') }}</a>
                </li>
                <li @class(['nav-item', 'active' => Route::is('prayer')])> <a href="{{ route('prayer') }}"
                        class="nav-link">{{ __('Prayer') }}</a>
                </li>
                {{-- <li @class(['nav-item', 'active' => Route::is('about')])> <a href="{{ route('about') }}"
                        class="nav-link">{{ __('About') }}</a>
                </li> --}}
                {{-- <li @class(["nav-item","active"=>Route::is("")])><a href="#" class="nav-link">Blog</a></li> --}}
                <li @class(['nav-item', 'active' => Route::is('contact')])><a href="{{ route('contact') }}"
                        class="nav-link">{{ __('Contact') }}</a>
                </li>
                <li class="nav-item dropdown">
                    <?php $lang = LaravelLocalization::getCurrentLocale(); ?>
                    <a href="#" class="nav-link dropdown-toggle"><img class="" width="20"
                            src="{{ asset('flag-icons-main/flags/4x3/' . $lang . '.svg') }}" alt="">
                        {{ LaravelLocalization::getCurrentLocale() }}</a>
                    <ul class="dropdown-menu overflow-hidden">
                        @foreach ($supportedLocales->except(LaravelLocalization::getCurrentLocale()) as $key => $locale)
                            <li class="dropdown-item">
                                <a class="dropdown-item-text"
                                    href="{{ LaravelLocalization::getLocalizedURL($key) }}"><img class=""
                                        width="20" src="{{ asset('flag-icons-main/flags/4x3/' . $key . '.svg') }}"
                                        alt=""> {{ $locale['native'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                @guest('web')
                    <li @class(['nav-item', 'active' => Route::is('login')])><a href="{{ route('login') }}"
                            class="nav-link">{{ __('Log In') }}</a></li>
                @endguest
                @auth('web')
                    <li @class(['nav-item', 'active' => Route::is('dashboard')])><a href="{{ route('dashboard') }}"
                            class="nav-link">{{ __('Dashboard') }}</a></li>
                @endcan
            </ul>
        </div>
    </div>
</nav>
