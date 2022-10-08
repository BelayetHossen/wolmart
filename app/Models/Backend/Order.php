<?php

namespace App\Models\Backend;

use App\Models\Frontend\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentGateway::class, 'payment_id', 'id');
    }
    public function shippingMethod()
    {
        return $this->belongsTo(Shipping::class, 'shipping_id', 'id');
    }
    public function getCustomer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }


}
