<?php

Route::get('/admin/clock_in', [App\Http\Controllers\ClockInController::class, 'clock_in'])
    ->name('clock_in');
