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
    <div class="conatainer">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Menu List</h3>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">S.N.</th>
                                    <th scope="col">Product Item</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Items</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($menu as $key =>$item)
                                    <tr>
                                        <th scope="row">{{ ++$key}}</th>
                                        <td>{{ $item->menu_name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>Rs.{{ $item->price }}</td>
                                        <td><img src="{{ asset('uploads/product/' . $item->image) }}" height="100px"
                                                width="100px"></td>
												<td>
													<form action="{{route('change.menu.status',[$item->id])}}" method="POST">
														@csrf
														<div class="form-check form-check-solid form-switch fv-row">
															<input class="form-check-input w-45px h-30px"
																onchange="javascript:this.form.submit();" type="checkbox"
																id="status_{{ $item->id }}" value="1"
																@if ($item->status) checked @endif name="status" />
														</div>
													</form>
												</td>

                                        <td>
                                            <div class="d-flex">

                                                <p><a href="{{ route('edit.product', [$item->id]) }}"
                                                        class="btn btn-primary btn-sm m-2"><i
                                                            class="fa-solid fa-pen-to-square"></i>Edit</a></p>

                                                <p><a href="{{ route('delete.product', [$item->id]) }}"
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
		{!! $menu->links() !!}
	</div>
@endsection
