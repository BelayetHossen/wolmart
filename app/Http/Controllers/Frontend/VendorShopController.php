<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Backend\Product;
use App\Models\Frontend\Vendor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Backend\ProductCategoryGrandMother;

class VendorShopController extends Controller
{


    // all vendor page load
    public function vendorAll()
    {
        $vendors = Vendor::where('status', true)->where('trash', false)->get();
        $url = url('');
        return view('frontend.pages.all-vendor', [
            'vendors'  => $vendors,
            'url'  => $url,
        ]);
    }



    // one vendor page load
    public function vendor($username)
    {
        $vendor = Vendor::where('username', $username)->first();
        $v_products = Product::where('status', true)->where('vendor_id', $vendor->id)->get();
        $url = url('');
        $imgPath = url('') . '/storage';

        return view('frontend.pages.vendore.front.vendor', [
            'vendor'  => $vendor,
            'products'  => $v_products,
            'url'  => $url,
            'imgPath'  => $imgPath,
        ]);
    }

    // store detals update system
    public function storeDetailsUpdate(Request $request)
    {
        $data = Vendor::find($request->id);
        if ($data->store_name != $request->store_name) {
            $this->validate(
                $request,
                [
                    'store_name'                => 'unique:vendors',
                ],
                [
                    'store_name.unique'             => 'The store name is exist !',
                ]
            );
        }
        $this->validate(
            $request,
            [
                'store_name'                => 'required',
                'shop_addr'                 => 'required',
                'about'                     => 'required',
                'sat_start_time'            => 'required',
                'sat_end_time'              => 'required',
                'sun_start_time'            => 'required',
                'sun_end_time'              => 'required',
                'mon_start_time'            => 'required',
                'mon_end_time'              => 'required',
                'tue_start_time'            => 'required',
                'tue_end_time'              => 'required',
                'wed_start_time'            => 'required',
                'wed_end_time'              => 'required',
                'thu_start_time'            => 'required',
                'thu_end_time'              => 'required',
                'fri_start_time'            => 'required',
                'fri_end_time'              => 'required',
                'shipping_rules'            => 'required',
                'policy'                    => 'required',
            ],
            [
                'store_name.required'           => 'The store name field is requred !',
                'shop_addr.required'            => 'The shop location field is requred !',
                'about.required'                  => 'The about field is requred !',
                'sat_start_time.required'       => 'The field is requred !',
                'sat_end_time.required'           => 'The field is requred !',
                'sun_start_time.required'            => 'The field is requred !',
                'sun_end_time.required'          => 'The field is requred !',
                'mon_start_time.required'       => 'The field is requred !',
                'mon_end_time.required'            => 'The field is requred !',
                'tue_start_time.required'         => 'The field is requred !',
                'tue_end_time.required'         => 'The field is requred !',
                'wed_start_time.required'       => 'The field is requred !',
                'wed_end_time.required'         => 'The field is requred !',
                'thu_start_time.required'       => 'The field is requred !',
                'thu_end_time.required'         => 'The field is requred !',
                'fri_start_time.required'         => 'The field is requred !',
                'fri_end_time.required'         => 'The field is requred !',
                'shipping_rules.required'       => 'The shipping rules field is requred !',
                'policy.required'               => 'The policy field is requred !',

            ]
        );


        $store_name = Str::slug($request->store_name);
        $store_url = '/agent/' . $store_name;

        $store_time = [
            'sat' => [
                'start' => $request->sat_start_time,
                'end' => $request->sat_end_time
            ],
            'sun' => [
                'start' => $request->sun_start_time,
                'end' => $request->sun_end_time
            ],
            'mon' => [
                'start' => $request->mon_start_time,
                'end' => $request->mon_end_time
            ],
            'tue' => [
                'start' => $request->tue_start_time,
                'end' => $request->tue_end_time
            ],
            'wed' => [
                'start' => $request->wed_start_time,
                'end' => $request->wed_end_time
            ],
            'thu' => [
                'start' => $request->thu_start_time,
                'end' => $request->thu_end_time
            ],
            'fri' => [
                'start' => $request->fri_start_time,
                'end' => $request->fri_end_time
            ],
        ];

        $data->store_name          = $request->store_name;
        $data->store_url           = $store_url;
        $data->shop_addr           = $request->shop_addr;
        $data->about               = $request->about;
        $data->store_time          = json_encode($store_time);
        $data->shipping_rules      = $request->shipping_rules;
        $data->policy              = $request->policy;
        $data->update();

        return back()->with('msg', 'Your shop details has been updated successfully');
    }
    // account detals update system
    public function accountDetailsUpdate(Request $request)
    {
        $data = Vendor::find($request->id);
        if ($data->phone != $request->phone) {
            $this->validate(
                $request,
                [
                    'phone'                => 'unique:vendors',
                ],
                [
                    'phone.unique'             => 'The phone number is exist !',
                ]
            );
        }
        if ($data->email != $request->email) {
            $this->validate(
                $request,
                [
                    'email'                => 'unique:vendors',
                ],
                [
                    'email.unique'             => 'The email is exist !',
                ]
            );
        }
        $this->validate(
            $request,
            [
                'first_name'                => 'required',
                'last_name'                 => 'required',
                'phone'                     => 'required',
                'email'            => 'required',
                'country'              => 'required',
                'region'            => 'required',
                'zilla'              => 'required',
                'thana'            => 'required',
                'post'              => 'required',
                'post_code'            => 'required',
                'bank'              => 'required',

            ],
            [
                'first_name.required'           => 'The first name field is requred !',
                'last_name.unique'             => 'The last name field is requred !',
                'phone.required'            => 'The phone field is requred !',
                'email.required'                  => 'The email field is requred !',
                'country.required'       => 'The country field is requred !',
                'region.required'           => 'The region field is requred !',
                'zilla.required'            => 'The zilla field is requred !',
                'thana.required'          => 'The thana field is requred !',
                'post.required'       => 'The post field is requred !',
                'post_code.required'            => 'The post code field is requred !',
                'bank.required'         => 'The bank field is requred !',

            ]
        );


        $data->f_name           = $request->first_name;
        $data->l_name           = $request->last_name;
        $data->phone            = $request->phone;
        $data->email            = $request->email;
        $data->country          = $request->country;
        $data->region           = $request->region;
        $data->zilla            = $request->zilla;
        $data->thana            = $request->thana;
        $data->post             = $request->post;
        $data->post_code        = $request->post_code;
        $data->bank             = $request->bank;
        $data->update();

        return back()->with('msg', 'Your account details has been updated successfully');
    }



















    //
}
