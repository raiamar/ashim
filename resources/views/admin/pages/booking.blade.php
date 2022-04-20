@extends('admin.layout.home')
@section('title', 'admin')
@section('content')
    <div class="conatainer">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <div class="card-header">
                        <h3>Table Booking</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">S.N.</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">People</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($table as $key => $item)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $item->full_name }}</td>
                                        <td>{{ $item->booking_email }}</td>
                                        <td>{{ $item->booking_date }}</td>
                                        <td>{{ $item->time }}</td>
                                        <td>{{ $item->booking_seat }}</td>
                                        <td>{{ $item->booking_phone }}</td>
                                        <td>
                                            <div class="d-flex">
                                                @if ($item->booking_status == 'verified')
                                                    <button class="btn btn-success">Verified</button>
                                                @else
                                                    <form action="{{ route('verify.reservation') }}" method="GET">
                                                        <input type="hidden" name="rId" value="{{ $item->id }}">
                                                        <select name="status" class="form-select btn btn-info"
                                                            onchange="javascript:this.form.submit();"
                                                            style="color: aliceblue; padding:2px">
                                                            <option value="pending">Pending</option>
                                                            <option value="verified">verify</option>
                                                        </select>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <p><a href="{{ route('delete.table', [$item->id]) }}"
                                                    class="btn btn-danger btn-sm m-2"><i
                                                        class="fa-solid fa-trash-can"></i></a></p>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-center">
                        {!! $table->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
