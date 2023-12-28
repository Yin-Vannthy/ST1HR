<?php
use Illuminate\Support\Facades\Route;

Route::get('/',function (){
    return view('master');
});
Route::get('/admin', function () {
    return view('master');
});
Route::get('/admin/users', function (){
    return view('users.users');
});

//include users route
include 'admin/users.php';

