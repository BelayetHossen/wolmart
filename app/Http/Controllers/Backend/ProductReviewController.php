<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Product;
use App\Models\Frontend\ProductReview;
use Illuminate\Http\Request;

class ProductReviewController extends Controller
{
    // Product review index
    public function index()
    {
        return view('backend.pages.product.review.index');
    }
    // All review
    public function allReviews()
    {
        if (request()->ajax()) {
            return datatables()->of(ProductReview::all())
            ->addColumn('review',function($data){

                return $data->review;
            })
            ->addColumn('rating',function($data){

                return $data->rating .' Star';
            })
            ->addColumn('by',function($data){

                return $data->getReviewPublisher->email;
            })
            ->addColumn('status',function ($data) {
                    //status btn checked unchecked
                    $status_check = $data->status ? 'checked' : '';
                    if ($data->trash == 0) {
                        $button = '<label class="switch">
                            <input value="' . $data->id . '" id="product_status_btn" type="checkbox" ' . $status_check . '>
                            <span class="slider round"></span>
                    </label>';
                        return $button;
                    } else {
                        return '<p class="badge bg-danger" style="font-size: 12px;">Trashed</p>';
                    }
                }
            )
            ->addColumn('action',function($data){

                $button = '';
                $button .= '<a href="" review_edit_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-warning btn-sm review_edit_btn"><i class="fa fa-edit"></i></a> ';
                $button .= '<a href="#" review_trash_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Move to trash" class="btn btn-danger btn-sm review_delete_btn"><i class="fa fa-trash"></i></a>';
                return $button;
            })

            ->rawColumns(['review', 'rating', 'by', 'status', 'action'])
            ->make();
        }
    }

    // Review edit
    public function editReview($id)
    {
        $data = ProductReview::find($id);
        $products = Product::where('trash', false)->where('status', true)->get();
        $path = asset('storage/products');
        $product_list = '';
        foreach ($products as $product) {
            foreach (json_decode($product->image) as $img) {
                # code...
            }
            $product_list .= '<option value="1" >'.$product->title.'</option>';
        }

        $one_check = '';
        $two_check = '';
        $three_check = '';
        $four_check = '';
        $five_check = '';
        if ($data->rating == 1) {
            $one_check = 'selected' ;
        } else if ($data->rating == 2) {
            $two_check = 'selected' ;
        } else if ($data->rating == 3) {
            $three_check = 'selected' ;
        } else if ($data->rating == 4) {
            $four_check = 'selected' ;
        } else if ($data->rating == 5) {
            $five_check = 'selected' ;
        }

        $rating = '';
        $rating .= '<option value="1" '.$one_check.'>1 Star</option>
                    <option value="2" '.$two_check.'>2 Star</option>
                    <option value="3" '.$three_check.'>3 Star</option>
                    <option value="4" '.$four_check.'>4 Star</option>
                    <option value="5" '.$five_check.'>5 Star</option>';
        $status_on = '' ;
        $status_off = '' ;
        if ($data->status == 1) {
            $status_on = 'selected' ;
        } else if ($data->status == 0) {
            $status_off = 'selected' ;
        }
        $review = '';
        $review .= '<option value="0" '.$status_off.'>Off</option>
                    <option value="1" '.$status_on.'>On</option>';

        return [
            'data' => $data,
            'product' => $product_list,
            'rating' => $rating,
            'review' => $review,
        ];


    }













    //
}
