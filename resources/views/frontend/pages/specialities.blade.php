@extends('users.layout.master')
@section('title', 'Home')
@section('content')


    <section class="fff-content">

        <div class="backgorund-store">
            <img src="https://technuggets.biz/wp-content/uploads/2015/10/Helmets-banner_Tech-Nuggets.jpg"
                    class="d-block w-1000" alt="..." />
        </div>
        <div id="booking" class="section">
            <section id="vendor-listing-wrapper" class="py-5">
                <div class="container">
                    <div class="row">
            

                        @php
                            $vendor = App\Models\User::where('role', 'vendor')->get();
                        @endphp



                        <div class="row">
                            @foreach ($vendor as $vendors)
                            <div class="col-4 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="vendor-wrap d-flex">
                                            <div class="vendor">
                                                <div class="test">
                                                    <img src="{{ asset('uploads/avatar/' . $vendors->image) }}"
                                                        class="img-fluid pic-1">
                                                </div>
                                            </div>
                                            <div class="vendor-content ml-3">
                                                <label for="name" class="m-0 font-weight-bold">{{ $vendors->name }}</label>
                                                <br>
                                                <label for="name" class="m-0 font-weight-bold">{{ $vendors->address }}</label><br>
                                                <label for="name" class="m-0 font-weight-bold">{{ $vendors->contact }}</label>

                                                <br><br>
                                                <a href="{{route('visti.shop', $vendors->id)}}">Visit shop</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>



@endsection
@section('css')
    <style>
        .backgorund-store img{
            background-repeat: no-repeat;
            width: 100%;
        }

        .vendor img {
            max-height: 120px;
            min-height: 120px;
            object-fit: cover;
            border: 1px solid gray;
            /* object-position: center; */
            width: 120px;
        }

    </style>
