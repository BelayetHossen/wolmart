<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ForgotPassword;
use App\Models\Frontend\Vendor;
use App\Mail\ForgotPasswordMail;
use App\Models\Frontend\Customer;
use App\Http\Controllers\Controller;
use App\Models\Backend\Siteuser;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    // load forgot password page
    public function index()
    {
        return view('frontend.pages.reset-password');
    }


    // load forgot password page
    public function getEmail(Request $request)
    {
        $existCustomer = Customer::where('email', $request->email)->get();
        $existVendor = Vendor::where('email', $request->email)->get();
        $existAdmin = Siteuser::where('email', $request->email)->get();
        $token = Str::random(56);
        if (count($existCustomer) == 1 || count($existVendor) == 1 || count($existAdmin) == 1) {
            ForgotPassword::create([
                'token' => $token,
                'email' => $request->email,
            ]);
            $mailData = url('') . '/password/reset/' . $token . '/' . $request->email;
            Mail::to($request->email)->send(new ForgotPasswordMail($mailData));
        } else {
            return ['exist' => 'not'];
        }
    }

    // load forgot password update page
    public function newPassword($token, $email)
    {
        return view('frontend.pages.update-password', [
            'token' => $token,
            'email' => $email,
        ]);
    }
    // password update system
    public function updatePassword(Request $request)
    {
        $existCustomer = Customer::where('email', $request->email)->get();
        $existVendor = Vendor::where('email', $request->email)->get();
        $existAdmin = Siteuser::where('email', $request->email)->get();

        if (count($existCustomer) > 0) {
            $data = Customer::where('email', $request->email)->first();
        }
        if (count($existVendor) > 0) {
            $data = Vendor::where('email', $request->email)->first();
        }
        if (count($existAdmin) > 0) {
            $data = Siteuser::where('email', $request->email)->first();
        }

        $token = ForgotPassword::where('email', $request->email)->get();
        $delete = ForgotPassword::where('email', $request->email)->first();


        if (count($token) == 0) {
            return [
                't_valid' => 'expired'
            ];
        } else {
            $data->password = Hash::make($request->password);
            $data->update();
            $delete->delete();
            if (count($existAdmin) > 0) {
                return [
                    'user' => 'admin'
                ];
            }
        }
    }
}
