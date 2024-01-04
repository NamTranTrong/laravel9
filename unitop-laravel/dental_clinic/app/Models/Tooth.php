<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tooth extends Model
{
    use HasFactory;
    protected $table = "rang";
    protected $primaryKey = 'STT';
    protected $guarded = [''];

    public $timestamps = false;
}
