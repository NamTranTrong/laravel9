<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Product extends Model
{
    use HasFactory;
    public $timestamps = false;

    const STATUS_PUBLIC=1;
    const STATUS_PRIVATE=0;

    const HOT_ON=1;
    const HOT_OFF=0;
    protected $status=[
        1 =>[
            'name'=>'Public',
            'class'=>'btn btn-danger btn-sm'
        ],
        0 =>[
            'name'=>'Private',
            'class'=>'btn btn-primary btn-sm'
        ],
    ];

    protected $hot=[
        1 =>[
            'name'=>'Public',
            'class'=>'btn btn-success btn-sm'
        ],
        0 =>[
            'name'=>'Private',
            'class'=>'btn btn-warning btn-sm'
        ],
    ];

    public function getHot(){
        return Arr::get($this->hot, $this->pro_hot, '[N\A]');
    }

    public function getStatus(){
        return Arr::get($this->status, $this->pro_active, '[N\A]');
    }

    public function category(){
        return $this->belongsTo(Category::class,'pro_category_id');
    }
}
