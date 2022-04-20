@extends('users.layout.master')
@section('content')
    <div class="container m-5">
        <div class="d-flex justify-content-center h-100">
            <div class="" style="background-color: lightgray;">
                <div class="card-header">
                    <h3>{{ __('Verify Your Email Address') }}</h3>
                </div>
                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif


                    {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit"
                                class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                        </form>
                </div>
            </div>
        </div>
    </div>


    @include('auth.style')
    <div style="border: 1px solid white" class="m-5"></div>
    <br>
@endsection
