<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// get POST =>Method HTTP



// Route::get('/test',function(){echo "test";});
// Route::get('/list-user',[UserController::class,'listuser']);
// // Slug
// Route::get('/get-user/{id}/{name?}',[UserController::class,'getUser']);
// // Param
// Route::get('/update-user',[UserController::class,'updateuser']);
// // ?id=1
// Route::get('/thong-tin-sv/{mssv}/{name}/{class}/{phone}/{address}',[UserController::class,'thongtinsv']);


//baihoc
Route::group(['prefix'=>'product','as'=>'product.'],function(){
    Route::get('listProduct',[ProductController::class,'listProduct'])->name('listProduct');
    Route::get('addProduct',[ProductController::class,'addProduct'])->name('addProduct');
    Route::post('addPostProduct',[ProductController::class,'addPostProduct'])->name('addPostProduct');
    
    Route::get('deleteProduct/{id}',[ProductController::class,'deleteProduct'])->name('deleteProduct');

    Route::get('editProduct/{id}',[ProductController::class,'editProduct'])->name('editProduct');
    Route::post('saveProduct',[ProductController::class,'saveProduct'])->name('saveProduct');

    Route::post('checkProduct',[ProductController::class,'checkProduct'])->name('checkProduct');
    Route::get('returnCheck',[ProductController::class,'returnProduct'])->name('returnCheck');

});