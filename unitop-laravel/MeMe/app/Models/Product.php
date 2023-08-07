<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\productImages;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded =[''];

    public function images(){
        return $this->hasMany(productImages::class,"product_id");
    }

    public function tags(){
        return $this->belongsToMany(Tag::class,'product_tags','product_id','tag_id');
    }
}
