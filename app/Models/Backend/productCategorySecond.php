<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\ProductCategoryGrandMother;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class productCategorySecond extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function mainCategory()
    {
        return $this->belongsTo(ProductCategoryGrandMother::class, 'main_cat_id', 'id');
    }
    public function thirdCategory()
    {
        return $this->hasMany(ProductCategoryThird::class, 'second_cat_id', 'id');
    }
}
