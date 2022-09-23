<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\Backend\Currency;
use App\Http\Controllers\Controller;

class CurrencyController extends Controller
{
    // Index
    public function Index()
    {
        return view('backend.pages.currency.index');
    }
    // all currency table
    public function allCurrency()
    {
        if (request()->ajax()) {
            return datatables()->of(Currency::all())
            ->addColumn(
                'action',
                function ($data) {
                    $button = '';

                    $button .= '<a href="#" currency_edit_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-warning btn-sm currency_edit_btn"><i class="fa fa-edit"></i></a> ';

                    $button .= '<a href="#" currency_delete_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Delete" class="btn btn-danger btn-sm currency_delete_btn"><i class="fa fa-trash"></i></a>';
                    return $button;

                }
            )
            ->rawColumns(['action'])
             ->make();
        }
    }
    // currency Create
    public function currencyCreate(Request $request)
    {
        $exist_name=  Currency::where('name', $request->name)->first();

        if (!empty($exist_name)) {
            return [
                'name' => 'exist'
            ];
        } else {
            Currency::create([
                'name'          =>      $request->name,
                'symbol'        =>      $request->symbol,
                'value'         =>      $request->value
            ]);
        }
    }
    // currency Create
    public function currencyEdit($id)
    {
        $data = Currency::find($id);
        return $data;
    }
    // currency Update
    public function currencyUpdate(Request $request)
    {
        $data = Currency::find($request->id);
        $exist_name=  Currency::where('name', $request->name)->first();
        if ($data->name != $request->name) {
            if (!empty($exist_name)) {
                return [
                    'name' => 'exist'
                ];
            }
        }
        if (empty($exist_name)) {
            $data->name          =      $request->name;
            $data->symbol        =      $request->symbol;
            $data->value         =      $request->value;
            $data->update();
        }
    }
    // currency Delete
    public function currencyDelete($id)
    {
        $data = Currency::find($id);
        $data->delete();
    }
}
