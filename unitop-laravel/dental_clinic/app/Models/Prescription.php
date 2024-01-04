<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    use HasFactory;
    protected $table = "ctdonthuoc";
    protected $primaryKey = 'MATHUOC';
    protected $guarded = [''];

    public $timestamps = false;
}
