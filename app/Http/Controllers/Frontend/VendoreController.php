<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Backend\Brand;
use App\Models\Backend\Product;
use App\Models\Frontend\Vendor;
use App\Models\Backend\ProductTag;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cookie;
use App\Models\Backend\ProductCategoryThird;
use App\Models\Backend\productCategorySecond;
use App\Models\Backend\ProductCategoryGrandMother;

class VendoreController extends Controller
{

     // vendor register page load
     public function vendorRegister()
     {
         return view('frontend.pages.vendore.register');
     }

     // vendor login page load
     public function vendorLogin()
     {
         return view('frontend.pages.vendore.login');
     }




     // vendor create account
     public function store(Request $request)
     {

        $this->validate(
            $request,
            [
                'first_name'    => 'required',
                'last_name'     => 'required',
                'username'      => 'required|unique:vendors',
                'phone'         => 'required|unique:vendors|min:11|numeric',
                'email'         => 'required|unique:vendors|email',
                'store_name'    => 'required',
                'country'       => 'required',
                'region'        => 'required',
                'zilla'         => 'required',
                'thana'         => 'required',
                'post'          => 'required',
                'post_code'     => 'required|numeric',
                'password'      => 'required',
                'shop_addr'     => 'required',
                'bank'          => 'required',
                'privecy'       => 'required',
            ],
            [
                'first_name.required'       => 'The first name field is requred !',
                'last_name.required'        => 'The last name field is requred !',
                'username.required'         => 'The username field is requred !',
                'username.unique'           => 'The username is already taken !',
                'phone.required'            => 'The Mobile number is requred !',
                'phone.unique'              => 'The Mobile number is already taken !',
                'phone.min'                 => 'The Mobile number is not correct !',
                'phone.numeric'             => 'The Mobile number is not correct !',
                'email.required'            => 'The email field is requred !',
                'email.email'               => 'The email is not correct !',
                'email.unique'              => 'The email is already taken !',
                'store_name.required'       => 'The store name is requred !',
                'country.required'          => 'The country field is requred !',
                'region.required'           => 'The region field is requred !',
                'zilla.required'            => 'The zilla field is requred !',
                'thana.required'            => 'The thana field is requred !',
                'post.required'             => 'The post field is requred !',
                'post_code.required'        => 'The post code field is requred !',
                'post_code.numeric'         => 'The post code field ckeck !',
                'password.required'         => 'The password field is requred !',
                'shop_addr.required'        => 'The Shop address field is requred !',
                'bank.required'             => 'The bank account field is requred !',
                'privecy.required'          => 'Please check the privecy-policy !',
            ]
        );


        $store_name = Str::slug($request->store_name);
        $store_url = '/agent/'.$store_name;


        Vendor::create([
            'f_name'        => $request->first_name,
            'l_name'        => $request->last_name,
            'username'      => $request->username,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'store_name'    => $request->store_name,
            'store_url'     => $store_url,
            'country'       => $request->country,
            'region'        => $request->region,
            'zilla'         => $request->zilla,
            'thana'         => $request->thana,
            'post'          => $request->post,
            'post_code'     => $request->post_code,
            'shop_addr'     => $request->shop_addr,
            'bank'          => $request->bank,
            'password'      => Hash::make($request->password),
            'status'        => false,
        ]);

        return redirect()->route('vendor.login')->with('msg','Your account created successfully as agent ! login to access dashboard');


     }

    // vendor login system
    public function vendorLoginSystem(Request $request)
    {
        $this->validate(
            $request,
            [
                'email'         => 'required|email',
                'password'      => 'required',
            ],
            [
                'email.required'            => 'The field is requred !',
                'email.email'               => 'The email is not correct !',
                'password.required'         => 'The password field is requred !',
            ]
        );
        if ($request->vendor_remember) {
            Cookie::queue('vendor_email', $request->email, 1440);
            Cookie::queue('vendor_password', $request->password, 1440);
        }
        if (Auth::guard('vendor')->attempt(['email' => $request->email , 'password' => $request->password])) {
            return redirect()->route('vendor.dashboard')->with('msg', 'You are succesfully login as our agent !');
        } else {
            return redirect()->route('vendor.login')->with('msg','Login info is not correct !');
        }
    }



    // vendor logout system
    public function vendorLogout(){

        Auth::guard('vendor')->logout();
        return redirect()->route('vendor.login')->with('msg','You are log out ! You can login again bellow');


    }


     // vendor dashboard page load
     public function dashboard()
     {
        $vendor = Auth::guard('vendor')->user();
         return view('frontend.pages.vendore.dashboard',[
            'vendor'   => $vendor
         ]);
     }

    // vendor product add page load
    public function addProduct()
    {
        $tags = ProductTag::all();
        $cats_1 = ProductCategoryGrandMother::all();
        $brands = Brand::all();
        return view('frontend.pages.vendore.add-product', [
            'tags'          => $tags,
            'cats_1'          => $cats_1,
            'brands'          => $brands,
        ]);
    }

     // all products page load
     public function allProducts()
     {
         return view('frontend.pages.vendore.all-products');
     }


    // product create
    public function productStore(Request $request)
    {
        $this->validate(
            $request,
            [
                'title'          => 'required|unique:products',
                'short_desc'     => 'required',
                'long_desc'      => 'required',
                'photos'         => 'required',
                'tags'           => 'required',
                'cat_1'          => 'required',
                'brand'          => 'required',
                'price'          => 'required',
            ],
            [
                'title.required'       => 'The product title field is requred !',
                'title.unique'         => 'Product title is already taken !',
                'short_desc.required'  => 'The short description is requred !',
                'long_desc.required'   => 'The long description is requred !',
                'photos.required'      => 'The product photo is requred !',
                'tags.required'        => 'The product tags is requred !',
                'cat_1.required'       => 'The category is requred !',
                'brand.required'       => 'The brand name is requred !',
                'price.required'       => 'The price is requred !',
            ]
        );


        $random_number = str_shuffle(time(). 'QWERTYUPASDFGHJKLZXCVBNM123456789qwertyupasdfghjkmnbvcxz');
        $random_sku = substr(md5(rand()).$random_number, 5, 12);

        $name = '';
        $gallery = [];
        if ($request->hasFile('photos')) {
            $images = $request->file('photos');

            foreach ($images as $img) {
                $name = Str::slug($request->title) . md5(rand()) . '.' . $img->getClientOriginalExtension();
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
                'vendor_id'             =>      Auth::guard('vendor')->user()->id,
                'sku'                   =>      $random_sku,
                'title'                 =>      $request->title,
                'slug'                  =>      Str::slug($request->title),
                'cat_1'                 =>      $request->cat_1,
                'cat_2'                 =>      $request->cat_2,
                'cat_3'                 =>      $request->cat_3,
                'tags'                  =>      json_encode($request->tags),
                'brand'                 =>      $request->brand,
                'short_desc'            =>      $request->short_desc,
                'long_desc'             =>      $request->long_desc,
                'price'                 =>      $request->price,
                'sell_price'            =>      $request->sell_price,
                'video'                 =>      $request->video,
                'image'                 =>      json_encode($gallery),
                'status'                =>      false,
            ]);
            return redirect()->route('vendor.products.all')->with('msg','Product added successfully, and under review');
        }



    }




    // all products load
    public function vendorAllProducts()
    {
        if (request()->ajax()) {

            return datatables()->of(Product::where('trash', 0)->where('vendor_id', Auth::guard('vendor')->user()->id)->get())

            ->addColumn('sl', function ($data) {

                //SL no genarate
                $count = 1;
                return $count = $count + 1;
            })


                ->addColumn('title', function ($data) {

                $img_arr = json_decode($data->image);

                $image_path = url('storage/products') . '/' . $img_arr[0];

                return '<img style="width:30px; margin-left:-30px;" src="' . $image_path . '">' . ' ' . $data->title;
            })

                ->addColumn('category', function ($data) {

                return $data->mainCat->name;
            })

            ->addColumn('brand', function ($data) {

                return $data->getBrand->name;
            })
            ->addColumn('price', function ($data) {
                if ($data->sell_price) {
                    $price = '<ins class="new-price">৳ '.$data->sell_price.'</ins>
                                <del class="old-price">৳ '.$data->price.'</del>';
                } else {
                    $price = '<ins class="new-price">৳ '.$data->price.'</ins>';
                }

                return $price;
            })

                ->addColumn(
                    'status',
                    function ($data) {

                        //status btn checked unchecked
                        $status_check = $data->status ? 'checked' : '';


                        if ($data->status == 1) {
                            return '<p class="badge bg-success" style="font-size: 12px;">Active</p>';

                        } else {
                            return '<p class="badge bg-danger" style="font-size: 12px;">Inactive</p>';
                        }
                    }
                )

                ->addColumn(
                    'action',
                    function ($data) {

                        //Action btn show by conditions

                        $reeee = url('/vendor/product/edit/');
                        $del = url('/vendor/products/delete/');


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

                            $button .= '<a href="' . $reeee . '/' . $data->slug . '" product_edit_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-warning btn-sm product_edit_btn"><i class="fa fa-edit"></i></a> ';

                            $button .= '<a href="#" product_delete_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger btn-sm product_delete_btn"><i class="fa fa-trash"></i></a>';
                            return $button;
                        }
                    }
                )

                ->rawColumns(['sl', 'title', 'category', 'brand', 'price', 'status', 'action'])->make();
        }
    }



     // product edit page load
     public function editProduct($slug)
     {
        $product = Product::where('slug', $slug)->first();
        $tags = ProductTag::all();
        $cats_1 = ProductCategoryGrandMother::all();
        $cats_2 = productCategorySecond::all();
        $cats_3 = ProductCategoryThird::all();
        $brands = Brand::all();
        $images = json_decode($product->image);

        return view('frontend.pages.vendore.edit-product', [
            'tags'          => $tags,
            'cats_1'          => $cats_1,
            'cats_2'          => $cats_2,
            'cats_3'          => $cats_3,
            'brands'          => $brands,
            'product'          => $product,
            'images'          => $images,
        ]);
     }


     // product update
    public function updateProduct(Request $request)
    {


        $data = Product::where('slug', $request->slug)->first();
        $this->validate(
            $request,
            [
                'title'          => 'required',
                'short_desc'     => 'required',
                'long_desc'      => 'required',
                'tags'           => 'required',
                'cat_1'          => 'required',
                'brand'          => 'required',
                'price'          => 'required',
            ],
            [
                'title.required'       => 'The product title field is requred !',
                'short_desc.required'  => 'The short description is requred !',
                'long_desc.required'   => 'The long description is requred !',
                'tags.required'        => 'The product tags is requred !',
                'cat_1.required'       => 'The category is requred !',
                'brand.required'       => 'The brand name is requred !',
                'price.required'       => 'The price is requred !',
            ]
        );




        $new_name = '';
        $newGallery = [];
        if ($request->hasFile('new_photos')) {
            $images = $request->file('new_photos');

            foreach ($images as $img) {
                $new_name = Str::slug($request->title) . md5(rand()) . '.' . $img->getClientOriginalExtension();
                array_push($newGallery, $new_name);
                $extention = $img->getClientOriginalExtension();

                $inter = Image::make($img->getRealPath());
                $inter->save(storage_path('app/public/products/') . $new_name);

            }

        }

        $new_name = array_merge($request->old_photos, $newGallery);

        $data->title        = $request->title;
        $data->sku          = $request->sku;
        $data->slug         = Str::slug($request->title);
        $data->cat_1        = $request->cat_1;
        $data->cat_2        = $request->cat_2;
        $data->cat_3        = $request->cat_3;
        $data->tags         = json_encode($request->tags);
        $data->brand        = $request->brand;
        $data->short_desc   = $request->short_desc;
        $data->long_desc    = $request->long_desc;
        $data->price        = $request->price;
        $data->sell_price   = $request->sell_price;
        $data->status       = false;
        $data->image        = json_encode($new_name);

        $data->update();

        return redirect()->route('vendor.products.all')->with('msg', 'Product updated successfully and gone to review');


    }


    /*
    |--------------------------------------------------------------------------
    |  delete product
    |--------------------------------------------------------------------------
    */
    public function productDelete($id)
    {

        $data = Product::find($id);

        $images = json_decode($data->image);

        // foreach ($images as $image) {
        //     $image_path = storage_path('app/public/products/') . $image;
        //     if (file_exists($image_path)) {
        //         unlink($image_path);
        //     }
        //     return $image;
        // }



        // $data->delete();
    }




    // all products page load
    public function account()
    {
        return view('frontend.pages.vendore.account');
    }


    // shop settings page load
    public function shopSettings()
    {
        $data = Vendor::where('id', Auth::guard('vendor')->user()->id)->first();

        if ($data->logo == null) {
            $logo = url('backend/img/profile/upload-logo.jpg');
        } else {
            $logo = url('storage/vendors').'/'.$data->logo;
        }
        if ($data->banner == null) {
            $banner = url('backend/img/profile/upload-banner.jpg');
        } else {
            $banner = url('storage/vendors').'/'.$data->banner;
        }

        return view('frontend.pages.vendore.shop-settings', [
            'data'          =>$data,
            'logo'          =>$logo,
            'banner'        =>$banner,
        ]);
    }





    // vendor logo banner update
    public function logoBanner(Request $request)
    {

        $this->validate(
            $request,
            [
                'logo'          => 'required',
                'banner'     => 'required',
            ],
            [
                'logo.required'       => 'Please upload a logo !',
                'banner.required'       => 'Please upload a banner !',
            ]
        );

        $data = Vendor::find($request->id);
        $logo = '';
        if ($request->hasFile('logo')) {
            $img = $request->file('logo');
            $logo = Str::slug($data->store_name) . md5(rand()) . '.' . $img->getClientOriginalExtension();
            $extention = $img->getClientOriginalExtension();
            if (file_exists(storage_path('app/public/vendors/') . $data->logo) && $data->logo != null) {
                unlink(storage_path('app/public/vendors/') . $data->logo);
            }
            $inter = Image::make($img->getRealPath());
            $inter->save(storage_path('app/public/vendors/') . $logo);
        } else {
            $logo = $request->old_photo;
        }
        $banner = '';
        if ($request->hasFile('banner')) {
            $img = $request->file('banner');

            $banner = Str::slug($data->store_name) . md5(rand()) . '.' . $img->getClientOriginalExtension();
            $extention = $img->getClientOriginalExtension();
            if (file_exists(storage_path('app/public/vendors/') . $data->banner) && $data->banner != null) {
                unlink(storage_path('app/public/vendors/') . $data->banner);
            }
            $inter = Image::make($img->getRealPath());
            $inter->save(storage_path('app/public/vendors/') . $banner);
        } else {
            $banner = $request->old_banner;
        }

        $data->logo             = $logo;
        $data->banner           = $banner;

        $data->update();
        return back()->with('msg', 'Your shop logo and banner has been changed successful');
    }

















    //
}
