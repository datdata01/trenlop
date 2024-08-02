@extends('admin.layout.default')







@push('style')

@endpush



@section('content')
    <div class='p-4' style='min-height:800px;'>
        <form action="{{route('admin.product.addPostProduct')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class='mb-3'>
                <label for="nameProduct">name product</label>
                <input type='text' class="form-control" placeholder="name" id='nameProduct' name="name">
            </div>
            <div class='mb-3'>
                <label for="nameProduct">price</label>
                <input type='number' class="form-control" placeholder="price" id='nameProduct' name="price">
            </div>
            <div class='mb-3'>
                <label for="nameProduct">image</label>
                <input type='file' class="form-control" placeholder="name" id='nameProduct' name="imageProduct">
            </div>
            <button type="submit" class="btn btn-success">add</button>
            
        </form>

    </div>
@endsection



@push('script')

@endpush