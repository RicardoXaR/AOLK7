<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Donation Directory')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --deep-indigo: #2C3E50;
            --vibrant-green: #27AE60;
            --gold-accent: #FBC02D;
            --clean-white: #FFFFFF;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background-color: #f8f9fa; /* Background abu tipis biar konten stand out */
        }

        main { flex: 1; }

        .navbar-custom { background-color: var(--deep-indigo) !important; }
        .navbar-brand-custom { color: var(--gold-accent) !important; font-weight: bold; font-size: 1.5rem; }
        .nav-link-custom {
            color: var(--clean-white) !important;
            margin-right: 15px; transition: color 0.3s;
        }
        .nav-link-custom:hover { color: var(--gold-accent) !important; }
        .nav-link-custom.active { color: var(--gold-accent) !important; font-weight: 600; }

        .btn-green-cta {
            background-color: var(--vibrant-green); color: var(--clean-white);
            border: none; padding: 10px 30px; font-size: 1.1rem;
            transition: all 0.3s; text-decoration: none;
        }
        .btn-green-cta:hover {
            background-color: #1E8449; color: var(--clean-white);
            transform: translateY(-2px); box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .hero-section {
            background: linear-gradient(rgba(44, 62, 80, 0.8), rgba(44, 62, 80, 0.7)), url('https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') no-repeat center center/cover;
            color: var(--clean-white);
            padding: 120px 0;
            text-align: center;
            width: 100%;
        }

        .card-category {
            border: 1px solid #eee; background: white; padding: 30px 20px;
            text-align: center; border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05); transition: all 0.3s ease; height: 100%;
        }
        .card-category:hover {
            transform: translateY(-10px); box-shadow: 0 8px 25px rgba(0,0,0,0.1); border-color: var(--vibrant-green);
        }
        .filter-tag {
            background-color: #eee; color: #555; padding: 5px 15px;
            border-radius: 20px; margin-right: 10px; cursor: pointer;
            text-decoration: none; display: inline-block;
        }
        .filter-tag:hover { background-color: var(--deep-indigo); color: white; }

        .section-title {
            color: var(--deep-indigo); font-weight: 800; margin-bottom: 3rem;
            position: relative; display: inline-block;
        }
        .section-title::after {
            content: ''; display: block; width: 60px; height: 4px;
            background: var(--vibrant-green); margin: 10px auto 0; border-radius: 2px;
        }
        .site-logo {
            height: 40px;
            width: auto;
            margin-right: 10px;
            object-fit: contain;
        }

        .navbar-brand, .footer-logo-container {
            display: flex;
            align-items: center;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top shadow-sm py-3">
            <div class="container">
                <a class="navbar-brand navbar-brand-custom d-flex align-items-center" href="{{ route('home') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Donation Directory Logo" height="45" class="me-2">
                    Donation Directory
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
                    <li class="nav-item"><a class="nav-link nav-link-custom {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-custom {{ request()->routeIs('causes') ? 'active' : '' }}" href="{{ route('causes') }}">Browse Causes</a></li>
                    <li class="nav-item"><a class="nav-link nav-link-custom {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">About Us</a></li>

                        <li class="nav-item ms-lg-2">
                            <a href="{{ route('submissions.create') }}" class="btn btn-green-cta rounded-pill px-4 shadow-sm" style="font-size: 0.9rem;">
                                Submit Charity Program
                            </a>
                        </li>

                        <li class="nav-item d-none d-lg-block mx-2 text-muted opacity-25">|</li>

                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link fw-bold text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link fw-bold text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <div class="nav-avatar shadow-sm d-flex align-items-center justify-content-center text-white fw-bold"
                                         style="width: 40px; height: 40px; border-radius: 50%; background: linear-gradient(135deg, #27AE60, #0ea5e9); border: 2px solid #fff;">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                    </div>
                                    <span class="text-white">{{ Auth::user()->name }}</span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end shadow-lg border-0 rounded-4 mt-2 p-2" aria-labelledby="navbarDropdown">
                                    <div class="px-3 py-2 border-bottom mb-2">
                                        <small class="text-muted text-uppercase fw-bold" style="font-size: 0.65rem;">Account</small>
                                    </div>
                                    <a class="dropdown-item rounded-3 py-2 d-flex align-items-center gap-2" href="{{ route('profile') }}">
                                        <i class="bi bi-person-badge text-primary"></i> My Profile
                                    </a>
                                    <a class="dropdown-item rounded-3 py-2 d-flex align-items-center gap-2 text-danger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right"></i> {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

    <main>
        @yield('content')
    </main>

    <footer class="text-white py-5 mt-auto" style="background-color: var(--deep-indigo);">
        <div class="container text-center">

            <a class="d-inline-flex align-items-center justify-content-center text-decoration-none mb-3" href="{{ route('home') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" height="40" class="me-2">
                <span class="fs-3 fw-bold" style="color: var(--gold-accent);">Donation Directory</span>
            </a>

            <p class="mb-4 text-white-50">Building Trust, Empowering Giving. Connecting you to the causes that matter.</p>

            <div class="d-flex justify-content-center gap-3 mb-4">
                <a href="#" class="text-white fs-4 hover-gold"><i class="bi bi-instagram"></i></a>
                <a href="#" class="text-white fs-4 hover-gold"><i class="bi bi-twitter-x"></i></a>
                <a href="#" class="text-white fs-4 hover-gold"><i class="bi bi-facebook"></i></a>
            </div>

            <hr class="border-secondary">
            <p class="mb-0 small text-white-50">&copy; 2025 Donation Directory. All rights reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
