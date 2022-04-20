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
        <h2 class="shoping_cart">{{ __('SHOPPING CART') }}</h2>

        @if (session('cart'))
        <div id="ajaxCart">
            <table class="table">
                <thead>
                    <tr>
                        <th class="template_list_heading" scope="col">{{ __('ITEMS') }}</th>
                        <th></th>
                        <th class="template_list_heading" scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; ?>
                    @foreach (session('cart') as $id => $item)
                        <?php $total += $item['price'] * $item['quantity']; ?>
                        <tr data-id="{{ $id }}">
                            <td>
                                <?php
                                $check_file = ($item['image']);
                                ?>
                                @if (isset($check_file))
                                    <img src="{{ asset('uploads/product/'. $item['image']) }}">
                                @else
                                    <img src="{{ asset('image/no_image.jpg') }}" alt="no image">
                                @endif
                            </td>
                            <td class="cart_template_name">{{ $item['name'] }}</td>

                            <td class="template_price">Rs {{ $item['price'] * $item['quantity'] }}.00</td>

                            <td> <input type="number" onchange="updateCart({{$item['id']}})" min="1" name="quantity" value="{{ $item['quantity'] }}" style="width: 15%"> </td>

                            <td class="actions" data-th="">
                                <a type="button" href="{{ route('remove.from.cart', $item['id']) }}" class="p-1 text-center remove-from-cart" data-toggle="tooltip"
                                    data-placement="top" title="Remove Template"><i class="fa-solid fa-xmark"></i></a>
                            </td>
                        </tr>
                    @endforeach

                </tbody>


                <div class="add_cart_footer mb-5">
                    <tfoot style="border: none">
                        <tr>
                            <td colspan="5" class="text-right border-none">
                                <span class="float-right p-1">Total: Rs {{ $total }}.00</span>
                            </td>
                        </tr>
                        <br>
                        <tr>
                            <td colspan="5" class="text-right border-none">
                                <a href="{{ url('menu') }}" class="btn btn-primary"><i class="fa fa-angle-left"></i>
                                    Continue
                                    Shopping</a>
                                <a class="btn btn-success" href={{route('checkout')}}>Checkout</a>
                            </td>
                        </tr>
                    </tfoot>
                </div>
            </table>
        </div>
        @else
            <div class="no_items_in_cart mb-5">
                <span>{{ __('You have nothing in your  cart.') }} <a
                        href="{{ url('menu') }}">{{ __('Continue Shopping') }}</a> </span>
            </div>
        @endif
    </div>

{{-- <script src="https://code.jquer.com/jquer-3.5.1.min.js"></script> --}}
    <script>
        function updateCart(product_id){
            $.ajax({
                url: "{{ route('update.cart')}}",
                type: 'GET',
                data: {product_id : product_id},
                success: function(res){
                    $("#ajaxCart").html(res);
                }
            })
        }
    </script>
@endsection
