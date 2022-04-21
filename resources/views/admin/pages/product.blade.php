@extends('admin.layout.home')
@section('title', 'admin')
@section('content')
    <div class="conatainer">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Add Products</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @include('admin.layout.message')
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Product Name</label>
                                <input type="text" class="form-control" name="menu_name" id=""
                                    placeholder="Enter Product Name">
                            </div>


                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Product Name</label>
                                <select class="form-control" name="cat">
                                    <option>Select Category</option>
									<?php $data = App\Models\Category::all(); ?>
									@foreach($data as $item)
                                    <option value="{{$item->cat}}">{{$item->cat}}</option>
									@endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Product Description</label>
                                <textarea class="form-control" name="description" id="" rows="3"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Product Price</label>
                                <input type="text" class="form-control" name="price" id="" placeholder="Enter Product Price">
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Product Image</label>
                                <input type="file" class="form-control" name="image" id="">
                            </div>

                            <div>
                                <button class="btn btn-info" type="submit">Add Product</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
