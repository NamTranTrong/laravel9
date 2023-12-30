<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\Guard;

class Patient extends Model
{
    use HasFactory;
    protected $table = "benhnhan";
    protected $guarded = [''];

    public $timestamps = false;
}
