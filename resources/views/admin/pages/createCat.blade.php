@extends('admin.layout.home')
@section('title','admin')
@section('content')
<div class="conatainer">
	<div class="row">
		<div class="col-lg-12">
			<div class="card">
				<div class="card-header"><h3>Add Category</h3></div>
				<div class="card-body">
					<form action="{{route('store.category')}}" method="POST" enctype="multipart/form-data">
						@csrf
                        @include('admin.layout.message')
						<div class="mb-3">
						  <label for="exampleFormControlInput1" class="form-label">Category</label>
						  <input type="text" class="form-control" name="cat" id="" placeholder="Enter Category">
						</div>

						<div>
							<button class="btn btn-info" type="submit">Add Category</button>
						</div>
					</form>
				</div>
			</div>
		</div>


        <div class="col-12">
            <div class="card-body">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">S.N.</th>
                      <th scope="col">Category</th>
                      <th scope="col">Action</th>
                  </thead>
                  <tbody>
                      @php $counter = 1 @endphp
                      @foreach($data as $item)
                    <tr>
                      <th scope="row">{{$counter}}</th>
                      <td>{{$item->cat}}</td>
                      <td>
                          <div class="d-flex">
                              <p><a href="{{route('remove.category', [$item->id])}}" class="btn btn-danger btn-sm m-2"><i class="fa-solid fa-trash-can"></i></a></p>
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
@endsection