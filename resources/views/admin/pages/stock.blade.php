@extends('admin.layout.home')
@section('title','admin')
@section('content')
<div class="conatainer">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				@include('frontend.layout.message')
				<div class="card-header d-flex">
					<div><h3>Stock Product</h3></div>
					<div><a href="{{route('inventory')}}" class="text-primary m-2"><i class="fa-solid fa-pen-to-square"></i>Add</a></div>
				</div>
				<div class="card-body">
					<table class="table">
					  <thead>
					    <tr>
					      <th scope="col">S.N.</th>
					      <th scope="col">Supplier Name</th>
					      <th scope="col">Inventory</th>
					      <th scope="col">Inventory Type</th>
					      <th scope="col">Stock</th>
					      <th scope="col">Action</th>
					  </thead>
					  <tbody>
					  	@php $counter = 1 @endphp
					  	@foreach($inventory as $data)
					    <tr>
					      <th scope="row">{{$counter}}</th>
					      <td>{{$data->supplier_name}}</td>
					      <td>{{$data->inventory_item}}</td>
					      <td>{{$data->inventory_type}}</td>
					      <td>{{$data->stock_quantity}}</td>
					      <td>
					      	<div class="d-flex">

					      		<p><a href="{{route('edit.inventory', [$data->id])}}" class="btn btn-primary btn-sm m-2"><i class="fa-solid fa-pen-to-square"></i>Edit</a></p>

					      		<p><a href="{{route('delete.inventory', [$data->id])}}" class="btn btn-danger btn-sm m-2"><i class="fa-solid fa-trash-can"></i></a></p>
					      	</div>
					      </td>
					    </tr>
					    @php $counter++ @endphp
					    @endforeach
					  </tbody>
					</table>					
				</div>
			</div>
		</div>
	</div>
</div>
@endsection