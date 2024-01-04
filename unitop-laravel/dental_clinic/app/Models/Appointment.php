<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $table = "cuochen";
    protected $primaryKey = 'MACH';

    protected $guarded = [''];

    public $timestamps = false;
}
