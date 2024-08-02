@extends('admin.layout.default')

@section('content')
<div class="p-4" style="min-height: 800px;">
    <h4 class="text-primary mb-4">Danh sách sản phẩm</h4>
 
    <a href="{{ route('admin.product.addProduct') }}" class="btn btn-primary mb-3">Add</a>
    
    <table class="table mt-3">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá sản phẩm</th>
                <th scope="col">View</th>
                <th scope="col">anhr</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($product as $pr)
            <tr>
                <th scope="row">{{$pr->id}}</th>
                <td>{{$pr->name}}</td>
                <td>{{$pr->price}}</td>
                <td>{{$pr->view}}</td>
                <td><img src="{{asset($pr->image)}}" style="width:100px;height:50px;"></td>
                <td>
                    <a href="{{route('admin.product.editProduct',$pr->id)}}" class="btn btn-warning">Sửa</a>
                    <button class="btn btn-danger btn-delete" data-bs-id="{{ $pr->id }}" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    {{$product->links('pagination::bootstrap-5')}}
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Cảnh báo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn xóa sản phẩm này không?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <form id="formDelete" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Xóa</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let deleteModal = document.getElementById('deleteModal');
        deleteModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-bs-id');

            var formDelete = document.getElementById('formDelete');
            formDelete.setAttribute('action', '{{ route("admin.product.deleteProduct") }}?idProduct=' + id);
        });
    });
</script>
@endpush
