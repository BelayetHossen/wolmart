<?php

namespace App\Models\Backend;

use App\Models\Backend\Brand;
use App\Models\Frontend\ProductReview;
use App\Models\Frontend\Vendor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
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

    public function getvendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id', 'id');
    }

    public function getpublisher()
    {
        return $this->belongsTo(Siteuser::class, 'publisher_id', 'id');
    }
    public function getReviews()
    {
        return $this->hasMany(ProductReview::class, 'product_id', 'id');
    }

    // public function tags()
    // {
    //     return $this->belongsTo(ProductTag::class, 'id', 'id');
    // }
}
