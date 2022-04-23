@extends('admin.layout.home')
@section('content')
    <div class="conatainer">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Edit Products</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('update.product') }}" method="POST">

                            @csrf
                            <input type="hidden" name="id" value="{{ $item->id }}">

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Product Name</label>
                                <input type="text" class="form-control" value="{{ $item->menu_name }}" name="menu_name"
                                    id="" placeholder="Enter Menu Name">
                                @error('menu_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Product Category</label>
                                <select class="form-control" name="cat">

                                    <option value="{{ $item->category }}">{{ $item->category }}</option>
                                    <?php $data = App\Models\Category::all(); ?>
                                    @foreach ($data as $items)
                                        <option value="{{ $items->cat }}">{{ $items->cat }}</option>
                                    @endforeach

                                </select>
                                @error('cat')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="" class="form-label">Product Description</label>
                                <textarea class="form-control" name="description" id="" rows="3">{{ $item->description }}</textarea>
                                @error('description')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Peoduct Price</label>
                                <input type="text" class="form-control" value="{{ $item->price }}" name="price" id=""
                                    placeholder="Enter Menu Price">
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
                                <button class="btn btn-info" type="submit">Update</button>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
