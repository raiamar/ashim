@extends('users.layout.master')
@section('title', 'Home')
@section('content')
    <div class="menu-banner page-banner">
        <div class="menu-banner-content">
            <div class="container">
                @include('frontend.layout.message')
                <h3 class="text-center text-uppercase">CONTACT US</h3>
                <h1 class="text-center texture-green">
                    Give us a call for the Enquiries.
                </h1>
            </div>
        </div>
    </div>
    <section class="location">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-center mb-3" style="font-family: fantasy">
                        Great Kupondol Tole Lalitpur
                    </h3>
                    <div class="mapouter">
                        <div class="gmap_canvas"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.004092775572!2d85.31581561462855!3d27.68626838280063!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19f3a925b247%3A0xc6d3f372d78e351!2sAtmosphere%20restro%20%26%20events!5e0!3m2!1sen!2snp!4v1648042856235!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe><br>
                            <style>
                                .mapouter {
                                    position: relative;
                                    text-align: right;
                                    height: 273px;
                                    width: 600px;
                                }

                            </style><a href="https://www.embedgooglemap.net">google maps embed wordpress</a>
                            <style>
                                .gmap_canvas {
                                    overflow: hidden;
                                    background: none !important;
                                    height: 273px;
                                    width: 600px;
                                }

                            </style>
                        </div>
                    </div>
                    <div>
                        <p class="text-center  mt-3" style="font-size: 24px;">
                            <i class="fa fa-map-marker-alt"></i>
                            <br>
                            Kathmandu <br>
                            Kupondol Lalitpur <br>
                            Nepal
                        </p>
                        <p class="text-center  mt-3" style="font-size: 24px;">
                            <i class="fa fa-phone"></i>
                            <br>
                            852789456123
                        </p>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="text-center mb-3" style="font-family: fantasy">
                        Dee Why Kathmandu
                    </h3>
                    {{-- <div class="mapouter">
                        <div class="gmap_canvas"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.004092775572!2d85.31581561462855!3d27.68626838280063!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19f3a925b247%3A0xc6d3f372d78e351!2sAtmosphere%20restro%20%26%20events!5e0!3m2!1sen!2snp!4v1648042856235!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe><br>
                            <style>
                                .mapouter {
                                    position: relative;
                                    text-align: right;
                                    height: 273px;
                                    width: 600px;
                                }

                            </style><a href="https://www.embedgooglemap.net">google maps embed wordpress</a>
                            <style>
                                .gmap_canvas {
                                    overflow: hidden;
                                    background: none !important;
                                    height: 273px;
                                    width: 600px;
                                }

                            </style>
                        </div>
                    </div> --}}


                    <p class="text-center  mt-3" style="font-size: 24px;">
                        <i class="fa fa-map-marker-alt"></i>
                        <br>
                        838A <br> Nepal Eastern Asia
                    </p>
                    <p class="text-center  mt-3" style="font-size: 24px;">
                        <i class="fa fa-phone"></i>
                        <br>
                        0431 695 222
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="contact-form">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="text-center texture-green mb-5">Enquiries ?</h1>
                    <form action="{{ route('submit.inquiry') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            @if (Auth::user())
                                <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control">
                            @else
                                <input type="text" name="name" placeholder="Full Name" class="form-control">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            @endif

                        </div>
                        <div class="form-group">
                            @if (Auth::user())
                                <input type="email" name="email" required value="{{ Auth::user()->email }}"
                                    class="form-control" required>
                            @else
                                <input type="email" name="email" required placeholder="Email Address" class="form-control"
                                    required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            @endif

                        </div>
                        <div class="form-group">
                            @if (Auth::user())
                                <input type="text" name="phone" value="{{ Auth::user()->contact }}"
                                    class="form-control">
                            @else
                                <input type="text" name="phone" placeholder="Phone" class="form-control">
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            @endif

                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" placeholder="Subject" class="form-control" required>
                            @error('subject')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea type="text" name="details" rows="8" placeholder="Your Description" class="form-control" required></textarea>
                            @error('details')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button class="texture-green buy-btn">Submit</button>
                    </form>
                </div>

                <div class="col-md-6">
                    <h1 class=" texture-green mb-4 text-center">We deliver to ?</h1>
                    <strong class="text-center"><p class="" style="font-size: 22px;">All Nepal Delivery.</p></strong>
                    <br>
                </div>
            </div>
        </div>
    </section>
@endsection
