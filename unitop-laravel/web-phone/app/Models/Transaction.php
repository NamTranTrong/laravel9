<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Transaction extends Model
{
    use HasFactory;
    protected $table='transactions';
    protected $guared=['*'];

    public function user(){
        return $this->belongsTo(User::class,'tr_user_id');
    }
}
