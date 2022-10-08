<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Frontend\Vendor;
use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use Illuminate\Support\Facades\Hash;

class AdminVendorController extends Controller
{
    // index
    public function index()
    {
        return view('backend.pages.vendor.index');
    }
    //trashed vendor index
    public function TrashedVendorIndex()
    {
        return view('backend.pages.vendor.trashed');
    }

    // all vendors load
    public function allvendors()
    {
        if (request()->ajax()) {

            return datatables()->of(Vendor::where('trash', false)->get())

                ->addColumn('sl', function ($data) {

                    //SL no genarate
                    $count = 1;
                    return $count = $count + 1;
                })
                ->addColumn('name', function ($data) {

                    return $data->f_name . ' ' . $data->l_name;
                })
                ->addColumn(
                    'status',
                    function ($data) {

                        //status btn checked unchecked
                        $status_check = $data->status ? 'checked' : '';


                        $button = '<label class="switch">
                                <input value="' . $data->id . '" id="vendor_status_btn" type="checkbox" ' . $status_check . '>
                                <span class="slider round"></span>
                        </label>';
                        return $button;
                    }
                )
                ->addColumn(
                    'action',
                    function ($data) {

                        //Action btn show by conditions

                        $reeee = url('/vendor/edit/');

                        $button = '';

                        $button .= '<a href="#" vendor_view_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="View" class="btn btn-warning btn-sm vendor_view_btn"><i class="fa fa-eye"></i></a> ';

                        $button .= '<a href="' . $reeee . '/' . $data->id . '" vendor_edit_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-warning btn-sm vendor_edit_btn"><i class="fa fa-edit"></i></a> ';

                        $button .= '<a href="#" vendor_trash_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Move to trash" class="btn btn-danger btn-sm vendor_trash_btn"><i class="fa fa-trash"></i></a>';
                        return $button;
                    }
                )

                ->rawColumns(['sl', 'name', 'status', 'action'])->make();
        }
    }

    // Trashed vendors load
    public function trashedvendors()
    {
        if (request()->ajax()) {

            return datatables()->of(Vendor::where('trash', true)->get())

                ->addColumn('sl', function ($data) {

                    //SL no genarate
                    $count = 1;
                    return $count = $count + 1;
                })
                ->addColumn('name', function ($data) {

                    return $data->f_name . ' ' . $data->l_name;
                })
                ->addColumn(
                    'status',
                    function ($data) {

                        return '<a class="badge bg-warning mx-2" style="font-size: 12px;">Trashed</a>';
                    }
                )
                ->addColumn(
                    'action',
                    function ($data) {

                        //Action btn show by conditions

                        $reeee = url('/vendor/edit/');

                        $button = '';

                        $button .= '<a href="#" vendor_trash_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Restore" class="btn btn-success btn-sm vendor_trash_btn"><i class="fa-solid fa-trash-arrow-up"></i></a> ';
                        $button .= '<a href="#" vendor_delete_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Delete permanently" class="btn btn-danger btn-sm vendor_delete_btn"><i class="fa fa-trash"></i></a>';
                        return $button;
                    }
                )

                ->rawColumns(['sl', 'name', 'status', 'action'])->make();
        }
    }



    /*
    |--------------------------------------------------------------------------
    | vendor add
    |--------------------------------------------------------------------------
    */
    public function addVendor(Request $request)
    {

        $exist_phone        =  Vendor::where('phone', $request->phone)->first();
        $exist_email        =  Vendor::where('email', $request->email)->first();
        $exist_username     =  Vendor::where('username', $request->username)->first();


        $store_name = Str::slug($request->store_name);
        $store_url = '/agent/' . $store_name;

        if (!empty($exist_phone)) {
            return [
                'phone_check' => 'phone_exist'
            ];
        } else if (!empty($exist_email)) {
            return [
                'email_check' => 'email_exist'
            ];
        } else if (!empty($exist_username)) {
            return [
                'username_check' => 'username_exist'
            ];
        } else {
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
                'status'        => true,
            ]);

            return [
                'f' => false
            ];
        }
    }

    /*
    |--------------------------------------------------------------------------
    | vendor status change
    |--------------------------------------------------------------------------
    */
    public function vendorStatus($id)
    {
        $data = Vendor::find($id);
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
    | Edit vendor
    |--------------------------------------------------------------------------
    */
    public function vendorEdit($id)
    {

        $data = Vendor::find($id);

        $dhaka_select = ($data->region == 'Dhaka') ? 'selected' : '';
        $raj_select = ($data->region == 'Rajshahi') ? 'selected' : '';
        $rang_select = ($data->region == 'Rangpur') ? 'selected' : '';
        $mym_select = ($data->region == 'Mymenshingh') ? 'selected' : '';
        $khul_select = ($data->region == 'Khulna') ? 'selected' : '';
        $bari_select = ($data->region == 'Barishal') ? 'selected' : '';
        $syl_select = ($data->region == 'Sylhet') ? 'selected' : '';
        $chi_select = ($data->region == 'Chittagong') ? 'selected' : '';


        $region_list = '<option value="">-Select-</option>
                        <option value="Dhaka" ' . $dhaka_select . '>Dhaka</option>
                        <option value="Rajshahi" ' . $raj_select . '>Rajshahi</option>
                        <option value="Rangpur"' . $rang_select . '>Rangpur</option>
                        <option value="Mymenshingh"' . $mym_select . '>Mymenshingh</option>
                        <option value="Khulna"' . $khul_select . '>Khulna</option>
                        <option value="Barishal"' . $bari_select . '>Barishal</option>
                        <option value="Sylhet"' . $syl_select . '>Sylhet</option>
                        <option value="Chittagong"' . $chi_select . '>Chittagong</option>';


        return [
            'vendor'        => $data,
            'region_list'        => $region_list,
        ];
    }
    /*
    |--------------------------------------------------------------------------
    | Update vendor
    |--------------------------------------------------------------------------
    */
    public function vendorUpdate(Request $request)
    {

        $data = Vendor::find($request->id);
        $exist_username = '';
        $exist_phone = '';
        $exist_email = '';
        if ($data->username != $request->username) {
            $exist_username = Vendor::where('username', $request->username)->first();
            if (!empty($exist_username)) {
                return [
                    'username_check' => 'username_exist'
                ];
            }
        }
        if ($data->phone != $request->phone) {
            $exist_phone = Vendor::where('phone', $request->phone)->first();
            if (!empty($exist_phone)) {
                return [
                    'phone_check' => 'phone_exist'
                ];
            }
        }
        if ($data->email != $request->email) {
            $exist_email = Vendor::where('email', $request->email)->first();
            if (!empty($exist_email)) {
                return [
                    'email_check' => 'email_exist'
                ];
            }
        }
        $store_name = Str::slug($request->store_name);
        $store_url = '/agent/' . $store_name;
        if (empty($exist_username) && empty($exist_phone) && empty($exist_email)) {
            $data->f_name = $request->first_name;
            $data->l_name = $request->last_name;
            $data->username = $request->username;
            $data->phone = $request->phone;
            $data->email = $request->email;
            $data->store_name = $request->store_name;
            $data->store_url = $store_url;
            $data->country = $request->country;
            $data->region = $request->region;
            $data->zilla = $request->zilla;
            $data->thana = $request->thana;
            $data->post = $request->post;
            $data->post_code = $request->post_code;
            $data->shop_addr = $request->shop_addr;
            $data->bank = $request->bank;
            $data->update();
            return [
                'f' => false
            ];
        }
    }
    /*
    |--------------------------------------------------------------------------
    | vendor trash and restore system
    |--------------------------------------------------------------------------
    */
    public function vendorTrashRestore($id)
    {

        $data = Vendor::find($id);
        if ($data->trash == false) {
            $data->trash = true;
            $data->update();
            return 'trash';
        } else {
            $data->trash = false;
            $data->update();
            return 'restore';
        }
    }
    /*
    |--------------------------------------------------------------------------
    | vendor delete system
    |--------------------------------------------------------------------------
    */
    public function vendorDelete($id)
    {

        $data = Vendor::find($id);
        $products = Product::where('vendor_id', $id)->get();

        // if (count($products) != 0) {
        //     foreach ($products as $product) {
        //         $product->delete();
        //     }
        // }
        $data->delete();
    }
}
