<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UsersController extends Controller
{

    public function test(){
        return view('admin.layout.default');
    }

    // function showUser(){
    //     //Lấy danh sách toàn bộ user
    //     $listUsers = DB::table('users')->get();
    //     return view('user.listUser',compact('listUsers'));
    // }
    // public function listuser(){

    //     $data=array([
    //         'id'=>'1',
    //         'name'=>'dat',
    //         'status'=>'rong',
    //     ]);

    //     return view('list-user')->with(['user'=>$data]);
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
    
// }$result = DB::tablle('users')
// ->where('tuoi','>=','30')
// ->select('id','name','email','tuoi')
// ->orderBy('tuoi','asc')
// ->get();
// return view('user.listUser',compact('result'));
public function listUsers(){
    $listUsers = DB::table('users')->join('phongban','phongban_id', '=', 'users.phongban_id')->select('users.id','users.name','users.email','users.phongban_id',)
    ->get();
    return view('users.listUsers')->with([
        'listUsers'=> $listUsers
    ]);
}
public function addUsers(){
    $phongban = DB::table('phongban')->select('id','ten_donvi')->get();
    return view('users.addUsers')->with([
        'phongban' =>$phongban
    ]);
}
public function addPostUsers(Request $req){
$data = [
    'name' => $req->nameUsers,
    'email'=> $req->emailUsers,
    'phongban_id'=> $req->phongbanUsers,
    'tuoi' => $req->tuoiUsers,
    'created_at'=>Carbon::now(),
    'updated_at'=>Carbon::now(),
];
DB::table('users')->insert($data);

return redirect()->route('users.listUsers');
}

public function deleteUsers($idUsers){
    DB::table('users')->where('id',$idUsers)->delete();
    return redirect()->route('users.listUsers');
}



}