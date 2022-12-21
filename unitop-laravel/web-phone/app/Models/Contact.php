<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;



class Contact extends Model
{
    use HasFactory;
    public $timestamps = false;
    const STATUS_UNPROCESSED = 0;
    const STATUS_PROCESSED = 1 ;


    protected $table='contacts';
    protected $guared=[''];

    protected $status = [
        1 => [
            'name' => 'Đã xử lý',
            'class' => "btn btn-primary btn-sm",
        ],

        0 => [
            'name' => 'Chưa xử lý',
            'class' => "btn btn-warning btn-sm",
        ],
    ];

    public function getStatus(){
        return Arr::get($this->status, $this->con_status, '[N\A]');
    }
}
