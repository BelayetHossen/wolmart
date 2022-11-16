<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Backend\Brand;
use App\Models\Backend\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Backend\ProductCategoryGrandMother;
use App\Models\Frontend\ProductReview;

class HomeController extends Controller
{



    // home page load
    public function index()
    {
        $products = Product::where('status', true)->where('trash', false)->take(12)->get();
        $featured_products = Product::where('status', true)->where('featured', true)->take(12)->get();
        $best_seller = Product::where('status', true)->where('trash', false)->where('sell_count', '!=', 0)->latest()->get();
        $populers = Product::where('status', true)->where('trash', false)->where('view_count', '!=', 0)->latest()->get();
        $hot_products = Product::where('status', true)->where('trash', false)->where('hot', '!=', null)->take(5)->get();
        $fashion_products = Product::where('status', true)->where('trash', false)->where('cat_1', '1')->take(8)->get();
        $home_products = Product::where('status', true)->where('trash', false)->where('cat_1', '2')->take(8)->get();

        $best_10 = Product::where('status', true)->where('trash', false)->where('sell_count', '!=', 0)->latest()->take(3)->get();

        $cats1 = ProductCategoryGrandMother::where('trash', false)->take(12)->get();
        $brands = Brand::where('trash', false)->take(12)->get();



        if (Auth::guard('customer')->check()) {
            $option = '<a href="' . route('customer.dashboard') . '" class="d-lg-show">My Account</a>';
        } else {
            $option = '<a href="' . route('customer.register') . '" class="d-lg-show">Register</a>';
        }

        foreach ($hot_products as $product) {
            $hot = json_decode($product->hot);
            $end_date = strtotime($hot[1]);

            if ($end_date < time()) {
                // $product->hot = null;
                // $product->update();
            }
        }






        return view('frontend.pages.home', [
            'cats1' => $cats1,
            'products' => $products,
            'featured_products' => $featured_products,
            'best_sellers' => $best_seller,
            'populers' => $populers,
            'hot_products' => $hot_products,
            'best_10' => $best_10,
            'fashion_products' => $fashion_products,
            'home_products' => $home_products,
            'brands' => $brands,
        ]);
    }

    // single product page load
    public function product($slug)
    {
        $products3 = Product::where('status', true)->where('trash', false)->take(3)->get();
        $product = Product::where('status', true)->where('trash', false)->where('slug', $slug)->first();
        $related_product = Product::where('cat_1', $product->cat_1)->latest()->get();
        $reviews = ProductReview::where('status', true)->where('product_id', $product->id)->get();
        $one_star_reviews = ProductReview::where('rating', 1)->where('status', true)->where('product_id', $product->id)->get();
        $two_star_reviews = ProductReview::where('rating', 2)->where('status', true)->where('product_id', $product->id)->get();
        $three_star_reviews = ProductReview::where('rating', 3)->where('status', true)->where('product_id', $product->id)->get();
        $four_star_reviews = ProductReview::where('rating', 4)->where('status', true)->where('product_id', $product->id)->get();
        $five_star_reviews = ProductReview::where('rating', 5)->where('status', true)->where('product_id', $product->id)->get();
        $img_arr = json_decode($product->image);
        $img_path = url('') . '/storage/products/';
        $img = url('') . '/storage/products/' . $img_arr[0];
        $img2 = url('') . '/storage/products/' . $img_arr[1];
        $brandimg = url('') . '/storage/brands/';
        $path = url('');

        if ($product->sell_price) {
            $price = '<ins class="new-price">৳ ' . $product->sell_price . '</ins>
                        <del class="old-price">৳ ' . $product->price . '</del>';
        } else {
            $price = '<ins class="new-price">৳ ' . $product->price . '</ins>';
        }

        $product->update([
            'view_count' => $product->view_count + 1
        ]);



        return view('frontend.pages.product', [
            'product'               => $product,
            'related_product'       => $related_product,
            'products3'             => $products3,
            'reviews'               => $reviews,
            'one_star_reviews'      => $one_star_reviews,
            'two_star_reviews'      => $two_star_reviews,
            'three_star_reviews'    => $three_star_reviews,
            'four_star_reviews'     => $four_star_reviews,
            'five_star_reviews'     => $five_star_reviews,
            'img'                   => $img,
            'img2'                  => $img2,
            'brandimg'              => $brandimg,
            'price'                 => $price,
            'img_path'              => $img_path,
            'path'                  => $path,
        ]);
    }





    // productQuickview
    public function productQuickview($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $img_arr = json_decode($product->image);
        $img = url('') . '/storage/products/' . $img_arr[0];
        $img2 = url('') . '/storage/products/' . $img_arr[1];
        $url = url('') . '/storage/products/';
        $brandimg = url('') . '/storage/brands/' . $product->getBrand->logo;
        $pro_cat = $product->maincat->name;

        if ($product->sell_price) {
            $price = '<ins class="new-price">৳ ' . $product->sell_price . '</ins>
                        <del class="old-price">৳ ' . $product->price . '</del>';
        } else {
            $price = '<ins class="new-price">৳ ' . $product->price . '</ins>';
        }
        $final_price = htmlspecialchars_decode($price);

        $img_slider_cont = '';
        foreach ($img_arr as $key => $image) {
            $img_slider_cont .= '<div class="swiper-slide">
                                    <figure class="product-image">
                                        <img src="' . $url . $image . '"
                                            data-zoom-image="' . $url . $image . '"
                                            alt="Water Boil Black Utensil" width="800" height="900">
                                    </figure>
                                </div>';
        }

        $rate = 0;
        $recomand = 0;
        foreach ($product->getReviews as $review) {
            $rate += intval($review->rating);
        }
        $ever = 0;
        if (count($product->getReviews) != 0) {
            $ever = $rate / count($product->getReviews);
        }
        if ($ever <= 0) {
            $evrating = '0%';
        } elseif ($ever <= 1) {
            $evrating = '20%';
        } elseif ($ever <= 2) {
            $evrating = '40%';
        } elseif ($ever <= 3) {
            $evrating = '60%';
        } elseif ($ever <= 4) {
            $evrating = '80%';
        } elseif ($ever <= 5) {
            $evrating = '100%';
        }


        return [
            'product' => $product,
            'ever' => $ever,
            'evrating' => $evrating,
            'rev_count' => count($product->getReviews),
            'img' => $img,
            'img2' => $img2,
            'brandimg' => $brandimg,
            'price' => $final_price,
            'pro_cat' => $pro_cat,
            'img_slider_cont' => $img_slider_cont,
        ];
    }
}
