@extends('admin.layout.home')
@section('title', 'admin')
@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::get('fail'))
        <div class="alert alert-danger">
            {{ Session::get('fail') }}
        </div>
    @endif
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1></h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ auth()->user()->getImage(auth()->user()->image) }}"
                                    alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center"><i class="fas fa-user"></i>
                                {{ Auth::user()->name }}
                            </h3>
                            <p class="text-center"><i class="fas fa-envelope"></i> {{ Auth::user()->email }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link" href="#change-password"
                                        data-toggle="tab">Change Password</a></li>
                                <li class="nav-item"><a class="nav-link" href="#change-email"
                                        data-toggle="tab">Change
                                        Email</a></li>
                                <li class="nav-item"><a class="nav-link" href="#change-image"
                                        data-toggle="tab">Change
                                        Image</a></li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="tab-pane" id="change-password">
                                    <form class="form-horizontal" method="POST"
                                        action="{{ route('admin.changepassword') }}">
                                        @csrf
                                        @foreach ($errors->all() as $error)
                                            <p class="text-danger">{{ $error }}</p>
                                        @endforeach
                                        <div class="form-group row">
                                            <label for="password" class="col-sm-2 col-form-label">Current
                                                Password</label>
                                            <div class="col-sm-10">
                                                <input type="password" class="form-control" id="password"
                                                    name="current_password" autocomplete="current-password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="new_password" class="col-sm-2 col-form-label">New
                                                Password</label>
                                            <div class="col-sm-10">
                                                <input id="new_password" type="password" class="form-control"
                                                    name="new_password" autocomplete="current-password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputName2" class="col-sm-2 col-form-label">Confirm New
                                                Password</label>
                                            <div class="col-sm-10">
                                                <input id="new_confirm_password" type="password" class="form-control"
                                                    name="new_confirm_password" autocomplete="current-password">
                                            </div>
                                        </div>
                                        <div class="offset-sm-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="change-email">
                                    <form class="form-horizontal" method="POST" action="{{ route('admin.changeEmail') }}">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" id="email" placeholder="Email"
                                                    value="{{ Auth::user()->email }}" readonly="readonly">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">New Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" class="form-control" name="email" id="email"
                                                    placeholder="Enter your new email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" name="name" id="name"
                                                    value="{{ auth()->user()->name }}" placeholder="Enter your new email">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="change-image">
                                    <form class="form-horizontal" method="POST" action="{{ route('admin.changeUserImage') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="image" class="col-sm-2 col-form-label">Choose Image:</label>
                                            <div class="col-sm-10">
                                                <input type="file" class="form-control" name="image" id="img">
                                            </div>
                                            <img id="imgPreview"
                                                src="{{ auth()->user()->getImage(auth()->user()->image) }}" alt=""
                                                style="width: 100px; height: 100px;">
                                        </div>

                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script>
        $(document).ready(function() {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    let reader = new FileReader();
                    reader.onload = function(e) {
                        $("#imgPreview").attr('src', e.target.result).width(100).height(100);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            $("#img").change(function() {
                readURL(this);
            })
        });
    </script>
@endsection
