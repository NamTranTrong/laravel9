<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $guared=[''];

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;
    const HOT_ON = 1;
    const  HOT_OFF = 0;

    protected $status = [
        1 => [
            'class' => 'btn btn-primary',
            'name' => 'Public',
        ],
        0 => [
            'class' => 'btn btn-success',
            'name' => 'Private',
        ],
    ];

    protected $hot = [
        1 =>[
            'class' => 'btn btn-warning',
            'name' => 'Hot-On',
        ],
        0   => [
            'class' => 'btn btn-danger',
            'name'=> 'Hot-Off',
        ],
    ];

    public function getStatus(){
        return Arr::get($this->status,$this->pro_active,'[N\A]');
    }

    public function getHot(){
        return Arr::get($this->hot,$this->pro_hot,'[N\A]');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'pro_category_id');
    }
}
