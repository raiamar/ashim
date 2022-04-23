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
                                <input type="text" class="form-control" name="menu_name" value="{{ old('menu_name') }}"  id=""
                                    placeholder="Enter Product Name">
                                @error('menu_name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Product Name</label>
                                <select class="form-control" name="cat">
                                    <option value="">Select Category</option>
									<?php $data = App\Models\Category::all(); ?>
									@foreach($data as $item)
                                    <option value="{{$item->cat}}" {{ old('cat') == $item->cat ? 'selected' : '' }}>{{$item->cat}}</option>
									@endforeach
                                </select>
                                @error('cat')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="" class="form-label">Product Description</label>
                                <textarea class="form-control" name="description" id="" rows="3">{{ old('description') }}</textarea>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Product Price</label>
                                <input type="text" class="form-control" name="price" value="{{ old('price') }}" id="" placeholder="Enter Product Price">
                                @error('price')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Product Image</label>
                                <input type="file" class="form-control" name="image" id="">
                                @error('image')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
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
