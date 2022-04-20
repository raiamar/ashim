@extends('frontend.layout.master')
@section('title','Home')
@section('content')


    <header>
      <nav class="navbar navbar-expand-lg navbar-light p-0">
        <div class="container">
          <a class="navbar-brand text-white" href="#">
            <img src="../img/logo.png" alt=""
          /></a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="about.html">About us</a>
            </li>
			<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle=""
                aria-expanded="false">
                Menus
              </a>
              <ul class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown"
              style="width: max-content;">
              <section class="drinks">
                <div class="container">

                  <div class=" row">
                    <div class="col-md-2">
                      <div class="card border-0">
                      <a href="pages/menu.html">
                        <img src="./default3.jpg" alt="" class="card-img-top" />
                        <h4 class="text-center mt-2 texture-green">Goat</h4>
                      </a>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="card border-0">
                        <a href="pages/menu.html">
                          <img
                          src="https://www.andys.md/public/menu/thumbs/version_310x310x1/f3f877c041828850fdd8a5bab1c27e33.jpg"
                          alt="" class="card-img-top" />
                          <h4 class="text-center mt-2 texture-green">Beef</h4></a>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="card border-0">
                       <a href="pages/menu.html">
                        <img src="./default3.jpg" alt="" class="card-img-top" />
                        <h4 class="text-center mt-2 texture-green">Lambs</h4></a>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="card border-0">
                        <a href="pages/menu.html">
                          <img src="./default3.jpg" alt="" class="card-img-top" />
                          <h4 class="text-center mt-2 texture-green">Chicken</h4></a>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="card border-0">
                       <a href="pages/menu.html">
                        <img src="./default3.jpg" alt="" class="card-img-top" />
                        <h4 class="text-center mt-2 texture-green">Chicken</h4></a>
                      </div>
                    </div>
                    <div class="col-md-2">
                      <div class="card border-0">
                       <a href="pages/menu.html">
                        <img src="./default3.jpg" alt="" class="card-img-top" />
                        <h4 class="text-center mt-2 texture-green">Small Goods</h4></a>
                      </div>
                    </div>

                  </div>
                </div>
              </section>
            </ul>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="specialities.html">Book table</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="gallery.html">Login</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
    <div class="menu-banner page-banner">
      <div class="menu-banner-content">
        <div class="container">
          <h1 class="text-center texture-green">SIRLOIN STEAKS</h1>
        </div>
      </div>
    </div>
    <section class="products bg-transparent" style="background: url('../img/dark_wall.png');">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="swiper swiper1">
              <!-- Additional required wrapper -->
              <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">
                  <img
                    class="w-100"
                    src="../img/steak-raw-banner-3.jpg"
                    alt=""
                  />
                </div>
              </div>
              <!-- If we need pagination -->
            
            </div>
          </div>
          <div class="col-md-6">
    
            <h5 class="text-white  mb-5" style="line-height: 1.8rem;">
              Our lean, juicy 6-oz. sirloins are max on flavor, with little
              effort on your part. They’re ready for an any-night dinner, a
              weekend BBQ or a lunchtime steak sandwich you’ll remember. Cook
              these 100% grass-fed, organic sirloin steaks quickly, in a pan, on
              the grill or in the oven. Sprinkle with salt and pepper, marinate,
              or add a sauce. Serve with baked sweet potato fries with fresh
              herbs and roasted asparagus. 100% Grass-Fed, 100% Grass-Finished
              100% Organic 100% Free Range Never Contains Antibiotics Never
              Contains Added Hormones
              <br>
              <ul class="mt-4">
                  <li>100% Grass-Fed, 100% Grass-Finished</li>
                  <li>100% Organic</li>
                  <li>100% Free Range</li>
                  <li>Never Contains Antibiotics</li>
              </ul>
            </h5>
            <button  class="buy-btn">Buy Now</button>
          </div>
        </div>
      </div>
    </section>
    <section class="products bg-transparent">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <h1 class="texture-green">Related Products</h1>
            <p class="texture-green mb-5">
              Ribeye, Sirloin, Strip Steak & Tenderloin 100% grass-fed,
              free-range, organic steaks From dinner for two to a full BBQ
            </p>
            <div class="d-flex justify-content-end">
              <div class="swiper-button-prev swiper-button-prev2"></div>
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
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="/js/main.js"></script>
    <script type="text/javascript" src="./js/slick/slick.js"></script>
    <script></script>

    <script type="text/javascript">
      $(function () {
        $(".navbar a").on("click", function () {
          $("html, body").animate(
            {
              scrollTop: $($.attr(this, "href")).offset().top,
            },
            1500
          );
        });
        if (window.location.hash) {
          scroll(0, 0);
          setTimeout(function () {
            scroll(0, 0);
          }, 1);
        }
        if (window.location.hash) {
          $("html, body").animate(
            {
              scrollTop: $(window.location.hash).offset().top + "px",
            },
            1500
          );
        }
      });
      const swiper1 = new Swiper(".swiper1", {
        // Optional parameters

        loop: true,
        slidesPerView: 1,

        // If we need pagination
        pagination: {
          el: ".swiper-pagination",
        },

        // Navigation arrows
      
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
