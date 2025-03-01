<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $table = 'packages'; // Tên bảng trong database

    protected $fillable = [
        'name',
        'amount',
        'knb',
        'bonus_percent'
    ];
}
