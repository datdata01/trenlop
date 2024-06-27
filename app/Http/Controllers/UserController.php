<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function listuser(){

        $data=array([
            'id'=>'1',
            'name'=>'dat',
            'status'=>'rong',
        ]);

        return view('list-user')->with(['user'=>$data]);
    }

    public function thongtinsv($mssv,$name,$class,$phone,$address){
        $sv=[
            ['mssv'=>$mssv,
            'name'=>$name,
            'class'=>$class,
            'phone'=>$phone,
            'address'=>$address,
        ],
        ];

        return view('thong-tin-sv')->with(['sv'=>$sv]);
    }
}
