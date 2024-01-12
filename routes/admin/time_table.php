<?php
use Illuminate\Support\Facades\Route;

//time_table url
Route::get('/admin/time_table', function (){
    return view('users.time_table');
});

//time_table list form
Route::get('/admin/time_table', [\App\Http\Controllers\ClockInController::class, 'index'])
    ->name('time_table');
