<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    
    protected $table = "ctrang";
    protected $primaryKey = 'STT';
    protected $guarded = [''];

    public $timestamps = false;

    function tooth(){
        return $this->hasOne(Tooth::class, 'STT', 'STT');
    }
}
