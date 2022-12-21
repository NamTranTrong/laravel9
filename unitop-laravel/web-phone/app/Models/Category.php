<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Category extends Model
{
    protected $table= 'categories';
    protected $primaryKey = 'id';
    protected $guared=[''];

    const STATUS_PUBLIC=1;
    const STATUS_PRIVATE=0;

    protected $status =[
        1=>[
           'name' =>'Public',
            'class' =>'btn btn-danger btn-sm'
        ],
        0=>[
            'name' =>'Private',
             'class' =>'btn btn-primary btn-sm'
         ],
    ];

    public function getStatus(){
        return Arr::get($this->status, $this->c_active, '[N\A]');
    }

}
