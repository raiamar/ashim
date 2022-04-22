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
                        <h3>Order Details</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">S.N.</th>
                                    <th scope="col">Order Id</th>
                                    <th scope="col">Buyer</th>
                                    <th scope="col">Item</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Specefic</th>
                                    <th scope="col">contact</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">payment</th>
                                    <th scope="col">Tracking</th>
                                    <th scope="col">Action</th>
                            </thead>
                            <tbody>


                                @foreach ($data as $key => $item)
                                    <tr>
                                        <th scope="row" style="vertical-align:middle;">{{ ++$key }}</th>
                                        <th scope="row" style="vertical-align:middle;">{{ $item->order_id }}</th>
                                        <td style="vertical-align:middle; width: 120px">{{ $item->buyer_name }}</td>
                                        <td style="vertical-align:middle; width: 120px">
                                            @foreach (json_decode($item->details) as $detail)
                                                @php
                                                    // $detail = json_decode($item->details);
                                                    $temp = explode(',', $detail);
                                                @endphp

                                                {{ $temp[1] }}<br>
                                                <hr>
                                            @endforeach
                                        </td>

                                        <td style="vertical-align:middle;">
                                            @foreach (json_decode($item->details) as $detail)
                                                @php
                                                    // $detail = json_decode($item->details);
                                                    $temp = explode(',', $detail);
                                                @endphp

                                                {{ $temp[2] }}<br>
                                                <hr>
                                            @endforeach
                                        </td>

                                        <td style="width: 80px">
                                            @foreach (json_decode($item->details) as $detail)
                                                @php
                                                    $temp = explode(',', $detail);
                                                @endphp

                                                Rs {{ $temp[3] }}<br>
                                                <hr>
                                            @endforeach
                                        </td>
                                        <td style="width: 80px">
                                            @foreach (json_decode($item->details) as $detail)
                                                @php
                                                    $temp = explode(',', $detail);
                                                    if(array_key_exists(4, $temp)){
                                                        $userid = $temp[4];
                                                        $userdata = App\Models\User::where('id', $userid);
                                                        if($userdata->exists()){
                                                            $user_name = $userdata->first()->name;
                                                        } else {
                                                            $user_name = '';
                                                        }
                                                    }
                                                    
                                                @endphp
                                                {{ $user_name }}<br>
                                                <hr>
                                            @endforeach
                                        </td>
                                        <td style="vertical-align:middle;">Rs {{ $item->total }}</td>
                                        <td style="vertical-align:middle;">{{ $item->address }}</td>
                                        <td style="vertical-align:middle;">{{ $item->specefics }}</td>
                                        <td style="vertical-align:middle;">{{ $item->contact }}</td>
                                        <td style="vertical-align:middle;">
                                            @if ($item->status == 'unpaid')
                                                <button class="btn btn-danger btn-sm m-2">{{ $item->status }}</button>
                                            @else
                                                <button class="btn btn-success btn-sm m-2">{{ $item->status }}</button>
                                            @endif
                                        </td>
                                        <td style="vertical-align:middle;">{{ $item->payment }}</td>
                                        <td style="vertical-align:middle;">
                                            <form action="{{ route('track.order', $item->id) }}" method="GET">
                                                <select name="tracking" onchange="javascript:this.form.submit();">
                                                    <option value="{{ $item->tracking }}">{{ $item->tracking }}</option>
                                                    <option value="shipping">Shipping</option>
                                                    <option value="delivered">Delivered</option>
                                                </select>
                                            </form>
                                        </td>
                                        <td style="vertical-align:middle;">
                                            <div class="d-flex">
                                                {{-- <p>
                                                    @if ($item->passed == 1)
                                                        <a href="#" class="btn btn-success btn-sm m-2">Passed</a>
                                                    @else
                                                        <a href="{{ route('pass.product', [$item->id]) }}"
                                                            class="btn btn-primary btn-sm m-2">kitchen</a>
                                                    @endif

                                                </p> --}}

                                                <p><a href="{{ route('delete.item', [$item->id]) }}"
                                                        class="btn btn-danger btn-sm m-2"><i
                                                            class="fa-solid fa-trash-can"></i></a></p>
                                            </div>
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
        {!! $data->links() !!}
    </div>

@endsection
