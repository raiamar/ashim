@extends('admin.layout.home')
@section('content')
    <div class="conatainer">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    @include('frontend.layout.message')
                    <div class="card-header">
                        <h3>Customer Inquery</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">S.N.</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Contact</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($table as $key => $item)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->subject }}</td>
                                        <td>{{ $item->details }}</td>
                                        <td>
                                            <div class="d-flex">
                                                @if ($item->status == 'read')
                                                    <button class="btn btn-success">Read</button>
                                                @else
                                                    <form action="{{ route('mark.inquery') }}" method="GET">
                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                        <input type="hidden" name="status" value="{{ $item->status }}">
                                                        <button class="btn btn-warning" onclick="javascript:this.from.submit()">New</button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                        <td>
                                            <p><a href="{{ route('delete.inquery', [$item->id]) }}"
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
