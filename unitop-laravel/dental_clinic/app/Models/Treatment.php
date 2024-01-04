<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;
    protected $table = "dieutri";
    protected $primaryKey = 'MADT';
    protected $guarded = [''];

    public $timestamps = false;
}
