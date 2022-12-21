<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

const STATUS_PUBLIC=1;
const STATUS_PRIVATE=0;


class Article extends Model
{
    use HasFactory;
    protected $status=[
            1=>[
                'name' => 'Public',
                'class'=> "btn btn-primary btn-sm",
            ],
            0=>[
                'name' => 'Private',
                'class'=> "btn btn-warning btn-sm",
            ],
        ];

    public function getStatus(){
        return Arr::get($this->status,$this->a_active,'[N\A]');
    }
}
