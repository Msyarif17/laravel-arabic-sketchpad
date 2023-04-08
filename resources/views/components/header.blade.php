<!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      
      <a href="index.html" class="logo d-flex align-items-center text-decoration-none">
        <img src="{{asset('assets/image/logo.png')}}" class="img-fluid" alt="">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>{{env('APP_NAME')}}</h1>
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x "></i>
      <nav id="navbar" class="navbar">
        <ul >
          <li><a class="text-decoration-none active" href="index.html" >Home</a></li>
          <li><a class="text-decoration-none" href="about.html">Leader Board</a></li>
          <li><a class="text-decoration-none" href="services.html">About Us</a></li>
          {{-- <li><a class="text-decoration-none" href="pricing.html">Pricing</a></li>
          <li class="dropdown"><a class="text-decoration-none" href="#"><span>Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
            <ul>
              <li><a class="text-decoration-none" href="#">Drop Down 1</a></li>
              <li class="dropdown"><a class="text-decoration-none" href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-down dropdown-indicator"></i></a>
                <ul>
                  <li><a class="text-decoration-none" href="#">Deep Drop Down 1</a></li>
                  <li><a class="text-decoration-none" href="#">Deep Drop Down 2</a></li>
                  <li><a class="text-decoration-none" href="#">Deep Drop Down 3</a></li>
                  <li><a class="text-decoration-none" href="#">Deep Drop Down 4</a></li>
                  <li><a class="text-decoration-none" href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a class="text-decoration-none" href="#">Drop Down 2</a></li>
              <li><a class="text-decoration-none" href="#">Drop Down 3</a></li>
              <li><a class="text-decoration-none" href="#">Drop Down 4</a></li>
            </ul>
          </li> --}}
          <li><a class="text-decoration-none" href="contact.html">Contact</a></li>
          <li><a class="btn btn-primary text-center text-decoration-none get-a-quote px-3 bg-white text-dark border-0" href="get-a-quote.html"><i class="fa-solid fa-play me-3"></i> Let's Play</a></li>
        </ul>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <!-- End Header -->