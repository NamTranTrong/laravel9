<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;

class Product extends Model
{
    use HasFactory;
    protected $guarded = ['']; 

    public function images(){
        return $this->hasMany(ProductImage::class,'product_id');
    }

    public function tags(){
        return $this->belongsToMany(Tag::class,'product_tags','product_id','tag_id')->withTimestamps();
    }
}
