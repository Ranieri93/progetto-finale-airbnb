<nav class="navbar navbar-expand-lg navbar-dark">
    @auth()
    <a class="navbar-brand" href="{{ route('admin.home') }}">BoolBnB</a>
    @endauth
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav ml-auto">
            @auth()
            <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName()== 'admin.apartments.cards' ? 'active' : '' }}"
                       href="{{ route('admin.apartments.cards') }}">Vedi messaggi ricevuti</a>
            </li>
            <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName()== 'admin.apartments.index' ? 'active' : '' }}"
                       href="{{ route('admin.apartments.index') }}">Gestisci i tuoi Appartamenti</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName()== 'admin.apartments.create' ? 'active' : '' }}"
                    href="{{ route('admin.apartments.create') }}">Crea i tuoi Appartamenti</a>
            </li>
            @endauth
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            @endguest
        </ul>
    </div>
</nav>
