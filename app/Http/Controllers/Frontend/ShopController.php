<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Backend\Brand;
use App\Models\Backend\Product;
use App\Models\Backend\ProductTag;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;
use App\Models\Frontend\ProductReview;
use App\Models\Backend\ProductCategoryGrandMother;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{




    // shop page load
    public function index()
    {
        $products = Product::where('status', true)->where('trash', false)->get();
        $brands = Brand::where('trash', false)->get();
        $featured_products = Product::where('status', true)->where('featured', true)->take(10)->get();
        $hot_products = Product::where('trash', false)->take(5)->get();
        $best_20 = Product::where('trash', false)->take(20)->get();
        $cats1 = ProductCategoryGrandMother::where('trash', false)->get();
        $imgPath = url('').'/storage';
        $tags = ProductTag::all();





        return view('frontend.pages.Shop', [
            'cats1' => $cats1,
            'products' => $products,
            'brands' => $brands,
            'featured_products' => $featured_products,
            'hot_products' => $hot_products,
            'best_20' => $best_20,
            'imgPath' => $imgPath,
            'tags' => $tags,
        ]);
    }

    // caregory page management
    public function categoryIndex($slug)
    {
        $category = ProductCategoryGrandMother::where('slug', $slug)->first();
        $products = Product::where('cat_1', $category->id)->where('status', true)->where('trash', false)->get();
        $brands = Brand::where('trash', false)->get();
        $featured_products = Product::where('status', true)->where('featured', true)->take(10)->get();
        $hot_products = Product::where('trash', false)->take(5)->get();
        $best_20 = Product::where('trash', false)->take(20)->get();
        $cats1 = ProductCategoryGrandMother::where('trash', false)->get();
        $imgPath = url('').'/storage';
        $tags = ProductTag::all();
        return view('frontend.pages.category', [
            'cats1' => $cats1,
            'products' => $products,
            'brands' => $brands,
            'featured_products' => $featured_products,
            'hot_products' => $hot_products,
            'best_20' => $best_20,
            'imgPath' => $imgPath,
            'tags' => $tags,
        ]);
    }
    // brand page management
    public function brandIndex($slug)
    {
        $category = Brand::where('slug', $slug)->first();
        $products = Product::where('cat_1', $category->id)->where('status', true)->where('trash', false)->get();
        $brands = Brand::where('trash', false)->get();
        $featured_products = Product::where('status', true)->where('featured', true)->take(10)->get();
        $hot_products = Product::where('trash', false)->take(5)->get();
        $best_20 = Product::where('trash', false)->take(20)->get();
        $cats1 = ProductCategoryGrandMother::where('trash', false)->get();
        $imgPath = url('').'/storage';
        $tags = ProductTag::all();
        return view('frontend.pages.brand', [
            'cats1' => $cats1,
            'products' => $products,
            'brands' => $brands,
            'featured_products' => $featured_products,
            'hot_products' => $hot_products,
            'best_20' => $best_20,
            'imgPath' => $imgPath,
            'tags' => $tags,
        ]);
    }



    // search category product load
    public function searchByCategory($slug)
    {
        $cats1_id = ProductCategoryGrandMother::where('slug', $slug)->first();
        $products = Product::where('trash', false)->where('status', true)->where('cat_1', $cats1_id->id)->get();


        $ever = '';
        if($ever<=0){
            $evrating = '0%';
        } elseif($ever<=1){
            $evrating = '20%';
        } elseif ($ever<=2) {
            $evrating = '40%';
        } elseif ($ever<=3) {
            $evrating = '60%';
        } elseif ($ever<=4) {
            $evrating = '80%';
        } elseif ($ever<=5) {
            $evrating = '100%';
        }
        return View::make('frontend.pages.shop-product-section',[
            'products' => $products,
            'ever' => $evrating,
        ]);
    }
    // search brand product load
    public function searchByBrand($slug)
    {
        $brand = Brand::where('slug', $slug)->first();
        $products = Product::where('trash', false)->where('status', true)->where('brand', $brand->id)->get();
        return View::make('frontend.pages.shop-product-section',[
            'products' => $products,
        ]);
    }
    // search tag product load
    public function searchByTag($id)
    {
        $tags = ProductTag::all();
        $products = Product::whereHas('tags', function($query) use($tags) {
            $query->whereIn('name', $tags);
        });





        return View::make('frontend.pages.shop-product-section',[
            'products' => $products,
        ]);
    }








    // product review store
    public function productReviewStore(Request $request)
    {


        ProductReview::create([
            'publisher_id'      => Auth::guard('customer')->user()->id,
            'product_id'        => $request->product_id,
            'rating'            => $request->rating, 
            'review'            => $request->review,
        ]);

    }



























    //
}
