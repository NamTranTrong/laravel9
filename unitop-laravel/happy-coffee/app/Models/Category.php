<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Category extends Model
{
    use HasFactory;
    protected $table= 'categories';
    protected $guared = [''];

    const STATUS_PUBLIC = 1;
    const STATUS_PRiVATE = 0;

    protected $status = [
        1 => [
            'class' => "btn btn-primary",
            'name'  => 'Public',
        ],

        0 => [
            'class' => "btn btn-warning",
            'name'  => 'Private',
        ],
    ];

    public function getStatus(){
        return Arr::get($this->status,$this->ca_active,'[N\A]');
    }
}
