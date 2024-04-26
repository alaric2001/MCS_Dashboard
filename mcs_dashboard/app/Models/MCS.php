<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MCS extends Model
{
    use HasFactory;
    protected $table = 'data_mcs';
    protected $guarded= [];
}
