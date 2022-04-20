@extends('frontend.layout.master')
@section('title','Home')
@section('content')


    <header >
        <nav class="navbar navbar-expand-lg navbar-light p-0">
          <div class="container">
            <a class="navbar-brand text-white" href="#"> <img src="../img/logo.png" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('about')}}">About us</a>
            </li>
      
            <li class="nav-item">
              <a class="nav-link" href="{{route('menu')}}">Menu</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('specialities')}}">Book table</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('userlogin')}}">Login</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('contact')}}">Contact</a>
            </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
    <div class="menu-banner page-banner">
      <!-- <img
        width="100%"
        src="https://personales.unican.es/corcuerp/ingweb/code/kerico/images/slider1.jpg"
        alt=""
      /> -->
      <div class="menu-banner-content">
        <div class="container">
          <h1 class="text-uppercase texture-green text-center">Our Products</h1>
          <h5 class="text-uppercase text-center texture-green">
            EAT BEEF THE WAY IT’S MEANT TO BE WITH 100% GRASS-FED, 100%
            FREE-RANGE BEEF FROM GREEN FARM MEAT. AN INTIMATE DINNER FOR TWO. A
            BIG GATHERING WITH FRIENDS AND FAMILY. IT’S BEEF FOR ANY TIME AND
            EVERY OCCASION.
          </h5>
        </div>
      </div>
    </div>

    <section class="products bg-transparent">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <h1 class="texture-green">STEAKS</h1>
            <p class="texture-green mb-5">
              Ribeye, Sirloin, Strip Steak & Tenderloin 100% grass-fed,
              free-range, organic steaks From dinner for two to a full BBQ
            </p>
            <div class="d-flex justify-content-end">
                <div class=" swiper-button-prev swiper-button-prev1"></div>
                <div class="swiper-button-next ms-4 swiper-button-next1"></div>
               </div>
          </div>
          <div class="col-md-9">
            <div class="swiper swiper1">
              <!-- Additional required wrapper -->
              <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">
                  <img
                    class="w-100"
                    src="../img/d6630b8a-fda6-4da6-a510-008ad50fcbdf.jpg"
                    alt=""
                  />
                </div>
                <div class="swiper-slide">
                  <img
                    class="w-100"
                    src="../img/a87f3873-7198-4df4-acba-a00b0e509442.jpg"
                    alt=""
                  />
                </div>
                <div class="swiper-slide">
                  <img
                    class="w-100"
                    src="../img/8351cfe1-e9fb-4810-8ba7-1322e8ad8d66.jpg"
                    alt=""
                  />
                </div>
                <div class="swiper-slide">
                  <img
                    class="w-100"
                    src="../img/d6630b8a-fda6-4da6-a510-008ad50fcbdf.jpg"
                    alt=""
                  />
                </div>
                <div class="swiper-slide">
                  <img
                    class="w-100"
                    src="../img/d6630b8a-fda6-4da6-a510-008ad50fcbdf.jpg"
                    alt=""
                  />
                </div>
                <div class="swiper-slide">
                  <img
                    class="w-100"
                    src="../img/d6630b8a-fda6-4da6-a510-008ad50fcbdf.jpg"
                    alt=""
                  />
                </div>
              </div>
              <!-- If we need pagination -->

              <!-- If we need navigation buttons -->
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="products bg-transparent">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <h1 class="texture-green">STEAKS</h1>
            <p class="texture-green mb-5">
              Ribeye, Sirloin, Strip Steak & Tenderloin 100% grass-fed,
              free-range, organic steaks From dinner for two to a full BBQ
            </p>
           <div class="d-flex justify-content-end">
            <div class=" swiper-button-prev swiper-button-prev2"></div>
            <div class="swiper-button-next ms-4 swiper-button-next2"></div>
           </div>
          </div>
          <div class="col-md-9">
            <div class="swiper swiper2">
              <!-- Additional required wrapper -->
              <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">
                  <img
                    class="w-100"
                    src="../img/d6630b8a-fda6-4da6-a510-008ad50fcbdf.jpg"
                    alt=""
                  />
                </div>
                <div class="swiper-slide">
                  <img
                    class="w-100"
                    src="../img/a87f3873-7198-4df4-acba-a00b0e509442.jpg"
                    alt=""
                  />
                </div>
                <div class="swiper-slide">
                  <img
                    class="w-100"
                    src="../img/8351cfe1-e9fb-4810-8ba7-1322e8ad8d66.jpg"
                    alt=""
                  />
                </div>
                <div class="swiper-slide">
                  <img
                    class="w-100"
                    src="../img/d6630b8a-fda6-4da6-a510-008ad50fcbdf.jpg"
                    alt=""
                  />
                </div>
                <div class="swiper-slide">
                  <img
                    class="w-100"
                    src="../img/d6630b8a-fda6-4da6-a510-008ad50fcbdf.jpg"
                    alt=""
                  />
                </div>
                <div class="swiper-slide">
                  <img
                    class="w-100"
                    src="../img/d6630b8a-fda6-4da6-a510-008ad50fcbdf.jpg"
                    alt=""
                  />
                </div>
              </div>
              <!-- If we need pagination -->

              <!-- If we need navigation buttons -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
      crossorigin="anonymous"
    ></script>
    <script type="text/javascript" src="./js/slick/slick.js"></script>
    <script src="/js/main.js"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script>
      $(".your-class").slick({
        slidesToShow: 5,
        slidesToScroll: 5,
        dots: false,
      });
    </script>
    <script>
      const swiper = new Swiper(".swiper1", {
        // Optional parameters

        loop: true,
        slidesPerView: 3,
        spaceBetween: 20,

        // If we need pagination
        pagination: {
          el: ".swiper-pagination",
        },

        // Navigation arrows
        navigation: {
          nextEl: ".swiper-button-next1",
          prevEl: " .swiper-button-prev1",
        },

      });
      const swiper2 = new Swiper(".swiper2", {
        // Optional parameters

        loop: true,
        slidesPerView: 3,
        spaceBetween: 20,

        // If we need pagination
        pagination: {
          el: ".swiper-pagination",
        },

        // Navigation arrows
        navigation: {
          nextEl: " .swiper-button-next2",
          prevEl: " .swiper-button-prev2",
        },

      });
    </script>
  </body>
</html>
