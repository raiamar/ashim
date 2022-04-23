<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

      <link rel="stylesheet" href="{{asset('css/style.css')}}" />

      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
      <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />

      <link rel="stylesheet"href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />

      <link rel="stylesheet" type="text/css" href="{{asset('js/slick/slick.css')}}" />
      <link rel="stylesheet" type="text/css" href="{{asset('js/slick/slick-theme.css')}}" />

</head>
<body>
  @yield('content')
</body>

  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
    crossorigin="anonymous"></script>

  <script src="{{asset('js/main.js')}}"></script>
  <script type="text/javascript" src="{{asset('/js/slick/slick.js')}}"></script>

    <script> 
    AOS.init({
      duration: 1500,
    });
  </script>
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
  </script>
  <script>
    $(".testimonial-slider").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: true,
      arrows: false,
      focusOnSelect: true,
    });
  </script>
  <script>
    $(".gallery-feed").slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      dots: false,
      arrows: false,
      focusOnSelect: true,
      responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
    });
  </script>

  
<script type="text/javascript">
$(function() {
  
  $(document).on({
    mouseover: function(event) {
      $(this).find('.far').addClass('star-over');
      $(this).prevAll().find('.far').addClass('star-over');
    },
    mouseleave: function(event) {
      $(this).find('.far').removeClass('star-over');
      $(this).prevAll().find('.far').removeClass('star-over');
    }
  }, '.rate');


  $(document).on('click', '.rate', function() {
    if ( !$(this).find('.star').hasClass('rate-active') ) {
      $(this).siblings().find('.star').addClass('far').removeClass('fas rate-active');
      $(this).find('.star').addClass('rate-active fas').removeClass('far star-over');
      $(this).prevAll().find('.star').addClass('fas').removeClass('far star-over');
    } else {
      console.log('has');
    }
  });
  
});

</script>

</html>