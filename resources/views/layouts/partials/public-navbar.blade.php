<nav class="navbar navbar-expand-lg navbar-light">
    <a href="{{ url('/home') }}" class="navbar-brand" href="#">
        <svg viewBox="0 0 1000 1000" role="presentation" aria-hidden="true" focusable="false" style="height: 1em; width: 1em; display: block; fill: currentcolor;">
            <path
                d="m499.3 736.7c-51-64-81-120.1-91-168.1-10-39-6-70 11-93 18-27 45-40 80-40s62 13 80 40c17 23 21 54 11 93-11 49-41 105-91 168.1zm362.2 43c-7 47-39 86-83 105-85 37-169.1-22-241.1-102 119.1-149.1 141.1-265.1 90-340.2-30-43-73-64-128.1-64-111 0-172.1 94-148.1 203.1 14 59 51 126.1 110 201.1-37 41-72 70-103 88-24 13-47 21-69 23-101 15-180.1-83-144.1-184.1 5-13 15-37 32-74l1-2c55-120.1 122.1-256.1 199.1-407.2l2-5 22-42c17-31 24-45 51-62 13-8 29-12 47-12 36 0 64 21 76 38 6 9 13 21 22 36l21 41 3 6c77 151.1 144.1 287.1 199.1 407.2l1 1 20 46 12 29c9.2 23.1 11.2 46.1 8.2 70.1zm46-90.1c-7-22-19-48-34-79v-1c-71-151.1-137.1-287.1-200.1-409.2l-4-6c-45-92-77-147.1-170.1-147.1-92 0-131.1 64-171.1 147.1l-3 6c-63 122.1-129.1 258.1-200.1 409.2v2l-21 46c-8 19-12 29-13 32-51 140.1 54 263.1 181.1 263.1 1 0 5 0 10-1h14c66-8 134.1-50 203.1-125.1 69 75 137.1 117.1 203.1 125.1h14c5 1 9 1 10 1 127.1.1 232.1-123 181.1-263.1z">
            </path>
        </svg>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarText">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <svg viewBox="0 0 12 12" width="0.8571428571428571em" height="0.8571428571428571em">
                        <path
                            d="M3.48 3.5c.17-.85.43-1.6.75-2.18A5.02 5.02 0 001.67 3.5zm1.03 0h2.98C7.16 2 6.57 1 6 1S4.84 2 4.5 3.5zm4 0h1.82a5.02 5.02 0 00-2.56-2.18c.32.58.58 1.33.75 2.18zm.16 1a13.82 13.82 0 010 3h2.1a5 5 0 000-3zm-1.01 0H4.34a12.43 12.43 0 000 3h3.32a12.43 12.43 0 000-3zm-4.33 0h-2.1a5 5 0 000 3h2.1a13.82 13.82 0 010-3zm5.19 4a7.5 7.5 0 01-.75 2.18 5.02 5.02 0 002.56-2.18zm-1.03 0H4.51C4.84 10 5.43 11 6 11s1.16-1 1.5-2.5zm-4 0H1.66c.57 1 1.48 1.77 2.56 2.18a7.5 7.5 0 01-.75-2.18zM6 12A6 6 0 116 0a6 6 0 010 12z"
                            fill="currentcolor"></path>
                    </svg>
                    Italiano (IT)<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">€ EUR</a>
            </li>
            <li class="nav-item space">
                <a class="nav-link" href="#">Offri una casa</a>
            </li>
            <li class="nav-item space">
                <a class="nav-link" href="#">Offri un'esperienza</a>
            </li>
            <li class="nav-item space">
                <a class="nav-link" href="#">Aiuto</a>
            </li>
            <li class="nav-item space">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item space">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
{{--            @auth
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endauth--}}
        </ul>
    </div>
</nav>
