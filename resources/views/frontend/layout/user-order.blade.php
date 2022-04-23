@extends('admin.layout.home')
@section('content')

<section class="content">
    <div class="container-fluid">
        @if(isset($data))

        <div class="card-header">
            <h3>My Purchase</h3>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">S.N.</th>
                        <th scope="col">Buyer</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Address</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                        <th scope="col">Tracking</th>
                </thead>
                <tbody>
                    {{-- @foreach ($data as $key => $item) --}}
                        <tr>
                            <th scope="row">#</th>
                            <td>{{ $data->buyer_name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->contact }}</td>
                            <td>{{ $data->address }}</td>
                            <td>Rs {{ $data->total }}.00</td>
                            <td>{{ $data->status}}</td>
                            <td>{{ $data->tracking }}</td>
                        </tr>
                    {{-- @endforeach --}}
                </tbody>
            </table>
        </div>





        @else
            <div class="margin-auto">
                <p class="text-center m-5 p-5"> No purchase Yet</p>
            </div>
        @endif
    </div>
</section>

@endsection