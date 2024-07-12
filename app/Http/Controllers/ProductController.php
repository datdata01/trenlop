<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    // public function listuser(){
        // lay danh sach user
        // $query= DB::table('users')->get();
        // dd($query);
        // return view('list-user')->with(['listuser'=>$query]);

        // lay thong tin user co id=4(select * form user where id=4)
        // $query= DB::table('user')->where('id','=',4)->first();
        // return view('list-user')->with(['user'=>$query]);

        //lau thuoc tinh name cua user co id =16
         // $query= DB::table('user')->where('id','=',16)->value('name');

         //lay danh sach idUser cua phong ban 'Ban giam hieu'
        //  $idPhongban= DB::table('phongban')->where('ten_donvi','like','%Ban giam hieu%')->value('id');
        //  $query= DB::table('user')->where('phongban_id',$idPhongban)->pluck('id');

        // lay user co tuoi lon nhat
        // $query=DB::table('user')->where('tuoi',DB::table('user')->max('tuoi'))->get();

        // lay user co tuoi nho nhat
        // $query=DB::table('users')->where('tuoi',DB::table('users')->min('tuoi'))->get();
        // return view('list-user')->with(['user'=>$query]);

        // lay danh sach tuoi cac users
        // $query= DB::table('users')->where('name','like','%Khai')->orWhere('name','like','%Thanh')->get();
        // view('list-user')->with(['user'=>$query]);

        //lay danh sach user o phong ban 'Ban dao tao'
        // $query=DB::table('users')->where('phongban_id',DB::table('phongban')->where('ten_donvi','like','%Ban đào tạo%')->value('id'))->get();

        //lay danh sach 10 user sap xep gian dan do tuoi, bo qua 5 user dau tien
        // $query=DB::table('users')->orderBy('tuoi','desc')->offset(6)->limit(10)->get();

        //them bang user vao cong ty
        // $data=[
        //     'name'=>'Nguyen van dat',
        //     'email'=>'datdata01@gmail.com',
        //     'phongban_id'=>'1',
        //     'songaynghi'=>'16',
        //     'tuoi'=>'10',
        //     'created_at'=>Carbon::now(),
        //     'updated_at'=>Carbon::now(),
        // ];
        //     DB::table('users')->insert($data);

        // them chu 'PDT' sau ten tat ca user o phong ban 'Ban dao tao'
        // $idPhongban=DB::table('phongban')->where('ten_donvi','like','%Ban đào tạ0%')->value('id');
        // $query=DB::table('users')->where('phongban_id',$idPhongban)->get();
        // foreach($query as $value){
        //     DB::table('users')->where('id',$value->id)->update(['name'=>$value->id.'PDT']);
        // }

        // xoa user nghi qua 15 ngay
        // DB::table('users')->where('songaynghi','>','15')->delete();

        // return view('list-user')->with(['user'=>$query]);
    // }


















    // public function thongtinsv($mssv,$name,$class,$phone,$address){
    //     $sv=[
    //         ['mssv'=>$mssv,
    //         'name'=>$name,
    //         'class'=>$class,
    //         'phone'=>$phone,
    //         'address'=>$address,
    //     ],
    //     ];

    //     return view('thong-tin-sv')->with(['sv'=>$sv]);
    // }

    public function listProduct(){
        $listProduct=DB::table('product')->join('category','category.id','=','product.category_id')
            ->select('product.id','product.name','product.view','product.price','product.category_id','category.category_name' )
            ->orderBy('view','desc')
            ->get();

        return view('product.listProduct',compact('listProduct'));
    }


    public function addProduct(){
        $category=DB::table('category')->get();
        return view('product.addProduct',compact('category'));
    }
    public function addPostProduct(Request $req){
        $data=[
            'name'=>$req->name,
            'category_id'=>$req->category_id,
            'price'=>$req->price,
            'view'=>$req->view,
            'create_at'=>Carbon::now(),
            'update_at'=>Carbon::now(),
        ];
        DB::table('product')->insert($data);
        return redirect()->route('product.listProduct');
    }
    public function deleteProduct($id){
        DB::table('product')->where('id',$id)->delete();
        return redirect()->route('product.listProduct');
    }
    public function editProduct($id){
        $cate=DB::table('category')->get();
        $edit = DB::table('product')
        ->join('category', 'product.category_id', '=', 'category.id')
        ->where('product.id', $id)
        ->select('product.id','product.name', 'product.view', 'product.price', 'product.category_id', 'category.category_name')
        ->get();
    
        return view('product.editProduct',compact('edit','cate'));
    }
    public function saveProduct(Request $req){
        $data=[
            'name'=>$req->name,
            'price'=>$req->price,
            'view'=>$req->view,
            'category_id'=>$req->category_id,
            'create_at'=>Carbon::now(),
            'update_at'=>Carbon::now()
        ];
        DB::table('product')->where('id',$req->id)->update($data);
        return redirect()->route('product.listProduct');
    }


// checking product
    public function checkProduct(Request $req)
    {
        $searchTerm = $req->input('check');
        
        $results = DB::table('product')
            ->where('name', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('id','LIKE',$searchTerm)
            ->orWhere('view','LIKE',$searchTerm)
            ->get();
        if($results){
            return view('product.returnCheck', compact('results'));
        }else{
            echo "<h1>error</h1>";
        }
        
      
    }
    public function returnProduct()
        {
            return view('product.returnCheck');
        }
// end checking product
    
}
