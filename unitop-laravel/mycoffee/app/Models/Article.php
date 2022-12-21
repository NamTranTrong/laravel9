<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Article extends Model
{
    use HasFactory;
    protected $table = 'articles';
    protected $guared=[''];

    const STATUS_PUBLIC = 1;
    const STATUS_PRIVATE = 0;

    protected $status = [
        1 => [
            'class' => 'btn btn-primary',
            'name' =>  'public',
        ],

        0 => [
            'class' => 'btn btn-warning',
            'name' =>  'private',
        ],
    ];

    public function getStatus(){
        return Arr::get($this->status,$this->a_active,'[N\A]');
    }
}
