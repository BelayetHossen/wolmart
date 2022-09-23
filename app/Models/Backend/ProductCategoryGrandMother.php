<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryGrandMother extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function secondCategory(){
        return $this->hasMany(productCategorySecond::class, 'main_cat_id', 'id');
    }
}
