<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductReview extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getReviewPublisher()
    {
        return $this->belongsTo(Customer::class, 'publisher_id', 'id');
    }
}
