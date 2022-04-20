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


    <section class="invoice">
        <div class="container mt-5 mb-5">

            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="upper p-4">
                            <div class="d-flex justify-content-between">
                                <div class="amount">
                                    <h2>Invoice</h2>
                                    <span>{{ $order_details->order_id }}</span>
                                    <br>

                                    @foreach ($invoice_created_at as $item)
                                        <small>{{ $item->created_at->toDayDateTimeString() }}</small>
                                    @endforeach

                                </div>
                                <div class="d-flex flex-row align-items-center">
                                    <a href="#" type="button" class="btn btn-danger">
                                        Unpaid</span>
                                    </a>
                                </div>
                            </div>
                            <hr>

                            <h6>Invoice to</h6>
                            <div class="delivery">
                                <div class="d-flex justify-content-between">
                                    <span class="font-weight-bold">{{ $order_details->buyer_name }}</span>
                                </div>
                            </div>
                            <div class="transaction mt-2">
                                <div class="d-flex justify-content-between">
                                    <span class="font-weight-bold">{{ $order_details->contact }}</span>
                                </div>
                            </div>
                            <div class="transaction mt-2">
                                <div class="d-flex justify-content-between">
                                    <span class="font-weight-bold">{{ $order_details->address }}
                                        [{{ $order_details->specefics }}]</span>
                                </div>
                            </div>
                            <div class="transaction mt-2">
                                <div class="d-flex justify-content-between">
                                    <span class="font-weight-bold">{{ $order_details->email }}</span>
                                </div>
                            </div>
                            <hr>

                            <h5>Order Details</h5>
                            @foreach (json_decode($order_details->details) as $key => $details)
                                <div class="transaction mt-2">
                                    <div class="d-flex justify-content-between">
                                        <?php
                                        $convert = explode(',', $details);
                                        ?>

                                        <div class="d-flex flex-row align-items-center"> <i
                                                class="fa fa-check-circle-o"></i> <span
                                                class="ml-2">{{ $convert[1] }}</span> </div>
                                        <span class="font-weight-bold">Unit: {{ $convert[2] }}</span>
                                        <span class="font-weight-bold">Rs {{ $convert[3] }}.00</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="lower bg-primary p-4 py-5 text-white d-flex justify-content-between">
                            <div class="d-flex flex-column"> <span>Total</span> </div>
                            <h3>Rs {{ $order_details->total }}.00</h3>
                        </div>
                    </div>
                </div>



                <div class="col-md-3 esewa-form">
                    <h4 style="text-align: center">Payment option</h4>
                    {{ $order_details->order_id }}
                    <form action="https://uat.esewa.com.np/epay/main" method="POST">
                        <input value="{{ $order_details->total }}" name="tAmt" type="hidden">
                        <input value="{{ $order_details->total }}" name="amt" type="hidden">
                        <input value="0" name="txAmt" type="hidden">
                        <input value="0" name="psc" type="hidden">
                        <input value="0" name="pdc" type="hidden">
                        <input value="EPAYTEST" name="scd" type="hidden">
                        <input value="{{ $order_details->order_id }}" name="pid" type="hidden">
                        <input value="{{ route('esewa.success') }}" type="hidden" name="su">
                        <input value="{{ route('esewa.fail') }}" type="hidden" name="fu">
                        <input type="image" class="image"
                            src="https://www.nepalitimes.com/wp-content/uploads/2021/07/Esewa-Remittance-Payment.png"
                            alt="Submit" width="48" height="48">
                    </form>


                    <div>
                        <a href="{{route('home.delevery')}}"><img src="https://miro.medium.com/max/1000/1*5c8KOrF2CKKQCcY67sJDWA.jpeg" class="image"></a>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
