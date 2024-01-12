<?php

Route::get('/admin/clock_out', [App\Http\Controllers\ClockOutController::class, 'clock_out'])
    ->name('clock_out');
