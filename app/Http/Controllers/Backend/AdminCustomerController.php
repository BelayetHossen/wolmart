<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Frontend\Customer;
use App\Http\Controllers\Controller;
use App\Models\Backend\Order;
use Illuminate\Support\Facades\Hash;

class AdminCustomerController extends Controller
{
    // index
    public function index()
    {
        return view('backend.pages.customer.index');
    }
    // trashed customer index
    public function indexTrashed()
    {
        return view('backend.pages.customer.trashed');
    }

    // all customers load
    public function allCustomers()
    {
        if (request()->ajax()) {

            return datatables()->of(Customer::where('trash', false)->get())

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
                                <input value="' . $data->id . '" id="customer_status_btn" type="checkbox" ' . $status_check . '>
                                <span class="slider round"></span>
                        </label>';
                        return $button;
                    }
                )
                ->addColumn(
                    'action',
                    function ($data) {

                        //Action btn show by conditions

                        $reeee = url('/customer/edit/');

                        $button = '';

                        $button .= '<a href="#" customer_view_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="View" class="btn btn-warning btn-sm customer_view_btn"><i class="fa fa-eye"></i></a> ';

                        $button .= '<a href="' . $reeee . '/' . $data->id . '" customer_edit_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-warning btn-sm customer_edit_btn"><i class="fa fa-edit"></i></a> ';

                        $button .= '<a href="#" customer_trash_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Move to trash" class="btn btn-danger btn-sm customer_trash_btn"><i class="fa fa-trash"></i></a>';
                        return $button;
                    }
                )

                ->rawColumns(['sl', 'name', 'status', 'action'])->make();
        }
    }

    // Trashed customers load
    public function trashedCustomers()
    {
        if (request()->ajax()) {

            return datatables()->of(Customer::where('trash', true)->get())

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

                        $reeee = url('/customer/edit/');

                        $button = '';

                        $button .= '<a href="#" customer_trash_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Restore" class="btn btn-success btn-sm customer_trash_btn"><i class="fa-solid fa-trash-arrow-up"></i></a> ';
                        $button .= '<a href="#" customer_delete_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Delete permanently" class="btn btn-danger btn-sm customer_delete_btn"><i class="fa fa-trash"></i></a>';
                        return $button;
                    }
                )

                ->rawColumns(['sl', 'name', 'status', 'action'])->make();
        }
    }



    /*
    |--------------------------------------------------------------------------
    | customer add
    |--------------------------------------------------------------------------
    */
    public function addCustomer(Request $request)
    {

        $exist_phone        =  Customer::where('phone', $request->phone)->first();
        $exist_email        =  Customer::where('email', $request->email)->first();
        $exist_username     =  Customer::where('username', $request->username)->first();



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
            Customer::create([
                'f_name'        => $request->first_name,
                'l_name'        => $request->last_name,
                'username'      => $request->username,
                'phone'         => $request->phone,
                'email'         => $request->email,
                'country'       => $request->country,
                'region'        => $request->region,
                'password'      => Hash::make($request->password),
            ]);

            return [
                'f' => false
            ];
        }
    }

    /*
    |--------------------------------------------------------------------------
    | customer status change
    |--------------------------------------------------------------------------
    */
    public function customerStatusChange($id)
    {
        $data = Customer::find($id);
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
    | Edit customer
    |--------------------------------------------------------------------------
    */
    public function customerEdit($id)
    {

        $data = Customer::find($id);

        $dhaka_select = ($data->region == 'Dhaka') ? 'selected' : '';
        $raj_select = ($data->region == 'Rajshahi') ? 'selected' : '';
        $rang_select = ($data->region == 'Rangpur') ? 'selected' : '';
        $mym_select = ($data->region == 'Mymenshing') ? 'selected' : '';
        $khul_select = ($data->region == 'Khulna') ? 'selected' : '';
        $bari_select = ($data->region == 'Barishal') ? 'selected' : '';
        $syl_select = ($data->region == 'Sylhet') ? 'selected' : '';
        $chi_select = ($data->region == 'Chittagong') ? 'selected' : '';


        $region_list = '<option value="">-Select-</option>
                        <option value="Dhaka" ' . $dhaka_select . '>Dhaka</option>
                        <option value="Rajshahi" ' . $raj_select . '>Rajshahi</option>
                        <option value="Rangpur"' . $rang_select . '>Rangpur</option>
                        <option value="Mymenshing"' . $mym_select . '>Mymenshing</option>
                        <option value="Khulna"' . $khul_select . '>Khulna</option>
                        <option value="Barishal"' . $bari_select . '>Barishal</option>
                        <option value="Sylhet"' . $syl_select . '>Sylhet</option>
                        <option value="Chittagong"' . $chi_select . '>Chittagong</option>';


        return [
            'customer'        => $data,
            'region_list'        => $region_list,
        ];
    }
    /*
    |--------------------------------------------------------------------------
    | Edit customer
    |--------------------------------------------------------------------------
    */
    public function customerUpdate(Request $request)
    {

        $data = Customer::find($request->id);
        $exist_username = '';
        $exist_phone = '';
        $exist_email = '';
        if ($data->username != $request->username) {
            $exist_username = Customer::where('username', $request->username)->first();
            if (!empty($exist_username)) {
                return [
                    'username_check' => 'username_exist'
                ];
            }
        }
        if ($data->phone != $request->phone) {
            $exist_phone = Customer::where('phone', $request->phone)->first();
            if (!empty($exist_phone)) {
                return [
                    'phone_check' => 'phone_exist'
                ];
            }
        }
        if ($data->email != $request->email) {
            $exist_email = Customer::where('email', $request->email)->first();
            if (!empty($exist_email)) {
                return [
                    'email_check' => 'email_exist'
                ];
            }
        }
        if (empty($exist_username) && empty($exist_phone) && empty($exist_email)) {
            $data->f_name = $request->first_name;
            $data->l_name = $request->last_name;
            $data->username = $request->username;
            $data->phone = $request->phone;
            $data->country = $request->country;
            $data->region = $request->region;
            $data->update();
            return [
                'f' => false
            ];
        }
    }
    /*
    |--------------------------------------------------------------------------
    | Customer trash and restore system
    |--------------------------------------------------------------------------
    */
    public function customerTrashRestore($id)
    {

        $data = Customer::find($id);
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
    | Customer delete system
    |--------------------------------------------------------------------------
    */
    public function customerDelete($id)
    {

        $data = Customer::find($id);
        $orders = Order::where('customer_id', $id)->get();

        if (count($orders) != 0) {
            foreach ($orders as $order) {
                $order->delete();
            }
        }
        $data->delete();
    }
}
