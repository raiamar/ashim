<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <!-- fontawsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- animate css  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- aos data  -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- owl carousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
        integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css"
        integrity="sha512-UTNP5BXLIptsaj5WdKFrkFov94lDx+eBvbKyoe1YAfjeRPC+gT5kyZ10kOHCfNZqEui1sxmqvodNUx3KbuYI/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="owlcarousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/dist/assets/owl.theme.default.min.css">
    <!-- fontAwsome  -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- fontAwsome  -->
    <link rel="stylesheet" href="../css/mediaquery.css">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<!-- header -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light p-0">
        <div class="container">
            <a class="navbar-brand text-white" href="#">
                <img src="{{ asset('img/logo.png') }}" alt="" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation"><b><span style="font-size: 12px;" class="texture-green">MENU</span></b>
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('menu') }}">All Products</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('specialities') }}">Stores</a>
                    </li>


                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About us</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>

                    @if (Auth::user())
                        {{-- <a class="nav-link" href="#">{{Auth::user()->name}}</a> --}}
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>

                        @if (Auth::user()->role == 'manager' || Auth::user()->role == 'admin' || Auth::user()->role == 'vendor')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                        @elseif(Auth::user()->role == 'user' && Auth::user()->vendor_request == 0)
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('become_vendor') }}">Become a vendor</a>
                            </li>
                        @elseif(Auth::user()->role == 'user' && Auth::user()->vendor_request == 1)
                            <li class="nav-item">
                                <a class="nav-link" href="javascript:void(0);">Requested for vendor</a>
                            </li>
                        @endif
                    @else
                        <a class="nav-link" href="/login">Login</a>
                    @endIf
                    <li class="nav-item">
                        <form class="form-inline mt-3" action="{{ route('menu') }}" method="GET">
                            <input class="form-control mr-sm-2" type="search" name="q" placeholder="Search Product by Title" aria-label="Search">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                          </form>
                    </li>
                </ul>
            </div>


            <a href="{{ route('carts') }}" style="text-decoration: none">
                <i class="fa-solid fa-cart-shopping"></i>
                @if (Session::has('cart'))
                    <sup class="cart-item" id="nav-cart-count">{{ count(Session::get('cart')) }}</sup>
                @else
                    <sup class="cart-item" id="nav-cart-count">0</sup>
                @endif
            </a>
        </div>
    </nav>
</header>
<!-- header -->



<body>
    @yield('body')
    @yield('content')
</body>

<!-- footer -->
<footer>
    <section class="footer" style="
        background-image: url(http://giardino.axiomthemes.com/wp-content/uploads/2017/12/bg-40.jpg?id=417) !important;
      ">
        <div class="container text-white">
            <div class="row">
                <div class="col-md-4">
                    <h3 class="mb-4">Find Us</h3>

                    <ul>
                        <li class="mb-4">
                            <i class="fa fa-map-marker-alt"></i>
                            Maitighar
                        </li>
                        <li class="mb-4">
                            <i class="fa fa-phone"></i>
                            98585458
                        </li>
                        <li>
                            <i class="fa fa-envelope"></i>
                            Helmetsss@gmail.com
                        </li>
                    </ul>
                </div>
                <div class="col-md-5">
                    <h3 class="mb-4"><i class="fa fa-clock"></i> Store Hours</h3>

                    <ul style="column-count: 2;">
                        <li class="mb-2">Everyday - 08:00AM to 10:00PM</li>

                </div>
                <div class="col-md-3">
                    <ul class="text-right">
                        <li>
                            <a class="text-right text-white">Helmetsss</a>
                        </li>

                        <li>
                            <a class="text-right text-white">Contact</a>
                        </li>

                        <li>
                            <a class="text-right text-white">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">

            <hr class="separator" style="transform: translate3d(0px, 0px, 0px); opacity: 1" />
            <div
                class="
            row
            sub-footer
            d-flex
            justify-content-between
            align-items-center
          ">

                <!-- SOCIAL FOOTER LIST -->
            </div>
            <div
                class="
              copyright
              txt-white
              order-sm-1
              col-12 col-md-7
              layout--contained
            ">
                <div class="d-flex justify-content-center justify-content-md-start">
                    <p class="text-white">© 2021 Helmetsss | &nbsp;</p>
                    <a href="#" class="no-style text-white" title="">Terms &amp; Conditions</a>

                    <ul class="social-icons">
                        <li><a href=" "><img src="{{ asset('image/facebook.png') }}" /></a></li>
                        <li><a href=" "><img src="{{ asset('image/insta.png') }}" /></a></li>

                    </ul>
                </div>
            </div>
        </div>
        </div>
    </section>
</footer>
<!-- footer -->






<script>
    // When the user scrolls down 80px from the top of the document, resize the navbar's padding and the logo's font size
    window.onscroll = function() {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            document.getElementById("navbar").style.padding = "10px 10px";
            document.getElementById("logo").style.fontSize = "25px";
        } else {
            document.getElementById("navbar").style.padding = "30px 10px";
            document.getElementById("logo").style.fontSize = "35px";
        }
    }
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> --}}
<!-- owl carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"
integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="jquery.min.js"></script>
<script src="owlcarousel/dist/assets/owl.carousel.min.js"></script>
<!-- vue.js  -->
<script src="{{ mix('/js/app.js') }}"></script>
<!-- vue .js  -->
<script>
    AOS.init();
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
{{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@yield('scripts')
<!-- jobcategro  -->
<script>
    function myFunction() {
        var dots = document.getElementById("job_category");
        var moreText = document.getElementById("JobCate");
        var btnText = document.getElementById("jobCate");

        if (dots.style.display === "none") {
            dots.style.display = "inline";
            btnText.innerHTML = "View More";
            moreText.style.display = "none";
        } else {
            dots.style.display = "none";
            btnText.innerHTML = "View Less";
            moreText.style.display = "inline";
        }
    }
</script>

</html>
