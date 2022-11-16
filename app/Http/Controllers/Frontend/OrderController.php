<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Backend\Order;
use Illuminate\Support\Carbon;
use App\Models\Backend\Product;
use App\Models\Backend\Shipping;
use App\Models\Frontend\Customer;
use App\Http\Controllers\Controller;
use App\Models\Backend\PaymentGateway;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Backend
    |--------------------------------------------------------------------------
    */
    // Order index
    public function index()
    {
        $orders = Order::where('trash', false)->get();
        return view('backend.pages.order.index', [
            'orders' => $orders,
        ]);
    }

    // all posts load
    public function allOrders()
    {
        if (request()->ajax()) {

            return datatables()->of(Order::latest()->get())

                ->addColumn('sl', function ($data) {

                    //SL no genarate
                    $count = 1;
                    return $count = $count + 1;
                })
                ->addColumn('contact', function ($data) {
                    if ($data->customer_email) {
                        $contact = $data->customer_email;
                    } else {
                        $contact = $data->customer_phone;
                    }
                    return $contact;
                })
                ->addColumn('ordernumber', function ($data) {

                    return $data->order_number;
                })
                ->addColumn('qty', function ($data) {

                    return $data->total_qty;
                })
                ->addColumn('price', function ($data) {

                    return '৳ ' . $data->total_price;
                })


                ->addColumn('status', function ($data) {
                    if ($data->status == 'On hold') {
                        $btn = '<p class="badge bg-warning" style="font-size: 12px;">' . $data->status . '</p>';
                    } else if ($data->status == 'Pending') {
                        $btn = '<p class="badge bg-info" style="font-size: 12px;">' . $data->status . '</p>';
                    } else if ($data->status == 'Processing') {
                        $btn = '<p class="badge bg-secondary" style="font-size: 12px;">' . $data->status . '</p>';
                    } else if ($data->status == 'Cancel') {
                        $btn = '<p class="badge bg-danger" style="font-size: 12px;">' . $data->status . '</p>';
                    } else if ($data->status == 'Complete') {
                        $btn = '<p class="badge bg-success" style="font-size: 12px;">' . $data->status . '</p>';
                    }

                    return $btn;
                })

                ->addColumn('action', function ($data) {
                    // $reeee = url('/order/edit/');
                    $cont = '<div class="dropdown">
                                    <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Action
                                    </button>
                                    <ul class="dropdown-menu bg-info">
                                        <li><a class="dropdown-item" href="' . url('/admin/order/details') . '/' . $data->id . '">View details</a></li>
                                        <li><a class="dropdown-item" href="' . url('/admin/order/edit/') . '/' . $data->id . '">Edit</a></li>
                                        <li><a class="dropdown-item" href="#">Send email</a></li>
                                        <li><a class="dropdown-item order_delete_btn" order_delete_id="' . $data->id . '" href="#">Delete</a></li>
                                    </ul>
                                </div>
                                <div class="dropdown">
                                    <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Change status
                                    </button>
                                    <ul class="dropdown-menu bg-success">
                                        <li><a value="On hold" order_status_id="' . $data->id . '" class="dropdown-item order_status_btn" href="#">On hold</a></li>
                                        <li><a value="Pending" order_status_id="' . $data->id . '" class="dropdown-item order_status_btn" href="#">Pending</a></li>
                                        <li><a value="Processing" order_status_id="' . $data->id . '" class="dropdown-item order_status_btn" href="#">Processing</a></li>
                                        <li><a value="Cancel" order_status_id="' . $data->id . '" class="dropdown-item order_status_btn" href="#">Cancel</a></li>
                                        <li><a value="Complete" order_status_id="' . $data->id . '" class="dropdown-item order_status_btn" href="#">Complete</a></li>
                                    </ul>
                                </div>';
                    return  $cont;
                })

                ->rawColumns(['sl', 'contact', 'ordernumber', 'qty', 'price', 'status', 'action'])->make();
        }
    }

    // order status change system
    public function orderStatus($id, $value)
    {
        $data = Order::find($id);
        $data->status = $value;
        $data->update();
    }

    // order status change system
    public function orderDetails($id)
    {
        $data = Order::find($id);
        $carts = json_decode($data->cart);
        return view('backend.pages.order.details', [
            'order' => $data,
            'carts' => $carts,
        ]);
    }

    // order edit
    public function orderEdit($id)
    {
        $data = Order::find($id);
        $carts = json_decode($data->cart);
        $shippings = Shipping::where('trash', false)->where('status', true)->get();
        return view('backend.pages.order.edit', [
            'order' => $data,
            'carts' => $carts,
            'shippings' => $shippings,
        ]);
    }

    // billing info update
    public function billingUpdate(Request $request)
    {
        $data = Order::find($request->id);
        $this->validate(
            $request,
            [
                'name'    => 'required',
                'phone'         => 'required|min:11|numeric',
                'email'         => 'required|email',
                'zilla'        => 'required',
                'thana'        => 'required',
                'post'        => 'required',
                'village'        => 'required',
                'post_code'        => 'required',
                'pickup_location'        => 'required',
            ],
            [
                'name.required'        => 'The last name field is requred !',
                'phone.required'            => 'The Mobile number is requred !',
                'phone.min'                 => 'The Mobile number is not correct !',
                'phone.numeric'             => 'The Mobile number is not correct !',
                'email.required'            => 'The email field is requred !',
                'email.email'               => 'The email is not correct !',
                'zilla.required'           => 'The zilla field is requred !',
                'thana.required'           => 'The thana field is requred !',
                'post.required'           => 'The post field is requred !',
                'village.required'           => 'The village field is requred !',
                'pickup_location.required'           => 'The pickup location field is requred !',
            ]
        );

        $data->customer_name        = $request->name;
        $data->customer_email       = $request->email;
        $data->customer_phone       = $request->phone;
        $data->customer_zilla       = $request->zilla;
        $data->customer_thana       = $request->thana;
        $data->customer_vill       = $request->village;
        $data->customer_post        = $request->post;
        $data->customer_post_code   = $request->post_code;
        $data->pickup_location      = $request->pickup_location;
        $data->update();
        return back()->with('msg', 'Billing details has been updated successfully');
    }
    // shipping info update
    public function shippingUpdate(Request $request)
    {
        $data = Order::find($request->id);
        $this->validate(
            $request,
            [
                'name2'    => 'required',
                'phone2'         => 'required|min:11|numeric',
                'email2'         => 'required|email',
                'zilla2'        => 'required',
                'thana2'        => 'required',
                'post2'        => 'required',
                'post_code2'        => 'required',
                'pickup_location2'        => 'required',
            ],
            [
                'name2.required'        => 'The last name field is requred !',
                'phone2.required'            => 'The Mobile number is requred !',
                'phone2.min'                 => 'The Mobile number is not correct !',
                'phone2.numeric'             => 'The Mobile number is not correct !',
                'email2.required'            => 'The email field is requred !',
                'email2.email'               => 'The email is not correct !',
                'zilla2.required'           => 'The zilla field is requred !',
                'thana2.required'           => 'The thana field is requred !',
                'post2.required'           => 'The post field is requred !',
                'pickup_location2.required'           => 'The pickup location field is requred !',
            ]
        );

        $data->shipping_name        = $request->name2;
        $data->shipping_email       = $request->email2;
        $data->shipping_phone       = $request->phone2;
        $data->shipping_zilla       = $request->zilla2;
        $data->shipping_thana       = $request->thana2;
        $data->shipping_post        = $request->post2;
        $data->shipping_post_code   = $request->post_code2;
        $data->pickup_location      = $request->pickup_location2;
        $data->update();
        return back()->with('msg', 'Shipping details has been updated successfully');
    }

    // Add order
    public function addOrder()
    {
        $customers = Customer::where('trash', false)->where('status', true)->get();
        $shippings = Shipping::where('trash', false)->where('status', true)->get();
        $payments = PaymentGateway::all();
        return view('backend.pages.order.add', [
            'shippings' => $shippings,
            'payments' => $payments,
        ]);
    }
    // get customer email list for add order
    public function getCustomerEmail()
    {
        $customers = Customer::where('trash', false)->where('status', true)->get();
        $email = ['-Select-'];
        foreach ($customers as $customer) {
            // $email = $customer->email;
            array_push($email, $customer->email);
        }
        return $email;
    }
    // get product for add order
    public function getProduct()
    {
        $products = Product::where('trash', false)->where('status', true)->get();
        $title = ['-Select-'];
        foreach ($products as $product) {
            // $email = $customer->email;
            array_push($title, $product->title);
        }
        return $title;
    }
    // product order create
    public function createOrder(Request $request)
    {
        $this->validate(
            $request,
            [
                'customer_email'    => 'required',
                'product'    => 'required',
                'shipping_id'    => 'required',
                'payment_method'    => 'required',
                'region'     => 'required',
                'pickup_location'         => 'required',
            ],
            [
                'customer_email.required'       => 'The email field is requred !',
                'product.required'       => 'The product field is requred !',
                'shipping_id.required'       => 'The shipping field is requred !',
                'payment_method.required'       => 'The Payment field is requred !',
                'region.required'       => 'The region field is requred !',
                'pickup_location.required'       => 'The pickup location field is requred !',
            ]
        );
        $customer = Customer::where('email', $request->customer_email)->first();
        $product = Product::where('title', $request->product)->first();

        if ($product->sell_price == null) {
            $price = $product->price;
        } else {
            $price = $product->sell_price;
        }
        $img_arr = json_decode($product->image);
        $img_path = url('') . '/storage/products/';


        $cart = [
            $request->customer_email => [
                "rowId" => $request->customer_email,
                "name" => $request->product,
                "qty" => "1",
                "price" => $price,
                "options" =>
                [
                    "image" => $img_arr[0],
                    "discount" => 0
                ]
            ]
        ];


        $shipping = Shipping::find($request->shipping_id);
        if ($request->region == 'Dhaka') {
            $shipping_price = $shipping->dha_price;
        } else if ($request->region == 'Rajshahi') {
            $shipping_price = $shipping->raj_price;
        } else if ($request->region == 'Rangpur') {
            $shipping_price = $shipping->rang_price;
        } else if ($request->region == 'Mymenshing') {
            $shipping_price = $shipping->mym_price;
        } else if ($request->region == 'Barishal') {
            $shipping_price = $shipping->bari_price;
        } else if ($request->region == 'Sylhet') {
            $shipping_price = $shipping->syl_price;
        } else if ($request->region == 'Chittagong') {
            $shipping_price = $shipping->chit_price;
        } else if ($request->region == 'Khulna') {
            $shipping_price = $shipping->khul_price;
        }

        if (count(Order::all()) < 1) {
            $order_number = Carbon::now()->format('jmY') . intval('0') + 1;
        } else {
            $order_number = intval(Order::max('order_number')) + 1;
        }





        Order::create([
            'customer_id'       => $customer->id,
            'cart'              => json_encode($cart),
            'shipping_id'       => $request->shipping_id,
            'payment_id'        => $request->payment_method,
            'shipping_fee'      => $shipping_price,
            'pickup_location'   => $request->pickup_location,
            'total_qty'         => '1',
            'order_number'      => $order_number,
            'payment_status'    => '12',
            'customer_name'     => $customer->f_name . ' ' . $customer->l_name,
            'customer_email'    => $customer->email,
            'customer_phone'    => $customer->phone,
            'customer_country'  => $customer->country,
            'customer_region'   => $customer->region,
            'customer_zilla'    => $customer->zilla,
            'customer_thana'    => $customer->thana,
            'customer_post'     => $customer->post,
            'customer_vill'     => $customer->village,
            'customer_post_code' => $customer->post_code,
            'shipping_name'     => $customer->f_name . ' ' . $customer->l_name,
            'shipping_email'    => $customer->email,
            'shipping_phone'    => $customer->phone,
            'shipping_country'  => $customer->country,
            'shipping_region'   => $customer->region,
            'shipping_zilla'    => $customer->zilla,
            'shipping_thana'    => $customer->thana,
            'shipping_post'     => $customer->post,
            'shipping_post_code' => $customer->post_code,
            'coupon_code'       => '12',
            'coupon_discount'   => '12',
            'total_price'       => $price + $shipping_price,
            'status'            => 'On hold',
            'packaging'         => 'No',
        ]);
        return back()->with('msg', 'A new order added successfully');
    }

    // order delete
    public function deleteOrder($id)
    {
        $data = Order::find($id);
        $data->delete();
    }
















    /*
    |--------------------------------------------------------------------------
    | Frontend
    |--------------------------------------------------------------------------
    */
    // Order index
    public function orderIndex($customer_id, $orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)->first();
        $orders = Order::where('customer_id', $customer_id)->get();
        $sub_total = str_replace(',', '', Cart::subtotal());
        return view('frontend.pages.shopping.order', [
            'order' => $order,
            'orders' => $orders,
            'sub_total' => $sub_total,
        ]);
    }

    // Order create
    public function orderCreate(Request $request)
    {



        if ($request->id == '') {
            $this->validate(
                $request,
                [
                    'username'    => 'required|unique:customers',
                    'password'    => 'required',
                    'firstname'    => 'required',
                    'lastname'     => 'required',
                    'phone'         => 'required|min:11|numeric',
                    'email'         => 'required|email',
                    'country'       => 'required',
                    'region'        => 'required',
                    'zilla'        => 'required',
                    'thana'        => 'required',
                    'post'        => 'required',
                    'village'        => 'required',
                    'post_code'        => 'required',
                    'pickup_location'        => 'required',
                ],
                [
                    'username.required'       => 'The username field is requred !',
                    'username.unique'       => 'The username is exist !',
                    'password.required'       => 'The password field is requred !',
                    'firstname.required'       => 'The first name field is requred !',
                    'lastname.required'        => 'The last name field is requred !',
                    'phone.required'            => 'The Mobile number is requred !',
                    'phone.min'                 => 'The Mobile number is not correct !',
                    'phone.numeric'             => 'The Mobile number is not correct !',
                    'email.required'            => 'The email field is requred !',
                    'email.email'               => 'The email is not correct !',
                    'country.required'          => 'The country field is requred !',
                    'region.required'           => 'The region field is requred !',
                    'zilla.required'           => 'The zilla field is requred !',
                    'thana.required'           => 'The thana field is requred !',
                    'post.required'           => 'The post field is requred !',
                    'village.required'           => 'The village field is requred !',
                    'pickup_location.required'           => 'The pickup location field is requred !',
                ]
            );
            Customer::create([
                'f_name'        => $request->firstname,
                'l_name'        => $request->lastname,
                'username'      => $request->username,
                'phone'         => $request->phone,
                'email'         => $request->email,
                'country'       => $request->country,
                'region'        => $request->region,
                'password'      => Hash::make($request->password),
            ]);
        }
        if ($request->id != '') {
            $this->validate(
                $request,
                [
                    'firstname'    => 'required',
                    'lastname'     => 'required',
                    'phone'         => 'required|min:11|numeric',
                    'email'         => 'required|email',
                    'country'       => 'required',
                    'region'        => 'required',
                    'zilla'        => 'required',
                    'thana'        => 'required',
                    'post'        => 'required',
                    'village'        => 'required',
                    'post_code'        => 'required',
                    'pickup_location'        => 'required',
                ],
                [
                    'firstname.required'       => 'The first name field is requred !',
                    'lastname.required'        => 'The last name field is requred !',
                    'phone.required'            => 'The Mobile number is requred !',
                    'phone.min'                 => 'The Mobile number is not correct !',
                    'phone.numeric'             => 'The Mobile number is not correct !',
                    'email.required'            => 'The email field is requred !',
                    'email.email'               => 'The email is not correct !',
                    'country.required'          => 'The country field is requred !',
                    'region.required'           => 'The region field is requred !',
                    'zilla.required'           => 'The zilla field is requred !',
                    'thana.required'           => 'The thana field is requred !',
                    'post.required'           => 'The post field is requred !',
                    'village.required'           => 'The village field is requred !',
                    'pickup_location.required'           => 'The pickup location field is requred !',
                ]
            );
            Customer::create([
                'f_name'        => $request->firstname,
                'l_name'        => $request->lastname,
                'username'      => $request->username,
                'phone'         => $request->phone,
                'email'         => $request->email,
                'country'       => $request->country,
                'region'        => $request->region,
                'password'      => Hash::make($request->password),
            ]);
        }

        // if ($request->shipping_checkbox == true) {
        //     $this->validate(
        //         $request,
        //         [
        //             'firstname2'    => 'required',
        //             'lastname2'     => 'required',
        //             'phone2'         => 'required|min:11|numeric',
        //             'email2'         => 'required|email',
        //             'country2'       => 'required',
        //             'region2'        => 'required',
        //             'zilla2'        => 'required',
        //             'thana2'        => 'required',
        //             'post2'        => 'required',
        //             'village2'        => 'required',
        //             'post_code2'        => 'required',
        //             'pickup_location2'        => 'required',
        //         ],
        //         [
        //             'firstname2.required'       => 'The first name field is requred !',
        //             'lastname2.required'        => 'The last name field is requred !',
        //             'phone2.required'            => 'The Mobile number is requred !',
        //             'phone2.min'                 => 'The Mobile number is not correct !',
        //             'phone2.numeric'             => 'The Mobile number is not correct !',
        //             'email2.required'            => 'The email field is requred !',
        //             'email2.email'               => 'The email is not correct !',
        //             'country2.required'          => 'The country field is requred !',
        //             'region2.required'           => 'The region field is requred !',
        //             'zilla2.required'           => 'The zilla field is requred !',
        //             'thana2.required'           => 'The thana field is requred !',
        //             'post2.required'           => 'The post field is requred !',
        //             'village2.required'           => 'The village field is requred !',
        //             'pickup_location2.required'           => 'The pickup location field is requred !',
        //         ]
        //     );
        // }



        if ($request->id != '') {
            $customer_id = $request->id;
        } else {
            $customer_id = Customer::max('id') + 1;
        }

        if ($request->pickup_location != '') {
            $pickup_location = $request->pickup_location;
        } else {
            $pickup_location = $request->pickup_location2;
        }

        if (empty(Order::all())) {
            $order_number = Carbon::now()->format('jmY') . intval('0') + 1;
        } else {
            $order_number = intval(Order::max('order_number')) + 1;
        }





        Order::create([
            'customer_id'       => $customer_id,
            'cart'              => Cart::content(),
            'shipping_id'       => Cookie::get('shipping_id'),
            'payment_id'        => $request->payment_method,
            'shipping_fee'      => $request->shipping_fee,
            'pickup_location'   => $pickup_location,
            'total_qty'         => Cart::count(),
            'order_number'      => $order_number,
            'payment_status'    => '12',
            'customer_name'     => $request->firstname . ' ' . $request->lastname,
            'customer_email'    => $request->email,
            'customer_phone'    => $request->phone,
            'customer_country'  => $request->country,
            'customer_region'   => $request->region,
            'customer_zilla'    => $request->zilla,
            'customer_thana'    => $request->thana,
            'customer_post'     => $request->post,
            'customer_vill'     => $request->village,
            'customer_post_code' => $request->post_code,
            'shipping_name'     => $request->firstname2 . ' ' . $request->lastname2,
            'shipping_email'    => $request->email2,
            'shipping_phone'    => $request->phone2,
            'shipping_country'  => $request->country2,
            'shipping_region'   => $request->region2,
            'shipping_zilla'    => $request->zilla2,
            'shipping_thana'    => $request->thana2,
            'shipping_post'     => $request->post2,
            'shipping_post_code' => $request->post_code2,
            'order_note'        => $request->order_note,
            'coupon_code'       => '12',
            'coupon_discount'   => '12',
            'total_price'       => $request->total_price,
            'status'            => 'On hold',
            'packaging'         => 'No',
        ]);

        return redirect('/product/order/' . $customer_id . '/' . $order_number);
    }
}
