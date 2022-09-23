<?php

namespace App\Models\Backend;

use App\Models\Backend\Brand;
use Illuminate\Database\Eloquent\Model;
use App\Models\Backend\ProductCategoryThird;
use App\Models\Backend\productCategorySecond;
use App\Models\Backend\ProductCategoryGrandMother;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function mainCat()
    {
        return $this->belongsTo(ProductCategoryGrandMother::class, 'cat_1', 'id');
    }

    public function secondCat()
    {
        return $this->belongsTo(productCategorySecond::class, 'cat_2', 'id');
    }

    public function thirdCat()
    {
        return $this->belongsTo(ProductCategoryThird::class, 'cat_3', 'id');
    }

    public function getBrand()
    {
        return $this->belongsTo(Brand::class, 'brand', 'id');
    }

    public function getTags()
    {
        return $this->belongsTo(ProductTag::class, 'tags', 'id');
    }

    public function getPublisher()
    {
        return $this->belongsTo(Siteuser::class, 'publisher_id', 'id');
    }
}
