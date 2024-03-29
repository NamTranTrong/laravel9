<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table='orders';
    protected $guared=['*'];

    public function product(){
        return $this->belongsTo(Product::class,'or_product_id');
    }
}
