<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    protected $table = "nhanvien";
    protected $primaryKey = 'MAVN';
    protected $guarded = [''];

    public $timestamps = false;
}
