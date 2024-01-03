<?php
use Illuminate\Support\Facades\Route;


//index
Route::get('/',function (){
    return view('login');
});
//Login
Route::get('/login', [\App\Http\Controllers\LoginController::class, 'index'])
    ->name('login');

Route::post('/do_login', [\App\Http\Controllers\LoginController::class, 'do_login'])
    ->name('do_login');

Route::middleware('auth')->group(function (){
    //dashboard
    Route::get('/admin', function () {
        return view('master');
    });

    //include users route
    include 'admin/users.php';
});

Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])
    ->name('logout');

