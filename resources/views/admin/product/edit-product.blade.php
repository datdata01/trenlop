@extends('admin.layout.default')

@push('style')
@endpush

@section('content')
    <div class='p-4' style='min-height:800px;'>
        <form action="{{ route('admin.product.updateProduct') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mt-3">
                <input type="hidden" value="{{ $product->id }}" name="id">
            </div>
            <div class='mb-3'>
                <label for="nameProduct">Name Product</label>
                <input type='text' class="form-control" placeholder="Name" id='nameProduct' name="name" value="{{ $product->name }}">
            </div>
            <div class='mb-3'>
                <label for="priceProduct">Price</label>
                <input type='number' class="form-control" placeholder="Price" id='priceProduct' name="price" value="{{ $product->price }}">
            </div>
            <div class='mb-3'>
                <label for="viewProduct">View</label>
                <input type='number' class="form-control" placeholder="View" id='viewProduct' name="view" value="{{ $product->view }}">
            </div>
            <div class='mb-3'>
                <label for="imageProduct">Image</label>
                <input type='file' class="form-control" id='imageProduct' name="imageProduct">
                <img src="{{ asset($product->image) }}" alt="Product Image" width="100" >
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
@endsection

@push('script')
@endpush
