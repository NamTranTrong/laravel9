<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    
    protected $table = "lichtrinh";
    protected $primaryKey = 'MALT';
    protected $guarded = [''];

    public $timestamps = false;

    public function Dentist(){
        return $this->belongsTo(Dentist::class,'MANS');
    }
}
