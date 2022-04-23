@extends('users.layout.master')
<link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@section('body')
    <nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="#">Laravel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>


    <div class="container template-cart mt-5 mb 5">
        @include('frontend.layout.message')
        <h2 class="shoping_cart">{{ __('PRODUCT COMPARISON') }}</h2>
        <table class="table table-bordered" style="text-align: center; vertical-align: middle;">
            <thead>
                <tr>
                    <form method="post" action="">
                        @csrf
                        <th style="text-align: center; vertical-align: middle;">#</th>
                        <th>
                            <label>Product 1</label>
                            <select class="form-control select2" name="first_product">
                                <option value="">Select</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" {{ $ids['first'] == $product->id ? 'selected' : '' }}>{{ $product->menu_name }}</option>
                                @endforeach
                            </select><br />
                            <button class="btn btn-success form-control">Submit</button>
                        </th>
                        <th>
                            <label>Product 2</label>
                            <select class="form-control select2" name="second_product">
                                <option value="">Select</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" {{ $ids['second'] == $product->id ? 'selected' : '' }}>{{ $product->menu_name }}</option>
                                @endforeach
                            </select><br />
                            <button class="btn btn-success form-control">Submit</button>
                        </th>
                        <th>
                            <label>Product 3</label>
                            <select class="form-control select2" name="third_product">
                                <option value="">Select</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}" {{ $ids['third'] == $product->id ? 'selected' : '' }}>{{ $product->menu_name }}</option>
                                @endforeach
                            </select><br />
                            <button class="btn btn-success form-control">Submit</button>
                        </th>
                    </form>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key => $value)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $value['first'] }}</td>
                        <td>{{ $value['second'] }}</td>
                        <td>{{ $value['third'] }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    {{-- <script src="https://code.jquer.com/jquer-3.5.1.min.js"></script> --}}
    <script>
        function updateCart(product_id) {
            $.ajax({
                url: "{{ route('update.cart') }}",
                type: 'GET',
                data: {
                    product_id: product_id
                },
                success: function(res) {
                    $("#ajaxCart").html(res);
                }
            })
        }
    </script>
@endsection
