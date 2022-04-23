@extends('users.layout.master')
@section('content')
    @include('frontend.layout.message')
    <div class="menu-banner page-banner">
        <img width="100%" src="https://shop-indianmotorcycle.com/media/catalog/category/categorie_men-helmet.jpg" alt="" />
        <div class="menu-banner-content">
            <div class="container">
                <h3 class="text-white text-uppercase text-center">All Products</h3>
                <h1 class="text-white text-center mb-4">Helmets and Accessories</h1>
            </div>
        </div>
    </div>


    <section class="menus">
        <div class="container">
            <div class="row">
                @if (count($menu) > 0)
                    @foreach ($menu as $item)
                        <div class="col-md-6">
                            <div class="card p-3 mb-3">
                                <a href="#" class="row">
                                    <div class="col-md-3">
                                        <div class="appitizers-img"><img
                                                src="{{ asset('uploads/product/' . $item->image) }}" height="100%"
                                                width="100px"></div>
                                    </div>
                                    <div class="col-md-9 ">
                                        <div class="row">
                                            <h4 class="book-title col-8">{{ $item->menu_name }}</h4>
                                            <h6 class="text-center book-author col-4">
                                                <b>Rs.</b><span>{{ $item->price }}.00</span>
                                            </h6>

                                            <div class=" mb-2 ml-3">
                                                <link rel="stylesheet"
                                                    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
                                                    integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw=="
                                                    crossorigin="anonymous" referrerpolicy="no-referrer" />
                                                <div class="ratings stars">
                                                    @for ($i = 0; $i < 5; ++$i)
                                                        @php
                                                            echo '<i class="fa fa-star',
                                                        (round($item->avgRating(),1)==$i+.1?'-o':'')
,
                                                        (round($item->avgRating(),1)==$i+.2?'-o':''),
                                                        (round($item->avgRating(),1)==$i+.3?'-o':''),
                                                        (round($item->avgRating(),1)==$i+.4?'-o':''),
                                                        (round($item->avgRating(),1)==$i+.5?'-half':''),
                                                        (round($item->avgRating(),1)==$i+.6?'-half':''),
                                                        (round($item->avgRating(),1)==$i+.7?'-half':''),
                                                        (round($item->avgRating(),1)==$i+.8?'-half':''),
                                                        (round($item->avgRating(),1)==$i+.9?'-half':''),
                                                        (round($item->avgRating(),1)<=$i?'-o':''),
                                                        '" aria-hidden="true"></i>';
                                                            echo "\n";
                                                        @endphp
                                                    @endfor
                                                    @php
                                                        $totalRating = round($item->avgRating(), 1);
                                                        echo "($totalRating)";
                                                        echo "\n";
                                                    @endphp

                                                </div>
                                            </div>
                                        </div>
                                        <p class="book-description">{{ Str::limit($item->description, 100) }}</p>
                                    </div>
                                </a>
                                <br>

                                <?php $cart_product = session()->get('cart', []); ?>
                                @if (isset($cart_product[$item->id]))
                                    <button class="btn btn-success" style="width: 30%; margin-left: 70%;">Added</button>
                                @else
                                    <div>
                                        @if (Auth::user())
                                            @php
                                                $check = \App\Models\UserOrder::where([['user_id', Auth::user()->id], ['status', 'paid']])->first();
                                            @endphp


                                            <!-- Modal -->
                                            <div class="modal fade" id="rateItem" tabindex="-1" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Rate Item</h5>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>


                                                        <div class="modal-body">
                                                            <form action="{{ route('rating.submited') }}" method="POST">
                                                                @csrf
                                                                <input type="hidden" id="mId" name="menu_id">
                                                                <input type="hidden" id="user_id"
                                                                    value="{{ Auth::user()->id }}" name="user_id">
                                                                <span class="starRating">
                                                                    <input id="rating5" type="radio" name="rating" value="5"
                                                                        onclick="javascript:this.form.submit();">
                                                                    <label for="rating5">5</label>
                                                                    <input id="rating4" type="radio" name="rating" value="4"
                                                                        onclick="javascript:this.form.submit();">
                                                                    <label for="rating4">4</label>
                                                                    <input id="rating3" type="radio" name="rating" value="3"
                                                                        onclick="javascript:this.form.submit();">
                                                                    <label for="rating3">3</label>
                                                                    <input id="rating2" type="radio" name="rating" value="2"
                                                                        onclick="javascript:this.form.submit();">
                                                                    <label for="rating2">2</label>
                                                                    <input id="rating1" type="radio" name="rating" value="1"
                                                                        onclick="javascript:this.form.submit();">
                                                                    <label for="rating1">1</label>
                                                                </span>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif


                                        @if (isset($check))
                                            <div class="d-flex">
                                                <button style="width: 30%; margin-left: 30%;" type="button"
                                                    class="btn btn-primary ratingItem" data-toggle="modal"
                                                    data-target="#rateItem" data-id="{{ $item->id }}">
                                                    Rate Item
                                                </button>

                                                <button class="btn btn-dark d-block text-uppercase"
                                                    style="width: 30%; margin-left: 10%;"><a class="no-underline"
                                                        href="{{ route('add.to.cart', $item->id) }}">{{ __('ADD TO CART') }}</a></button>
                                            </div>
                                        @else
                                            <button class="btn btn-dark d-block text-uppercase"
                                                style="width: 30%; margin-left: 70%;"><a class="no-underline"
                                                    href="{{ route('add.to.cart', $item->id) }}">{{ __('ADD TO CART') }}</a></button>
                                        @endif

                                    </div>
                                @endif

                                {{-- <a href="{{ route('rate.page', $item->id) }}"> Rate</a> --}}




                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-6">
                        <div class="card p-3 mb-3 mt-5">
                            <p>No Product Found.</p>
                        </div>
                       
                    </div>
                @endif
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {!! $menu->links() !!}
        </div>
    </section>

@section('scripts')
    <script>
        $(document).on("click", ".ratingItem", function() {
            var menuId = $(this).data('id');
            $(".modal-body #mId").val(menuId);
        });
    </script>
@stop
<style>
    .stars {
        width: fit-content;
        margin: 0 auto;
        cursor: pointer;
    }

    .ratings i {
        font-size: 18px;
        color: gold;
        margin-right: 5px
    }




    .starRating:not(old) {
        display: inline-block;
        width: 7.5em;
        height: 1.5em;
        overflow: hidden;
        vertical-align: bottom;
    }

    .starRating:not(old)>input {
        margin-right: -100%;
        opacity: 0;
    }

    .starRating:not(old)>label {
        display: block;
        float: right;
        position: relative;
        background: url({{ asset('frontend/images/star.png') }});
        background-size: contain;
    }

    .starRating:not(old)>label:before {
        content: '';
        display: block;
        width: 1.5em;
        height: 1.5em;
        background: url({{ asset('frontend/images/star3.png') }});
        background-size: contain;
        opacity: 0;
        transition: opacity 0.2s linear;
    }

    .starRating:not(old)>label:hover:before,
    .starRating:not(old)>label:hover~label:before,
    .starRating:not(:hover)> :checked~label:before {
        opacity: 1;
    }

    .rating-block {
        background-color: #FAFAFA;
        border: 1px solid #EFEFEF;
        padding: 15px 15px 20px 15px;
        border-radius: 3px;
    }

</style>

@endsection
