@extends('admin.layout.home')
@section('title','admin')
@section('content')
<div class="conatainer">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header"><h3>Add Inventory</h3></div>
				<div class="card-body">
					<form action="{{route('store.inventory')}}" method="POST">
					@include('frontend.layout.message')
						@csrf
						<div class="mb-3">
						  <label for="exampleFormControlInput1" class="form-label">Supplier Name</label>
						  <input type="text" class="form-control" name="supplier_name" id="" placeholder="Enter Supplier Name">
						</div>

						<div class="mb-3">
						  <label for="" class="form-label">Inventory</label>
						  <input type="text" class="form-control" name="inventory_item" id=""placeholder="Enter Inventory">
						</div>

						<div class="mb-3">
						  <label for="" class="form-label">Inventory Type</label>
						  <input type="text" class="form-control" name="inventory_type" id=""placeholder="Enter Inventory">
						</div>

						<div class="mb-3">
						  <label for="exampleFormControlInput1" class="form-label">Stock</label>
						  <input type="text" class="form-control" name="stock_quantity" id="" placeholder="Enter Inventory">
						</div>

						<div>
							<button class="btn btn-info text-white" type="submit">Add Inventory</button>
						</div>

						
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection