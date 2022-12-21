<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $guared = [''];

    const PUBLIC_HOT = 1;
    const PRIVATE_HOT = 0;

    const PUBLIC_STATUS = 1;
    const PRIVATE_STATUS = 0;

    protected $status =[
        1 => [
            'name'=>'Public',
            'class' => 'btn btn-primary',
        ],

        0 => [
            'name' => 'Private',
            'class' => 'btn btn-warning',
        ],
    ];

    protected $hot = [
        1 => [
            'name' => 'Hot_on',
             'class' => 'btn btn-primary',
        ],

        0 => [
            'name' => 'Hot_off',
            'class' => 'btn btn-warning',
        ],
    ];

    public function getStatus(){
        return Arr::get($this->status,$this->pro_active,'[N\A]');
    }

    public function getHot(){
        return Arr::get($this->hot,$this->pro_hot,'[N\A]');
    }

    public function category(){
        return $this->beLongsTo(Category::class,'pro_category_id');
    }
}
