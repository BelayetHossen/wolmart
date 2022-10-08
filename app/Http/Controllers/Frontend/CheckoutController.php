<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Backend\PaymentGateway;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    // index
    public function index()
    {
        $carts = Cart::content();
        $subtotal = Cart::subtotal();
        $payments = PaymentGateway::all();
        return view('frontend.pages.shopping.checkout',[
            'carts' => $carts,
            'subtotal' => $subtotal,
            'payments' => $payments,
        ]);

    }

}
