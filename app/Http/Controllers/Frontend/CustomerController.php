<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Frontend\Customer;
use App\Http\Controllers\Controller;
use App\Models\Backend\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class CustomerController extends Controller
{
    // customer register page load
    public function customerRegister()
    {
        return view('frontend.pages.customer.register');
    }

    // customer dashboard page load
    public function index()
    {
        $customer = Auth::guard('customer')->user();
        $orders = Order::where('customer_id', $customer->id)->get();
        return view('frontend.pages.customer.dashboard', [
            'customer' => $customer,
            'orders' => $orders,
        ]);
    }


    // customer create account
    public function store(Request $request)
    {

        $this->validate(
            $request,
            [
                'first_name'    => 'required',
                'last_name'     => 'required',
                'username'      => 'required|unique:customers',
                'phone'         => 'required|unique:customers|min:11|numeric',
                'email'         => 'required|unique:customers|email',
                'country'       => 'required',
                'region'        => 'required',
                'password'      => 'required',
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
                'country.required'          => 'The country field is requred !',
                'region.required'           => 'The region field is requred !',
                'password.required'         => 'The password field is requred !',
                'privecy.required'          => 'Please check the privecy-policy !',
            ]
        );




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

        return redirect()->route('customer.login')->with('msg', 'You are successfully registered as our customer !');
    }








    // customer register page load
    public function customerLogin()
    {
        return view('frontend.pages.customer.login');
    }







    // customer login system
    public function customerLoginSystem(Request $request)
    {

        $email = strpos($request->email, "@");
        if ($request->customer_remember) {
            Cookie::queue('customer_email', $request->email, 1440);
            Cookie::queue('customer_password', $request->password, 1440);
        }

        if ($email == '') {
            if (Auth::guard('customer')->attempt(['phone' => $request->email, 'password' => $request->password])) {
                return [
                    'login' => 'logged_in'
                ];
            } else {
                return [
                    'login' => 'not'
                ];
            }
        } else {
            if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return [
                    'login' => 'logged_in'
                ];
            } else {
                return [
                    'login' => 'not'
                ];
            }
        }
    }

    // customer logout system
    public function customerLogout()
    {

        Auth::guard('customer')->logout();
        return redirect()->route('customer.login')->with('msg', 'You are log out ! You can login again bellow');
    }


    // customer order view system
    public function orderView($id)
    {
        $order = Order::find($id);
        $carts = json_decode($order->cart);
        return view('frontend.pages.customer.order', [
            'order' => $order,
            'carts' => $carts,
        ]);
    }


    // customer account details update system
    public function accountDetailsUpdate(Request $request)
    {
        $data = Customer::find($request->id);
        if ($request->phone != $data->phone) {
            $phone_check = Customer::where('phone', $request->phone)->first();
        } else {
            $phone_check = '';
        }
        if ($request->email != $data->email) {
            $email_check = Customer::where('email', $request->email)->first();
        } else {
            $email_check = '';
        }
        if (empty($phone_check) && empty($email_check)) {
            $data->f_name = $request->first_name;
            $data->l_name = $request->last_name;
            $data->phone = $request->phone;
            $data->country = $request->country;
            $data->region = $request->region;
            $data->zilla = $request->zilla;
            $data->thana = $request->thana;
            $data->post = $request->post;
            $data->post_code = $request->post_code;
            $data->update();
        } else {
            return [
                'check' => 'exist'
            ];
        }
    }

    // customer password change
    public function customerPasswordChange(Request $request)
    {
        $data = Customer::find($request->id);

        if (!Hash::check($request->cur_password, Auth::guard('customer')->user()->password)) {
            return [
                'password' => 'not match'
            ];
        } else {
            $data->password = Hash::make($request->new_password);
            $data->update();
            return [
                'update' => 'done'
            ];
        }
    }

















    //
}
