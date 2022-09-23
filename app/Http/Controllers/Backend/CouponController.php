<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    // index
    public function Index()
    {
        return view('backend.pages.coupons.index');
    }
    /*
    |--------------------------------------------------------------------------
    | All coupon show to table
    |--------------------------------------------------------------------------
    */
    public function allCoupons(){

        $data = Coupon::latest()->get();
        $count = 1;
        $coupon_list = '';
        foreach ($data as $coupon) {

            $status_check = $coupon->status ? 'checked' : '';
            if ($coupon->trash == 0) {
                $button = '<td><label class="switch">
                                    <input value="' . $coupon->id . '" id="coupon_status_btn" type="checkbox" ' . $status_check . '>
                                    <span class="slider round"></span>
                            </label></td>';
            } else {
                $button =  '<td><p class="badge bg-danger" style="font-size: 12px;">Trashed</p></td>';
            }
            if ($coupon->trash == 0) {
                $action = '<td>
                                <a href="#" coupon_view_id="' . $coupon->id . '" data-toggle="tooltip" data-placement="top" title="View" class="btn btn-warning btn-sm coupon_view_btn"><i class="fa fa-eye"></i></a>
                                <a href="#" coupon_edit_id="' . $coupon->id . '" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-warning btn-sm coupon_edit_btn"><i class="fa fa-edit"></i></a>
                                <a href="#" coupon_delete_id="' . $coupon->id . '" data-toggle="tooltip" data-placement="top" title="Delete permanently" class="btn btn-danger btn-sm coupon_delete_btn"><i class="fa fa-trash"></i></a>

                            </td>';
            } else {
                $button =  '<td><p class="badge bg-danger" style="font-size: 12px;">Trashed</p></td>';
            }

            $coupon_list .= '<tr class="">';
            $coupon_list .= '<td>'.$count++.'</td>';
            $coupon_list .= '<td>'.$coupon->title.'</td>';
            $coupon_list .= '<td>'.$coupon->code.'</td>';
            $coupon_list .= '<td>'.$coupon->start_date.'</td>';
            $coupon_list .= $button;
            $coupon_list .= $action;
            $coupon_list .= '</tr>';
        }
        return $coupon_list;
    }

    /*
    |--------------------------------------------------------------------------
    | create
    |--------------------------------------------------------------------------
    */
    public function create(Request $request)
    {
        $title_check = Coupon::where('title', $request->title)->first();
        $coupon_check = Coupon::where('code', $request->code)->first();
        if (!empty($title_check)) {
            return [
                'title' => 'exist'
            ];
        } elseif (!empty($coupon_check)) {
            return [
                'code' => 'exist'
            ];
        } else {
            Coupon::create([
                'title' =>$request->title,
                'code' =>$request->code,
                'type' =>$request->dis_type,
                'amount' =>$request->amount,
                'percentage' =>$request->percentage,
                'start_date' =>$request->start_date,
                'end_date' =>$request->end_date,
            ]);
        }
    }
    /*
    |--------------------------------------------------------------------------
    | edit
    |--------------------------------------------------------------------------
    */
    public function edit($id)
    {
        $data = Coupon::find($id);
        $type_sec = '';
        $type_sec .= '<option value="0">-Select-</option>';

        if ($data->type == 1) {
            $show = 1;
        } else if ($data->type == 2) {
            $show = 2;
        }
        $selected1 = ($data->type == 1) ? 'selected' : '' ;
        $selected2 = ($data->type == 2) ? 'selected' : '' ;
        $type_sec .= '<option value="1"'.$selected1.'>Flat rate</option>';
        $type_sec .= '<option value="2"'.$selected2.'>Percentage</option>';
        return [
            'coupon' => $data,
            'type' => $type_sec,
            'show' => $show,
        ];

    }


    /*
    |--------------------------------------------------------------------------
    | update
    |--------------------------------------------------------------------------
    */
    public function update(Request $request)
    {
        $data = Coupon::find($request->id);

        if ($request->title != $data->title) {
            $title_check = Coupon::where('title', $request->title)->first();
            if (!empty($title_check)) {
                return [
                    'title' => 'exist'
                ];
            }
        }
        if ($request->code != $data->code) {
            $coupon_check = Coupon::where('code', $request->code)->first();
            if (!empty($coupon_check)) {
                return [
                    'code' => 'exist'
                ];
            }
        }
        if (empty($title_check) && empty($coupon_check)) {

            $data->title = $request->title;
            $data->code = $request->code;
            $data->type = $request->dis_type;
            $data->amount = $request->amount;
            $data->percentage = $request->percentage;
            $data->start_date = $request->start_date;
            $data->end_date = $request->end_date;
            $data->update();
        }

    }

    /*
    |--------------------------------------------------------------------------
    | status change system
    |--------------------------------------------------------------------------
    */
    public function statusChange($id)
    {
        $data = Coupon::find($id);
        if ($data->status == false) {
            $data->status = true;
            $data->update();
            return [
                'status' => true
            ];
        } else {
            $data->status = false;
            $data->update();
        }
    }
    /*
    |--------------------------------------------------------------------------
    | delete system
    |--------------------------------------------------------------------------
    */
    public function delete($id)
    {
        $data = Coupon::find($id);
        $data->delete();
    }



    //
}
