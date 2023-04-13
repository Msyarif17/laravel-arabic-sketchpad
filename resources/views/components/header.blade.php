<!-- ======= Header ======= -->
<header id="header" class="header d-flex align-items-center fixed-top ">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

        <a href="{{ route('index') }}" class="logo d-flex align-items-center text-decoration-none">
            <img src="{{ asset('assets/image/logo.png') }}" class="img-fluid" alt="">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            <h1>{{ env('APP_NAME') }}</h1>
        </a>

        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x "></i>
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="text-decoration-none {{ Route::is('index') ? 'active' : '' }}"
                        href="{{ route('index') }}">Home</a></li>
                <li><a class="text-decoration-none {{ Route::is('leader-board') ? 'active' : '' }}"
                        href="{{ route('leader-board') }}">Leader Board</a></li>
                <li><a class="text-decoration-none {{ Route::is('about-us') ? 'active' : '' }}"
                        href="{{ route('about-us') }}">About Us</a></li>
                {{-- <li><a class="text-decoration-none {{Route::is('index') ? 'active':''}}" href="pricing.html">Pricing</a></li>
          <li class="dropdown"><a class="text-decoration-none {{Route::is('index') ? 'active':''}}" href="#"><span>Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a class="text-decoration-none {{Route::is('index') ? 'active':''}}" href="#">Drop Down 1</a></li>
              <li class="dropdown"><a class="text-decoration-none {{Route::is('index') ? 'active':''}}" href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a class="text-decoration-none {{Route::is('index') ? 'active':''}}" href="#">Deep Drop Down 1</a></li>
                  <li><a class="text-decoration-none {{Route::is('index') ? 'active':''}}" href="#">Deep Drop Down 2</a></li>
                  <li><a class="text-decoration-none {{Route::is('index') ? 'active':''}}" href="#">Deep Drop Down 3</a></li>
                  <li><a class="text-decoration-none {{Route::is('index') ? 'active':''}}" href="#">Deep Drop Down 4</a></li>
                  <li><a class="text-decoration-none {{Route::is('index') ? 'active':''}}" href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a class="text-decoration-none {{Route::is('index') ? 'active':''}}" href="#">Drop Down 2</a></li>
              <li><a class="text-decoration-none {{Route::is('index') ? 'active':''}}" href="#">Drop Down 3</a></li>
              <li><a class="text-decoration-none {{Route::is('index') ? 'active':''}}" href="#">Drop Down 4</a></li>
            </ul>
          </li> --}}
                <li><a class="text-decoration-none {{ Route::is('contact') ? 'active' : '' }}"
                        href="{{ route('contact') }}">Contact</a></li>
                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a href="{{Auth::user()->getRoleNames()[0] == "Super Admin" ? route('dashboard.index'):route('profile.index')}}" class="dropdown-item text-dark py-0">
                              {{Auth::user()->getRoleNames()[0] == "Super Admin" ? "Dashboard":"Profile"}}
                            </a>
                            <hr class="my-2">
                            <a class="dropdown-item text-dark py-0" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>


                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endif
                <li><a class="btn btn-primary text-center text-decoration-none get-a-quote px-3 bg-white text-dark border-0"
                        href="{{ route('main') }}"><i class="fa-solid fa-play me-3"></i> Let's Play</a></li>
            </ul>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
<!-- End Header -->
