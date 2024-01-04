<?php
use Illuminate\Support\Facades\Route;

//users list form
Route::get('/admin/users', function (){
    return view('users.users');
});

//users list form
Route::get('/admin/users', [\App\Http\Controllers\UsersController::class, 'index'])
    ->name('index_user');

//create users form
Route::get('/admin/users/index_create', [\App\Http\Controllers\UsersController::class, 'index_create'])
    ->name('index_create');

//after clicked summit
Route::post('/admin/users/create', [\App\Http\Controllers\UsersController::class, 'create'])
    ->name('create_user');

//connfirm delete user
Route::get('/admin/users/confirm_delete', [\App\Http\Controllers\UsersController::class, 'confirm_delete'])
    ->name('confirm_delete');

//after coonfirm delete
Route::post('/admin/users/delete_user', [\App\Http\Controllers\UsersController::class, 'delete_user'])
    ->name('delete_user');

Route::get('/admin/users/index_update_user', [\App\Http\Controllers\UsersController::class, 'index_update_user'])
    ->name('index_update_user');

Route::post('/admin/users/update', [\App\Http\Controllers\UsersController::class, 'update'])
    ->name('update');
