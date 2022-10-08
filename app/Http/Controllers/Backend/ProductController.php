<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

use App\Models\Backend\Brand;

use App\Models\Backend\Product;
use App\Models\Backend\ProductTag;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\Backend\ProductCategoryGrandMother;

class ProductController extends Controller
{

    /*
|--------------------------------------------------------------------------
| product index
|--------------------------------------------------------------------------
*/
    public function index()
    {
        return view('backend.pages.product.product.index');
    }

    // all products load
    public function allProducts()
    {
        if (request()->ajax()) {

            return datatables()->of(Product::where('trash', 0)->get())

                ->addColumn('sl', function ($data) {

                    //SL no genarate
                    $count = 1;
                    return $count = $count + 1;
                })


                ->addColumn('title', function ($data) {

                    $img_arr = json_decode($data->image);

                    $image_path = url('storage/products') . '/' . $img_arr[0];

                    return '<img style="width:35px; margin-left:-30px;" src="' . $image_path . '">' . ' ' . mb_strimwidth($data->title, 0, 25) . '..';
                })

                ->addColumn('category', function ($data) {

                    return $data->mainCat->name;
                })

                ->addColumn('brand', function ($data) {

                    return $data->getBrand->name;
                })
                ->addColumn('price', function ($data) {
                    if ($data->sell_price) {
                        $price = '<ins class="new-price">৳ ' . $data->sell_price . '</ins>
                                <del class="old-price">৳ ' . $data->price . '</del>';
                    } else {
                        $price = '<ins class="new-price">৳ ' . $data->price . '</ins>';
                    }

                    return $price;
                })

                ->addColumn(
                    'status',
                    function ($data) {

                        //status btn checked unchecked
                        $status_check = $data->status ? 'checked' : '';


                        if ($data->trash == 0) {
                            $button = '<label class="switch">
                                <input value="' . $data->id . '" id="product_status_btn" type="checkbox" ' . $status_check . '>
                                <span class="slider round"></span>
                        </label>';
                            return $button;
                        } else {
                            return '<p class="badge bg-danger" style="font-size: 12px;">Trashed</p>';
                        }
                    }
                )

                ->addColumn(
                    'action',
                    function ($data) {

                        //Action btn show by conditions

                        $reeee = "http://localhost:8000/product-edit";


                        if (
                            $data->trash == 1
                        ) {

                            $button = '';

                            $button .= '<a href="#" product_trash_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Restore" class="btn btn-success btn-sm product_trash_btn"><i class="fa fa-undo"></i></a> ';
                            $button .= '<a href="#" product_delete_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Delete Permanently" class="btn btn-danger btn-sm product_delete_btn"><i class="fas fa-skull-crossbones"></i></a>';
                            return $button;
                        } else {
                            $button = '';

                            $button .= '<a href="#" product_view_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="View" class="btn btn-warning btn-sm product_view_btn"><i class="fa fa-eye"></i></a> ';

                            $button .= '<a href="' . $reeee . '/' . $data->id . '" product_edit_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-warning btn-sm product_edit_btn"><i class="fa fa-edit"></i></a> ';

                            $button .= '<a href="#" product_trash_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Move to trash" class="btn btn-danger btn-sm product_trash_btn"><i class="fa fa-trash"></i></a>';
                            return $button;
                        }
                    }
                )

                ->rawColumns(['sl', 'title', 'category', 'brand', 'price', 'status', 'action'])->make();
        }
    }


    /*
|--------------------------------------------------------------------------
| trashed product index
|--------------------------------------------------------------------------
*/
    public function trashedProductIndex()
    {
        return view('backend.pages.product.product.trashed-products');
    }

    // all trashed products load
    public function trashedProductAll()
    {
        if (request()->ajax()) {

            return datatables()->of(Product::where('trash', 1)->get())

                ->addColumn('sl', function ($data) {

                    //SL no genarate
                    $count = 1;
                    return $count = $count + 1;
                })


                ->addColumn('title', function ($data) {

                    $img_arr = json_decode($data->image);

                    $image_path = url('storage/products') . '/' . $img_arr[0];

                    return '<img style="width:35px; margin-left:-30px;" src="' . $image_path . '">' . ' ' . mb_strimwidth($data->title, 0, 25) . '..';
                })

                ->addColumn('category', function ($data) {

                    return $data->mainCat->name;
                })

                ->addColumn('brand', function ($data) {

                    return $data->getBrand->name;
                })
                ->addColumn('price', function ($data) {

                    if ($data->sell_price) {
                        $price = '<ins class="new-price">৳ ' . $data->sell_price . '</ins>
                                <del class="old-price">৳ ' . $data->price . '</del>';
                    } else {
                        $price = '<ins class="new-price">৳ ' . $data->price . '</ins>';
                    }

                    return $price;
                })

                ->addColumn(
                    'status',
                    function ($data) {

                        //status btn checked unchecked
                        $status_check = $data->status ? 'checked' : '';


                        if ($data->trash == 0) {
                            $button = '<label class="switch">
                                <input value="' . $data->id . '" id="product_status_btn" type="checkbox" ' . $status_check . '>
                                <span class="slider round"></span>
                        </label>';
                            return $button;
                        } else {
                            return '<p class="badge bg-danger" style="font-size: 12px;">Trashed</p>';
                        }
                    }
                )

                ->addColumn(
                    'action',
                    function ($data) {

                        //Action btn show by conditions

                        $reeee = url('/product-edit/');


                        if (
                            $data->trash == 1
                        ) {

                            $button = '';

                            $button .= '<a href="#" product_trash_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Restore" class="btn btn-success btn-sm product_trash_btn"><i class="fa fa-undo"></i></a> ';
                            $button .= '<a href="#" product_delete_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Delete Permanently" class="btn btn-danger btn-sm product_delete_btn"><i class="fas fa-skull-crossbones"></i></a>';
                            return $button;
                        } else {
                            $button = '';

                            $button .= '<a href="#" product_view_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="View" class="btn btn-warning btn-sm product_view_btn"><i class="fa fa-eye"></i></a> ';

                            $button .= '<a href="' . $reeee . '/' . $data->id . '" product_edit_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-warning btn-sm product_edit_btn"><i class="fa fa-edit"></i></a> ';

                            $button .= '<a href="#" product_trash_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Move to trash" class="btn btn-danger btn-sm product_trash_btn"><i class="fa fa-trash"></i></a>';
                            return $button;
                        }
                    }
                )

                ->rawColumns(['sl', 'title', 'category', 'brand', 'price', 'status', 'action'])->make();
        }
    }




    /*
|--------------------------------------------------------------------------
| 1. product add page load
|--------------------------------------------------------------------------
*/
    public function addProduct()
    {
        $tags = ProductTag::all();
        $cats_1 = ProductCategoryGrandMother::all();
        $brands = Brand::all();
        $random_number = str_shuffle(time() . 'QWERTYUPASDFGHJKLZXCVBNM123456789');
        $random_sku = substr($random_number, 5, 8);

        return view('backend.pages.product.product.add-product', [
            'tags' => $tags,
            'cats_1' => $cats_1,
            'brands' => $brands,
            'random_sku' => $random_sku,
        ]);
    }


    /*
|--------------------------------------------------------------------------
| 1. product store
|--------------------------------------------------------------------------
*/
    public function store(Request $request)
    {




        $name = '';
        $gallery = [];
        if ($request->hasFile('photos')) {
            $images = $request->file('photos');

            foreach ($images as $img) {
                $name = md5(rand()) . '.' . $img->getClientOriginalExtension();
                array_push($gallery, $name);
                $extention = $img->getClientOriginalExtension();

                $inter = Image::make($img->getRealPath());
                $inter->save(storage_path('app/public/products/') . $name);
            }
        }



        $title_check = Product::where('title', $request->title)->first();

        if (!empty($title_check)) {
            return [
                'title_check' => 'exist'
            ];
        } else {
            Product::create([
                'vendor_id'             =>      Auth::guard('siteuser')->user()->id,
                'sku'                   =>      $request->sku,
                'title'                 =>      $request->title,
                'slug'                  =>      Str::slug($request->title),
                'cat_1'                 =>      $request->main_cat_id,
                'cat_2'                 =>      $request->second_cat_id,
                'cat_3'                 =>      $request->third_cat_id,
                'tags'                  =>      json_encode($request->tags),
                'brand'                 =>      $request->product_brand,
                'short_desc'            =>      $request->short_desc,
                'long_desc'             =>      $request->long_desc,
                'stock'                 =>      $request->stock,
                'price'                 =>      $request->price,
                'sell_price'            =>      $request->sell_price,
                'featured'              =>      $request->featured,
                'video'                 =>      $request->video,
                'stock'                 =>      $request->stock,
                'hot'                   =>      json_encode($request->hot),
                'image'                 =>      json_encode($gallery),
            ]);
            return redirect()->route('product.index');
        }
    }


    /*
|--------------------------------------------------------------------------
| second category select
|--------------------------------------------------------------------------
*/
    public function secondCatSelect($id)
    {
    }




    // product edit
    public function productEditPage($id)
    {
        $data = Product::find($id);
        $tags = ProductTag::all();
        $cats_1 = ProductCategoryGrandMother::all();
        $brands = Brand::all();
        $imgs = json_decode($data->image);
        $path = url('storage/products/');




        return view('backend.pages.product.product.edit-product', [
            'tags' => $tags,
            'cats_1' => $cats_1,
            'brands' => $brands,
            'data' => $data,
            'path' => $path,
            'images' => $imgs
        ]);
    }



    /*
|--------------------------------------------------------------------------
|  select second caegory in form
|--------------------------------------------------------------------------
*/
    public function secondCategorySelect($id)
    {

        $data = ProductCategoryGrandMother::find($id);
        return $data;
    }


    // old photo delete
    public function productImgDelete($id, $imgName)
    {
        $data = Product::find($id);
        $img_arr = json_decode($data->image);
        array_splice($img_arr, array_search($imgName, $img_arr), 1);
        $data->image          = json_encode($img_arr);
        $data->update();
        unlink(storage_path('app/public/products/') . $imgName);
        return 'One old photos has been deleted successfully';
    }




    /*
|--------------------------------------------------------------------------
|  Product update
|--------------------------------------------------------------------------
*/
    public function productUpdate(Request $request, $id)
    {


        $data = Product::find($id);

        $new_name = '';
        $newGallery = [];
        if ($request->hasFile('newPhotos')) {
            $images = $request->file('newPhotos');

            foreach ($images as $img) {
                $new_name = md5(rand()) . '.' . $img->getClientOriginalExtension();
                array_push($newGallery, $new_name);
                $extention = $img->getClientOriginalExtension();

                $inter = Image::make($img->getRealPath());
                $inter->save(storage_path('app/public/products/') . $new_name);
            }

            // foreach (json_decode($data->image) as $delete_img) {
            //     $image_path = storage_path('app/public/products/') . $delete_img;
            //     //unlink($image_path);
            //     return $image_path;
            // }

        }

        $new_name = array_merge($request->oldPhotos, $newGallery);

        $hot = '';
        if ($request->hot != '') {
            $hot = $request->hot;
        } else {
            $hot = json_decode($data->hot);
        }




        $data->title        = $request->title;
        $data->slug         = Str::slug($request->title);
        $data->cat_1        = $request->main_cat_id;
        $data->cat_2        = $request->second_cat_id;
        $data->cat_3        = $request->third_cat_id;
        $data->tags         = json_encode($request->tags);
        $data->brand        = $request->product_brand;
        $data->short_desc   = $request->short_desc;
        $data->long_desc    = $request->long_desc;
        $data->price        = $request->price;
        $data->sell_price   = $request->sell_price;
        $data->featured     = $request->featured;
        $data->hot          = json_encode($request->hot);
        $data->image        = json_encode($new_name);

        $data->update();

        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }


    /*
|--------------------------------------------------------------------------
| product status change
|--------------------------------------------------------------------------
*/
    public function productStatus($id)
    {

        $data = Product::find($id);
        if ($data->status == true) {
            $data->status = false;
            $data->update();
        } else {
            $data->status = true;
            $data->update();
        }
    }



    /*
|--------------------------------------------------------------------------
|  trash-restore product
|--------------------------------------------------------------------------
*/
    public function trashRestore($id)
    {

        $data = Product::find($id);
        if ($data->trash == true) {
            $data->trash = false;
            $data->update();
            return [
                'key' => 'back'
            ];
        } else {
            $data->trash = true;
            $data->update();
            return [
                'key' => 'move'
            ];
        }
    }










    //
}
