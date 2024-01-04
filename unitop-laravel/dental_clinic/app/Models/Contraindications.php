<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contraindications extends Model
{
    use HasFactory;
    protected $table = "chongcd";
    protected $primaryKey = 'MATHUOC';

    protected $guarded = [''];

    public $timestamps = false;
}
