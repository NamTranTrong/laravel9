<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model
{
    use HasFactory;
    
    protected $table = "thanhtoan";
    protected $primaryKey = 'MATT';
    protected $guarded = [''];

    public $timestamps = false;
}
