<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dentist extends Model
{
    use HasFactory;
    protected $table = "nhasi";
    protected $primaryKey = 'MANS';
    protected $guarded = [''];

    public $timestamps = false;

    public function Schedule(){
        return $this->belongsTo(Schedule::class,'MANS');
    }
}
