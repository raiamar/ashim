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


    @if (session('cart'))
        <div class="container mt-5 mb-5">
            <form action="{{ route('place.order') }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-6 mt-0">

                        <div class="card" style="width: 30rem;">
                            <div class="card-body">
                                <h4 class="card-title">{{ __('1. User Details') }}</h4>

                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" value="{{ Auth::user()->name }}" class="form-control"
                                                placeholder="Full name" name="buyer_name" required>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="Contact number"
                                                value="{{ Auth::user()->contact }}" name="buyer_contact" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group mb-3">
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" value="{{ Auth::user()->address }}" class="form-control"
                                                name="address" required>
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control" placeholder="like: near ganesh mandir"
                                                name="specefic" required>
                                        </div>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <input type="email" value="{{ Auth::user()->email }}" class="form-control mb-1"
                                        name="email" aria-describedby="emailHelp" placeholder="Enter email" required>
                                    <small id="emailHelp" class="form-text text-muted">You'll receive further information in
                                        provided email.</small>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">

                        <div class="container template-cart_place_order mb 5">
                            <h2 class="shoping_cart">{{ __('SUMMERY') }}</h2>
                            <hr>

                            @if (session('cart'))
                                <?php $total = 0; ?>
                                @foreach (session('cart') as $id => $item)
                                    <?php $total += $item['price'] * $item['quantity']; ?>
                                    <?php $uniqueOrderId = '#' . $id . crc32(uniqid()); ?>
                                    <input type="hidden" name="product_details[]" value="{{ $item['id'] }}, {{ $item['name'] }}, {{$item['quantity']}}, {{ $item['price'] * $item['quantity'] }}, {{ $item['user_id'] }}">
                                    <input type="hidden" name="order_id" value="<?php echo $uniqueOrderId; ?>">
                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <table class="table">
                                        <tbody>
                                            <td>
                                                <?php
                                                $check_file = $item['image'];
                                                ?>
                                                @if (isset($check_file))
                                                    <img src="{{ asset('uploads/product/' . $item['image']) }}"
                                                        style="width: 40px; height:40px">
                                                @else
                                                    <img src="{{ asset('image/no_image.jpg') }}" alt="no image" style="width: 40px; height:40px">
                                                @endif
                                            </td>
                                            <td class="cart_template_name">{{ $item['name'] }}</td>

                                            <td class="template_price">Rs {{ $item['price'] * $item['quantity'] }}.00
                                            </td>
                                        </tbody>
                                    </table>
                                @endforeach



                                <div class="add_cart_footer mb-5 mt-3">

                                    <tfoot style="border: none">
                                        <tr>
                                            <td colspan="5" class="text-right border-none">
                                                <input type="hidden" name="total" value="{{ $total }}">
                                                <span class="float-right p-1">Total: Rs {{ $total }}.00</span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                    <br>
                                    <button class="btn btn-primary" type="submit">{{ __('Place Order') }}<i
                                            class="fa fa-angle-right"></i></button>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </form>
        </div>
    @else
        <div class="no_items_in_cart mb-5">
            <span>{{ __('We have already received your order! Thank you') }} <a
                    href="{{ url('shops') }}">{{ __('Continue Shopping') }}</a> </span>
        </div>
    @endif
@endsection
