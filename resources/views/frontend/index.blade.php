@extends('users.layout.master')
@section('content')
    <div class="banner mb-0">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://technuggets.biz/wp-content/uploads/2015/10/Helmets-banner_Tech-Nuggets.jpg"
                    class="d-block w-1000" alt="..." />
                <div class="carousel-caption d-md-block">
                    <h3 class="pt-5">Providing Quality Riding Gears</h3>
                    <h5>Helmetsss.com</h5>
                </div>
            </div>
        </div>
    </div>

    <section class="latest-helmates">
        <div class="container">
              <p class="texture-green">
               <strong class="text-9xl mr-2">Latest Product</strong>  (<a href = "/menu" class="no-underline">View All</a>)
            </p>
            
            
            <div class="row">
              @foreach ($items as $item)
                  <div class="col-3">
                      <div class="card">
                          <img class="card-img-top" src="{{ asset('uploads/product/' . $item->image) }}">
                          <div class="card-body">
                              <p class="text-center">{{ $item->menu_name }}</p>
                              <p class="text-center">Rs {{ $item->price }}.00</p>
                          </div>
                      </div>
                  </div>
              @endforeach
          </div>
        </div>
    </section>



    <section class="latest-helmates">
      <div class="container">
            <p class="texture-green">
             <strong class="text-9xl mr-2">Our Vendors</strong>  (<a href = "/specialities" class="no-underline">View All</a>)
          </p>
          <div class="row">
            @foreach ($users as $item)
                <div class="col-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('uploads/product/' . $item->image) }}">
                        <div class="card-body">
                            <p class="card-text text-center">{{ $item->name }}</p>
                            <p class="card-text text-center">{{ $item->address }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
      </div>
  </section>

    <style>
      .latest-helmates img{height: 220px}
    </style>
@endsection
