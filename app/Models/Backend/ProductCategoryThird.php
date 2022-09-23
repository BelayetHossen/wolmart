<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryThird extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function mainCategory(){
        return $this->belongsTo(ProductCategoryGrandMother::class, 'main_cat_id', 'id');
    }

    public function secondCategory(){
        return $this->belongsTo(productCategorySecond::class, 'second_cat_id', 'id');
    }
}
