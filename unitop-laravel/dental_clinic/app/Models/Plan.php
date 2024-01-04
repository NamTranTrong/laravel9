<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Staff;
use App\Models\Dentist;
use App\Models\Patient;

class Plan extends Model
{
    use HasFactory;
    protected $table = "kehoach";
    protected $primaryKey = 'MAKH';
    protected $guarded = [''];

    public $timestamps = false;

    public function Staff(){
        return $this->hasOne(Staff::class,'MANV','MANV');
    }

    public function Dentist(){
        return $this->hasOne(Dentist::class,'MANS','MANS');
    }

    public function Patient(){
        return $this->hasOne(Patient::class,'MABN','MABN');
    }
}
