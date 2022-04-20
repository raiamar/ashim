@extends('users.layout.master')
@section('title','Home')
@section('content')

{{-- <div class="stars">
                                        <label class="rate">
                                            <input type="radio" name="radio1" id="star1" value="star1">
                                            <div class="face"></div>
                                            <i class="far fa-star star one-star"></i>
                                        </label>
                                        <label class="rate">
                                            <input type="radio" name="radio1" id="star2" value="star2">
                                            <div class="face"></div>
                                            <i class="far fa-star star two-star"></i>
                                        </label>
                                        <label class="rate">
                                            <input type="radio" name="radio1" id="star3" value="star3">
                                            <div class="face"></div>
                                            <i class="far fa-star star three-star"></i>
                                        </label>
                                        <label class="rate">
                                            <input type="radio" name="radio1" id="star4" value="star4">
                                            <div class="face"></div>
                                            <i class="far fa-star star four-star"></i>
                                        </label>
                                        <label class="rate">
                                            <input type="radio" name="radio1" id="star5" value="star5">
                                            <div class="face"></div>
                                            <i class="far fa-star star five-star"></i>
                                        </label>
                                    </div> --}}


<form action="{{route('rating.submited')}}" id="rating_form" style="color: #757575;" method="POST">
    @csrf
    <input type="hidden" id="menu_id" value="{{$menu_id}}"
           name="menu_id">
    <input type="hidden" id="user_id" value="{{Auth::user()->id}}"
           name="user_id">
    <div class="pb-3">
        <span class="starRating">
        <input id="rating5" type="radio" name="rating" value="5" onclick="javascript:this.form.submit();">
        <label for="rating5">5</label>
        <input id="rating4" type="radio" name="rating" value="4" onclick="javascript:this.form.submit();">
        <label for="rating4">4</label>
        <input id="rating3" type="radio" name="rating" value="3" onclick="javascript:this.form.submit();">
        <label for="rating3">3</label>
        <input id="rating2" type="radio" name="rating" value="2" onclick="javascript:this.form.submit();">
        <label for="rating2">2</label>
        <input id="rating1" type="radio" name="rating" value="1" onclick="javascript:this.form.submit();">
        <label for="rating1">1</label>
    </span>
</form>



<style>
    .starRating:not(old) {
            display: inline-block;
            width: 7.5em;
            height: 1.5em;
            overflow: hidden;
            vertical-align: bottom;
        }

        .starRating:not(old) > input {
            margin-right: -100%;
            opacity: 0;
        }

        .starRating:not(old) > label {
            display: block;
            float: right;
            position: relative;
            background: url({{asset('frontend/images/star.png')}});
            background-size: contain;
        }

        .starRating:not(old) > label:before {
            content: '';
            display: block;
            width: 1.5em;
            height: 1.5em;
            background: url({{asset('frontend/images/star3.png')}});
            background-size: contain;
            opacity: 0;
            transition: opacity 0.2s linear;
        }

        .starRating:not(old) > label:hover:before,
        .starRating:not(old) > label:hover ~ label:before,
        .starRating:not(:hover) > :checked ~ label:before {
            opacity: 1;
        }
        .rating-block {
            background-color: #FAFAFA;
            border: 1px solid #EFEFEF;
            padding: 15px 15px 20px 15px;
            border-radius: 3px;
        }
</style>



{{-- <style type="text/css">
    .hidden {
        display: none !important;
    }

    .book-title {
        font-size: 1rem;
        font-weight: 900;
    }

    .book-author {
        font-size: 1rem;
    }

    /*rateing*/
    .wrap {
        width: 250px;
        height: 0px;
        background: #fff;
        position: absolute;
        top: 65%;
        left: 82%;
        transform: translate(-50%, -50%);
        border-radius: 10px;
    }

    .stars {
        width: fit-content;
        margin: 0 auto;
        cursor: pointer;
        background: red;
    }

    .star {
        color: #91a6ff !important;

    }

    .rate {
        height: 50px;
        margin-left: -5px;
        padding: 5px;
        font-size: 15px;
        position: relative;
        cursor: pointer;
    }

    .rate input[type="radio"] {
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, 0%);
        pointer-events: none;
    }

    .star-over::after {
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        font-size: 16px;
        content: "\f005";
        display: inline-block;
        color: #d3dcff;
        /* color: yellow; */
        z-index: 1;
        position: absolute;
        top: 17px;
        left: 10px;

    }

    .rate:nth-child(1) .face::after {
        content: "\f119";
        /* ☹ */
    }

    .rate:nth-child(2) .face::after {
        content: "\f11a";
        /* 😐 */
    }

    .rate:nth-child(3) .face::after {
        content: "\f118";
        /* 🙂 */
    }

    .rate:nth-child(4) .face::after {
        content: "\f580";
        /* 😊 */
    }

    .rate:nth-child(5) .face::after {
        content: "\f59a";
        /* 😄 */
    }

    .face {
        opacity: 0;
        position: absolute;
        width: 25px;
        height: 25px;
        background: #91a6ff;
        border-radius: 5px;
        top: -30px;
        left: 0px;
        transition: 0.2s;
        pointer-events: none;
    }

    .face::before {
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        content: "\f0dd";
        display: inline-block;
        color: #91a6ff;
        z-index: 1;
        position: absolute;
        left: 9px;
        bottom: -15px;
    }

    .face::after {
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        display: inline-block;
        color: #fff;
        z-index: 1;
        position: absolute;
        left: 5px;
        top: -1px;
    }

    .rate:hover .face {
        opacity: 1;
    }

</style> --}}

@endsection