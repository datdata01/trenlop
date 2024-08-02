<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function listProduct(){

        $product=Product::paginate(5);
     
        return view('admin.product.list-product')->with(['product'=>$product]);
    }






    public function addProduct(){
        return view('admin.product.add-product');
    }
    public function addPostProduct(Request $req)
    {

        $imageUrl='';
       
        if ($req->hasFile('imageProduct')) {
            $image = $req->file('imageProduct');
            // Lấy tên gốc của tệp
            // Tạo tên tệp mới với dấu chấm
            $nameImage = time() . "_" . pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '.' . $image->getClientOriginalExtension();
            $link = "imageProduct/";
            $image->move(public_path($link), $nameImage);
            $imageUrl = $link . $nameImage;
        }
        $data=[
            'name'=>$req->name,
            'price'=>$req->price,
            'view'=>'10',
            'image'=>$imageUrl,
            // 'image'=>$imageUrl
        ];
        Product::create($data);
        return redirect()->route('admin.product.listProduct'); // Đảm bảo rằng view này tồn tại
    }


    public function deleteProduct(Request $req){
        $product=Product::find($req->idProduct);
        if($product->image!=null && $product->image !=''){
            File::delete(public_path($product->image));
        }
        $product->delete();
        return redirect()->back()->with([
            'message'=>'delete scucess'
        ]);
    }

    public function editProduct($id){
        $product=Product::find($id);
        return view('admin.product.edit-product')->with(['product'=>$product]);

    }


    public function updateProduct(Request $req)
    {
        $imageUrl = '';
        if ($req->hasFile('imageProduct')) {
            $image = $req->file('imageProduct');
            // Lấy tên gốc của tệp
            $originalName = $image->getClientOriginalName();
            // Tách phần mở rộng từ tên gốc
            $extension = $image->getClientOriginalExtension();
            // Tạo tên tệp mới với dấu chấm
            $nameImage = time() . "_" . pathinfo($originalName, PATHINFO_FILENAME) . '.' . $extension;
            $link = "imageProduct/";
            $image->move(public_path($link), $nameImage);
            $imageUrl = $link . $nameImage;
        }
        // if($imageUrl=='' || $imageUrl==null){
        //     $imageUrl=$req->imageProduct;
        // }
        $data = [
            'name' => $req->name,
            'price' => $req->price,
            'view' => $req->view,
            'image' => $imageUrl,
        ];
        $product = Product::find($req->id);
        $product->update($data);
        return redirect()->route('admin.product.listProduct')->with(['message' => 'update success']);
    }
}
