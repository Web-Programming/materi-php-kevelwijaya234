<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo "Halo, Saya Kevel";
    //return view('welcome');
});

Route::get('/alamat', function(){
    echo "Jalan Rajawali 14. Palembang";
});

//Route ke halamaan path1/path2/path3
Route::get('path1/path2/detail', function(){
    echo "Provinsi Sumatera Selatan";
});


//Route Dinamis degnan parameter ID
Route::get('user/{id}', function($id){
    echo "User ID: ". $id;
});

//Route Dinamis degnan parameter NAMA
Route::get('user2/{name}', function($name){
    echo "User Name: ". $name;
});

//Route Dinamis degnan opsional parameter NAMA
Route::get('user3/{id}', function($name = 'Tamu'){
    echo "User Name: ". $name;
});

//Route Dinamis degnan parameter NAMA
Route::get('user4/{id}/{name}', function($id, $name){
    echo "User ID: ". $id;
    echo "<br>";    
    echo "User Name: ". $name;
});

//Route dengan metode post
Route::post('/simpan', function(){
    echo "Data Berhasil Disimpan";
});

//Route dengan metode put
Route::put('/update{id}', function($id){
    echo "Data Berhasil Diperbaharui dengan ID: ". $id;
});

//Route dengan metode patch
Route::patch('/update2{id}', function($id){
    echo "Data Berhasil Diperbarui dengan ID: ". $id;
});

//Route dengan metode delete
Route::delete('/hapus{id}', function($id){
    echo "Data Berhasil Dihapus dengan ID: ". $id;
});

//Route untuk menampilkan halaman test_method
//Route untuk menampilkan halaman test_method
Route::get('/test-method', function(){
    return view('test_method');
});

//gek aku cek lagi
Route::get('/detailproduk/{name}', function($name){
    return view('produk.detail',
        ['product_name' => $name,
        'id'=> 101,
        'color' => 'silver',
        'stock' => 12
        ]
    );
});

Route::get('/produk/', function(){
    return view('produk.index');
});

Route::get('/produk/create', function(){
    return view('produk.create');
});

Route::get('/produk/search', function(){
    return view('produk.search');
});

Route::get('/produk/detail', function(){
    return view('produk.detail');
});

Route::get('/supplier/', function(){
    return view('supplier.index');
});