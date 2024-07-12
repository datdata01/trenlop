<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chỉnh sửa sản phẩm</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="mb-4">Chỉnh sửa sản phẩm</h3>
        <form action="{{ route('product.saveProduct') }}" method="post">
            @csrf
            @foreach($edit as $ed)
            <input type="hidden" name="id" value="{{ $ed->id }}">
            <div class="form-group">
                <label for="name">Tên sản phẩm</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Tên sản phẩm" value="{{ $ed->name }}" required>
            </div>
            <div class="form-group">
                <label for="price">Giá</label>
                <input type="number" name="price" id="price" class="form-control" placeholder="Giá sản phẩm" value="{{ $ed->price }}" required>
            </div>
            <div class="form-group">
                <label for="view">Lượt xem</label>
                <input type="number" name="view" id="view" class="form-control" placeholder="Lượt xem" value="{{ $ed->view }}" required>
            </div>
            <div class="form-group">
                <label for="category_id">Danh mục</label>
                <select name="category_id" id="category_id" class="form-control" required>
                  
                    @foreach($cate as $category)
                      
                            <option value="{{ $category->id }}" {{($category->id==$ed->category_id)?'selected':''}}>{{ $category->category_name }}</option>
                     
                    @endforeach
                </select>
            </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
