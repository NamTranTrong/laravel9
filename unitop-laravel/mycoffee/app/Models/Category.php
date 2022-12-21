<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
use Illuminate\Support\Arr;

class Category extends Model
{
    use HasFactory;
    protected $table='categories';
    protected $guared=[''];

    const PUBLIC_STATUS = 1;
    const PRIVATE_STATUS = 0;

    protected $status = [
        1 => [
            'name' => 'public',
            'class' => 'btn btn-primary',
        ],
        0 => [
            'name' => 'private',
            'class' => 'btn btn-warning',
        ],
    ];

    public function getStatus(){
        return Arr::get($this->status,$this->c_active,'[N\A]');
    }

    public function menu(){
        return $this->belongsTo(Menu::class,'ca_menu_id');
    }
}
