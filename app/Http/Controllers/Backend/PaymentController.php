<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Backend\Currency;
use App\Http\Controllers\Controller;
use App\Models\Backend\PaymentGateway;

class PaymentController extends Controller
{
    // Index
    public function Index()
    {
        $currencies = Currency::all();
        return view('backend.pages.payment.index', [
            'currencies' => $currencies
        ]);
    }

    // all payment table
    public function paymentAll()
    {
        if (request()->ajax()) {
            return datatables()->of(PaymentGateway::all())
            ->addColumn(
                'action',
                function ($data) {
                    $button = '';

                    $button .= '<a href="#" payment_edit_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-warning btn-sm payment_edit_btn"><i class="fa fa-edit"></i></a> ';

                    $button .= '<a href="#" payment_delete_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger btn-sm payment_delete_btn"><i class="fa fa-trash"></i></a>';
                    return $button;

                }
            )
            ->rawColumns(['action'])
             ->make();
        }
    }

    // pament gateway create
    public function paymentCreate(Request $request)
    {
        if ($request->type == 'autometic') {
            $info = [
                    'client_id' => $request->client_id,
                    'client_secret' => $request->client_secret,
            ];
            $information = json_encode($info);
        } else {
            $information = null;
        }

        if ($request->is_default == 1) {
            $is_default = $request->is_default;
        } else {
            $is_default = 0;
        }

        $exist_title=  PaymentGateway::where('title', $request->title)->first();
        if (!empty($exist_title)) {
            return [
                'title' => 'exist'
            ];
        } else {
            PaymentGateway::create([
                'name'          =>      $request->name,
                'title'         =>      $request->title,
                'sub_title'     =>      $request->sub_title,
                'details'       =>      $request->details,
                'type'          =>      $request->type,
                'information'   =>      $information,
                'keyword'       =>      Str::slug($request->name),
                'currency_id'   =>      json_encode($request->currency),
                'is_default'    =>      $is_default,
            ]);
        }
    }

    // payment edit
    public function paymentEdit($id)
    {
        $data = PaymentGateway::find($id);
        $currencies = Currency::all();
        $manual_select = ($data->type == 'manual') ? 'selected' : '' ;
        $auto_select = ($data->type == 'autometic') ? 'selected' : '' ;
        $type_cont = '<option value="manual" '.$manual_select.'>Manual</option>
                <option value="autometic" '.$auto_select.'>Autometic</option>';
        $default_checked = ($data->is_default == 1) ? 'checked' : '' ;
        $default_check = '<input name="is_default" class="form-check-input" type="checkbox" value="1" id="is_default"'.$default_checked.'>
                        <label class="form-check-label" for="is_default">Set as default
                        </label>';


        $currency_cont = '';
        foreach ($currencies as $currency) {
            $currency_cont .= '<div class="form-check">
                                <input name="currency[]" class="form-check-input" type="checkbox" value="'.$currency->id.'" id="'.$currency->id.'" >
                                <label class="form-check-label" for="'.$currency->id.'">
                                '.$currency->name.'
                                </label>
                            </div>';
        }

        return [
            'data' => $data,
            'type_cont' => $type_cont,
            'default_check' => $default_check,
            'currency_cont' => $currency_cont,
        ];
    }

    // pament gateway update
    public function paymentUpdate(Request $request)
    {
        $data = PaymentGateway::find($request->id);
        if ($request->type == 'autometic') {
            $info = [
                    'client_id' => $request->client_id,
                    'client_secret' => $request->client_secret,
            ];
            $information = json_encode($info);
        } else {
            $information = null;
        }
        if ($request->is_default == 1) {
            $is_default = $request->is_default;
        } else {
            $is_default = 0;
        }
        if ($request->title != $data->title) {
            $exist_title=  PaymentGateway::where('title', $request->title)->first();
        } else {
            $exist_title= '';
        }

        if (!empty($exist_title)) {
            return [
                'title' => 'exist'
            ];
        } else {
            $data->name         = $request->name;
            $data->title        = $request->title;
            $data->sub_title    = $request->sub_title;
            $data->details      = $request->details;
            $data->type         = $request->type;
            $data->information  = $information;
            $data->keyword      = Str::slug($request->name);
            $data->currency_id  = json_encode($request->currency);
            $data->is_default   = $is_default;
            $data->update();

        }
    }

    // payment delete
    public function paymentDelete($id)
    {
        $data = PaymentGateway::find($id);
        $data->delete();
    }
}
