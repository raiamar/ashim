@extends('users.layout.master')
@section('content')


  <div class="banner">
    
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="https://technuggets.biz/wp-content/uploads/2015/10/Helmets-banner_Tech-Nuggets.jpg" class="d-block w-1000" alt="..." />
          <div class="carousel-caption d-md-block">
            <h3 class="pt-5">Providing Quality Riding Gears</h3>
            <h5>Helmetsss.com</h5>      
           </div>
        </div>        
           
  </div>


  <div class="container">
		
    @if( session('success_message'))
      <div class="alert alert-success">
        {{session('success_message')}}
      </div>
    @endif
  
    @if( session('error_message'))
      <div class="alert alert-danger">
        {{session('error_message')}}
      </div>
    @endif
  </div>

  <section class="welcome" id="welcome">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h3 style="background: url('./img/title_texture_green.png')" class="section-title text-center texture-green"
            data-aos="fade-down" data-aos-duration="2000">
            Welcome To Atmosphere Resturant 
          </h3>
          <p class="welcome-text text-center" data-aos="fade-down">
            Green Farm Meat NSW Halal has a remarkable selection of exquisite
            Chicken, Lamb, Beef and Goat products in every cut imaginable. You
            have enough choice to choose the best out of varied of high
            quality halal meat at decent prices at our meat shop.
          </p>
        </div>
        <div class="col-md-6 d-flex">
          <div class="welcome-image1" data-aos="fade-right"></div>
          <div class="welcome-image2" data-aos="fade-right"></div>
        </div>
      </div>
    </div>
  </section>

  <section class="special">
    <div class="container">
      <h3 class="section-title text-center mb-5 texture-green">
        Customer review
      </h3>
      <div class="row">
        <div class="col-md-3">
          <div class="special-box">
            <a href="pages/menu.html">
              <img src="./img/826170483our-cuisine-1.png" alt="" />
              <div class="special-content">
                <h4 class="special-name">Akriti</h4>
                <p class="special-description text-center">
                  Best place to hagout. Good good food and good service. 
                </p>
              </div>
            </a>
          </div>
          <h3 class="text-center texture-green mt-3">Akriti Bhattarai &nbsp; <i class="fa fa-arrow-right"></i></h3>
        </div>
        <div class="col-md-3 special-box">
          <div class="special-box">
            <a href="pages/menu.html">
              <img src="./img/916763445our-cuisine-2.png" alt="" />
              <div class="special-content">
                <h4 class="special-name">Ashim</h4>
                <p class="special-description text-center">
                  Both food and service has been great here. 
                </p>
              </div>
            </a>
          </div>
          <h3 class="text-center texture-green mt-3">Ashim Nepal&nbsp; <i class="fa fa-arrow-right"></i></h3>
        </div>
        <div class="col-md-3 special-box">
          <div class="special-box">
              <img src="./img/1634746773our-cuisine-3.png" alt="" />
              <div class="special-content">
                <h4 class="special-name">Shambhavi</h4>
                <p class="special-description text-center">
                  The vibe here is great along with its food and service. 
                </p>
              </div>
            </a>
          </div>
          <h3 class="text-center texture-green mt-3">Shambhavi Mishara &nbsp; <i class="fa fa-arrow-right"></i></h3>
        </div>
        <div class="col-md-3 special-box">
          <div class="special-box">
            <a href="pages/menu.html">
              <img src="./img/1814091960our-cuisine-4.png" alt="" />
              <div class="special-content">
                <h4 class="special-name">Abhishek</h4>
                <p class="special-description text-center">
                  The place never fails to provide the good quality of food and the time. 
                </p>
              </div>
            </a>
          </div>
          <h3 class="text-center mt-3 texture-green">Abhishek Gautam &nbsp; <i class="fa fa-arrow-right"></i></h3>
        </div>
      </div>
    </div>
  </section>

  <section class="testimonial" style="
        background-image: url(./img/66255886about-bg.jpg) !important;
        background-size: cover;
        background-attachment: fixed;
        background-repeat: no-repeat;
      ">
    <div class="container">
      <h3 data-aos="fade-up" class="mb-5 section-title-border text-white text-center"
        style="font-family: Arial; font-size: 55px">
        SHARING GREAT FOOD TOGETHER
      </h3>
      <div class="">
        <div class="text-center">

          <p class="mb-5" data-aos="fade-up" style="font-size: 24px; color: #fff">
            At atmosphere 
          </p>

          <div class="text-center " data-aos="fade-up">
            <div data-aos="fade-up" class=" btn-container mx-auto text-center btn-container--white btn-hover"
              style="opacity: 1; transform: matrix(1, 0.00017, -0.00017, 1, 0, 0);">
              <div class="bg-image"></div>
              <a data-aos="fade-up" class="btn btn--white tra-king-js" tracking-event="engagement home"
                tracking-action="click verde way cta" href="pages/products.html">Explore Menu</a>
            </div>
          </div>
        </div>
      </div>


    </div>
    </div>
  </section>
@endsection
