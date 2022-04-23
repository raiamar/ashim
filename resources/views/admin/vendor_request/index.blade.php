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
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12" style="overflow: auto">
                <div>
                    <div>
                        <h3>Vendor Request Lists</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="">S.N.</th>
                                    <th scope="">Name</th>
                                    <th scope="">Email</th>
                                    <th scope="">Role</th>
                                    <th scope="">Address</th>
                                    <th scope="">Contact</th>
                                    <th scope="">Action</th>
                            </thead>
                            <tbody>


                                @foreach ($users as $key => $user)
                                    <tr>
                                        <td>{{ ++$id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ ucfirst($user->role) }}</td>
                                        <td>{{ $user->address }}</td>
                                        <td>{{ $user->contact }}</td>
                                        <td>
                                            @if (Auth::user()->role == 'admin')
                                                @if ($user->role == 'user')
                                                    <form action="{{ route('admin.makeVendor') }}" method="POSt">
                                                        @csrf
                                                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                                                        <button class="btn btn-primary ml-2"
                                                            onclick="javascript:this.form.submit();">Make Vendor</button>
                                                    </form>
                                                @elseif($user->role == 'vendor')
                                                    <button class="btn btn-primary">Vendor</button>
                                                @endif
                                            @else
                                                <p style="text-align: center; color:red">Permission Denied</p>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {!! $users->links() !!}
    </div>

@endsection
