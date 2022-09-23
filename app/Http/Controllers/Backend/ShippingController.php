<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    // shipping settings page load
    public function shippingIndex()
    {
        return view('backend.pages.settings.shipping.index');
    }
    // shipping load in data table
    public function shippingAll()
    {
        if (request()->ajax()) {
            return datatables()->of(Shipping::where('trash', false)->get())
            ->addColumn('status', function($data){
                $status_check = $data->status ? 'checked' : '';
                $button = '<label class="switch">
                            <input value="' . $data->id . '" id="shipping_status_btn" type="checkbox" ' . $status_check . '>
                            <span class="slider round"></span>
                        </label>';
                    return $button;
            })
            ->addColumn('action', function($data){
                $button = '';
                $button .= '<a href="#" shipping_edit_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-warning btn-sm shipping_edit_btn"><i class="fa fa-edit"></i>Edit</a> ';

                $button .= '<a href="#" shipping_delete_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger btn-sm shipping_delete_btn"><i class="fa fa-trash"></i>Delete</a>';
                return $button;
            })
            ->rawColumns(['status','action'])
            ->make();
        }
    }
    // Shipping create system
    public function shippingCreate(Request $request)
    {
        $exist_title=  Shipping::where('title', $request->title)->first();

        if (!empty($exist_title)) {
            return [
                'exist' => 'yes'
            ];
        } else {
            Shipping::create([
                'title'              =>      $request->title,
                'duration'           =>      $request->duration,
                'dha_price'          =>      $request->dha_price,
                'bari_price'         =>      $request->bari_price,
                'chit_price'         =>      $request->chit_price,
                'khul_price'         =>      $request->khul_price,
                'mym_price'          =>      $request->mym_price,
                'raj_price'          =>      $request->raj_price,
                'rang_price'         =>      $request->rang_price,
                'syl_price'          =>      $request->syl_price,
            ]);
        }
    }
    // Shipping edit
    public function shippingEdit($id)
    {
        return $data = Shipping::find($id);

    }
    // Shipping edit
    public function shippingUpdate(Request $request)
    {
        $data = Shipping::find($request->id);

        if ($request->title != $data->title) {
            $exist_title =  Shipping::where('title', $request->title)->first();
        } else {
            $exist_title = '';
        }
        if (!empty($exist_title)) {
            return [
                'exist' => 'yes'
            ];
        } else {
            $data->title    = $request->title;
            $data->duration = $request->duration;
            $data->dha_price    = $request->dha_price;
            $data->bari_price    = $request->bari_price;
            $data->chit_price    = $request->chit_price;
            $data->khul_price    = $request->khul_price;
            $data->mym_price    = $request->mym_price;
            $data->raj_price    = $request->raj_price;
            $data->rang_price    = $request->rang_price;
            $data->syl_price    = $request->syl_price;
            $data->update();
        }

    }

    //Role status Update
    public function shippingStatus($id){

        $data = Shipping::find($id);

        if ($data->status==true) {
            $data->status = false;
        } else {
            $data->status = true;
        }
        $data->update();
    }
    //Role delete
    public function shippingDelete($id){

        $data = Shipping::find($id);
        $data->delete();
    }
}
