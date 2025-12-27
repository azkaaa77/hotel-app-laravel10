<header>
    <!-- header inner -->
    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                    <div class="full">
                        <div class="center-desk">
                            <div class="logo">
                                <a href="/"><img src="../images/logo.png" alt="#" /></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                    <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                            <ul class="navbar-nav mr-auto d-flex flex-column flex-md-row gap-2">
                                <li>
                                    <a class="nav-link" href="#home">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#about">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#room">Our room</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#gallery">Gallery</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#blog">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#contact">Contact Us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('invoice') }}">Invoice</a>
                                </li>

                                <ul class="navbar-nav ml-auto">

                                    {{-- Bagian ini hanya akan tampil jika pengunjung belum login --}}
                                    @guest
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                                        </li>
                                    @endguest

                                    {{-- Bagian ini hanya akan tampil jika pengguna sudah login --}}
                                    @auth
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                {{ Auth::user()->name }} </a>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                                @if(Auth::user()->usertype === 'admin')
                                                    <a class="nav-link dropdown-item" href="{{ url('/admin') }}">Dashboard Admin</a>
                                                    <div class="dropdown-divider"></div>
                                                @endif

                                                {{-- <a class="dropdown-item" href="{{ route('my.bookings') }}">Booking Saya</a> --}}
                                                <div class="dropdown-divider"></div>
                                                {{-- <a class="dropdown-item" href="{{ route('profile.edit') }}">Profil Saya</a> --}}
                                                <div class="dropdown-divider"></div>

                                                <a class="nav-link dropdown-item" href="#"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>
                                            </div>
                                        </li>
                                    @endauth

                                </ul>

                                {{-- Form logout yang disembunyikan bisa diletakkan di luar <ul> agar lebih rapi --}}
                                    @auth
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    @endauth
                                </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>