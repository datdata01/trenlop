<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="mb-4">Danh sách sản phẩm</h3>
        <div class="mb-3">
            <a href="{{ route('product.addProduct') }}" class="btn btn-primary">Thêm sản phẩm</a>
        </div>
        <form action="{{ route('product.checkProduct') }}" method="post" class="form-inline mb-4">
            @csrf
            <div class="form-group mr-2">
                <input type="text" name="check" class="form-control" placeholder="Tìm kiếm sản phẩm">
            </div>
            <button type="submit" class="btn btn-success">Kiểm tra</button>
        </form>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Giá</th>
                    <th>Lượt xem</th>
                    <th>Danh mục</th>
                    <th>Xóa</th>
                    <th>Cập nhật</th>
                </tr>
            </thead>
            <tbody>
                @foreach($listProduct as $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->price }}</td>
                    <td>{{ $value->view }}</td>
                    <td>{{ $value->category_name }}</td>
                    <td>
                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa không?')" href="{{ route('product.deleteProduct', $value->id) }}" class="btn btn-danger btn-sm">Xóa</a>
                    </td>
                    <td>
                        <a href="{{ route('product.editProduct', $value->id) }}" class="btn btn-warning btn-sm">Cập nhật</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
