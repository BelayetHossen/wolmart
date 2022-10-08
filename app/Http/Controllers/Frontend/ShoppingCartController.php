<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Backend\Coupon;
use App\Models\Backend\Product;
use App\Models\Backend\Shipping;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use Gloudemans\Shoppingcart\Facades\Cart;

class ShoppingCartController extends Controller
{
    // cart index
    public function cartIndex()
    {
        $carts = Cart::content();
        $shippings = Shipping::where('status', true)->where('trash', false)->get();
        $cart_subtotal = Cart::subtotal();
        $cart_total = Cart::total();
        return view('frontend.pages.shopping.cart', [
            'carts' => $carts,
            'cart_subtotal' => $cart_subtotal,
            'cart_total' => $cart_total,
            'shippings' => $shippings,
        ]);
    }

    // product add to cart system
    public function addToCart(Request $request)
    {
        $product = Product::find($request->product_id);
        $image = json_decode($product->image);
        if ($product->sell_price == null) {
            $price = $product->price;
        } else {
            $price = $product->sell_price;
        }

        Cart::add([
            'id'        => $product->id,
            'qty'       => $request->product_qty,
            'name'      => $product->title,
            'price'     => $price,
            'weight'    => 5,
            'options'   => [
                'image'     => $image[0],
                'vendor_id'     => $product->getvendor->id,
            ],

        ]);


    }

    // all cart mini
    public function allCartAjax()
    {
        $carts = Cart::content();
        $cart_count = Cart::count();
        $cart_total = Cart::total();
        if ($cart_count < 1) {
            $button = '<p href="" class="alert alert-danger">No product in your cart</p>';
        } else {
            $button = '<a href="'.url('/product/cart').'" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
            <a href="checkout.html" class="btn btn-primary btn-rounded">Checkout</a>';
        }

        $mini_content = '';
        $mini_content .= '<div class="cart-header">
                            <span>Shopping Cart</span>
                            <a href="#" class="btn-close"></a>
                        </div>';
        foreach ($carts as $cart) {
            $mini_content .= '
                            <div class="product product-cart">
                                <div class="product-detail">
                                    <a href="product-default.html" class="product-name">
                                        '. $cart->name .'
                                    </a>
                                    <div class="price-box">
                                        <span class="product-quantity">'. $cart->qty .'</span>
                                        <span class="product-price">'. $cart->price .'</span>
                                    </div>
                                </div>
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="'.asset('storage/products') .'/'. $cart->options->image .'" alt="product" style=""width:50px;>
                                    </a>
                                </figure>
                                <button cart_remove_id="'.$cart->rowId.'" class="btn btn-link btn-close cart_remove_btn" aria-label="button">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            ';
        }
        $mini_content .= '<div class="cart-action mt-2">
                            '.$button.'
                        </div>';

        return [
            'mini_content' => $mini_content,
            'cart_count' => $cart_count,
        ];

    }
    // all cart ajax
    public function allCartAjaxPage()
    {
        $carts = Cart::content();
        $cart_count = Cart::count();
        $cart_total = Cart::total();
        $cart_sub_total = Cart::subtotal();


        $cart_list = '';

            foreach ($carts as $cart) {
                $cart_list .= '
                                    <tr>
                                    <td class="product-thumbnail">
                                        <div class="p-relative">
                                            <a href="product-default.html">
                                                <figure>
                                                    <img src="'.asset('storage/products') .'/'. $cart->options->image .'" alt="product" width="300" height="338" />
                                                </figure>
                                            </a>
                                            <button cart_remove_id="'.$cart->rowId.'" class="btn btn-link btn-close cart_remove_btn" aria-label="button">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="product-name">
                                        <a>
                                            '. $cart->name .'
                                        </a>
                                    </td>
                                    <td class="product-price"><span class="amount">৳'. $cart->price .'</span></td>
                                    <td class="product-quantity">
                                        <div class="product-qty-form d-flex justify-content-between">
                                            <input name="product_qty" class="form-control update_qty" type="number" min="1" value="'. $cart->qty .'">
                                            <input name="rowId" type="hidden" value="'. $cart->rowId .'">


                                            <a class="btn btn-sm btn-rounded cart_update_btn" >Update Qty</a>
                                        </div>
                                    </td>

                                    <td class="product-subtotal">
                                        <span class="amount">৳'. $cart->price*$cart->qty .'</span>
                                    </td>
                                </tr>
                                ';
            }



        return [
            'cart_list' => $cart_list,
            'cart_sub_total' => $cart_sub_total,
            'cart_total' => $cart_total,
            'cart_count' => $cart_count,
        ];

    }

    //cart remove system
    public function cartRemove($rowId)
    {
        Cart::remove($rowId);

    }
    //cart destroy system
    public function destroy()
    {
        Cart::destroy();
        return back();

    }
    //shipping price update
    public function shippingPriceUpdate(Request $request)
    {

        $sub_total = str_replace(',','',Cart::subtotal());
        $shipping = Shipping::find($request->shipping_id);
        if ($request->region == 'Dhaka') {
            $shipping_price = $shipping->dha_price;
        } else if ($request->region == 'Rajshahi') {
            $shipping_price = $shipping->raj_price;
        } else if ($request->region == 'Rangpur') {
            $shipping_price = $shipping->rang_price;
        } else if ($request->region == 'Mymenshing') {
            $shipping_price = $shipping->mym_price;
        } else if ($request->region == 'Barishal') {
            $shipping_price = $shipping->bari_price;
        } else if ($request->region == 'Sylhet') {
            $shipping_price = $shipping->syl_price;
        } else if ($request->region == 'Chittagong') {
            $shipping_price = $shipping->chit_price;
        } else if ($request->region == 'Khulna') {
            $shipping_price = $shipping->khul_price;
        }
        $total_price = $sub_total + $shipping_price;
        Cookie::queue('shipping_id', $shipping->id, 1440);
        Cookie::queue('shipping_method', $shipping->title, 1440);
        Cookie::queue('shipping_addr', $request->region, 1440);
        Cookie::queue('shipping_price', $shipping_price, 1440);
        return [
            'sub_total' => $sub_total,
            'shipping_price' => $shipping_price,
            'shipping_method' => $shipping->title,
            'total_price' => $total_price,
        ];
    }
    //cart qty update system
    public function cartUpdate($rowId, $qty, $shi_price)
    {
        Cart::update($rowId, $qty);

        if ($shi_price == '00') {
            $shipping_price = 00;
            $shipping_method = '';
        } else {
            if (Cookie::has('shipping_price')) {
                $shipping_price = Cookie::get('shipping_price');
            } else {
                $shipping_price = 00;
            }
            if (Cookie::has('shipping_method')) {
                $shipping_method = Cookie::get('shipping_method');
            } else {
                $shipping_method = '';
            }
        }
        $cart_sub_total = Cart::subtotal();
        $sub_total = str_replace(',','',Cart::subtotal());
        $price_total = $sub_total + $shipping_price;

        return [
            'price' => $price_total,
            'cart_sub_total' => $cart_sub_total,
            'shipping_price' => $shipping_price,
            'shipping_method' => $shipping_method,
        ];
    }
    //coupon price update
    public function couponPriceUpdate(Request $request)
    {
        $coupon = Coupon::where('code', $request->coupon)->first();
        if (!empty($coupon)) {
            return 'got';
        } else {
            return [
                'coupon' => 'invallid',
            ];
        }


        // $sub_total = str_replace(',','',Cart::subtotal());
        // $shipping = Shipping::find($request->shipping_id);
        // if ($request->region == 'Dhaka') {
        //     $shipping_price = $shipping->dha_price;
        // } else if ($request->region == 'Rajshahi') {
        //     $shipping_price = $shipping->raj_price;
        // } else if ($request->region == 'Rangpur') {
        //     $shipping_price = $shipping->rang_price;
        // } else if ($request->region == 'Mymenshing') {
        //     $shipping_price = $shipping->mym_price;
        // } else if ($request->region == 'Barishal') {
        //     $shipping_price = $shipping->bari_price;
        // } else if ($request->region == 'Sylhet') {
        //     $shipping_price = $shipping->syl_price;
        // } else if ($request->region == 'Chittagong') {
        //     $shipping_price = $shipping->chit_price;
        // } else if ($request->region == 'Khulna') {
        //     $shipping_price = $shipping->khul_price;
        // }
        // $total_price = $sub_total + $shipping_price;
        // return [
        //     'sub_total' => $sub_total,
        //     'shipping_price' => $shipping_price,
        //     'total_price' => $total_price,
        // ];


    }



    // public function FunctionName()
    // {
    //     $social = [
    //         'fb' => '3',
    //         'fbb' => '3',
    //         'fbvv' => '3',
    //     ];

    // }



    //
}
