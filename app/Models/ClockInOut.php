<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClockInOut extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'clock_in_out';
}
