<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_SubCategory extends Model
{
    use HasFactory;

      protected $fillable = [
        'category_id',
        'subcategory_id',
        'sub_subcategory_name',
        'sub_subcategory_slug',
        
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function subcategory(){
        return $this->belongsTo(SubCategory::class,'subcategory_id','id');
    }
}
