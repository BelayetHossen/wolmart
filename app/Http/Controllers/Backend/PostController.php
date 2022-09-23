<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use App\Models\Backend\Post;
use Illuminate\Http\Request;
use App\Models\Backend\Brand;
use App\Models\Backend\ProductTag;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use App\Models\Backend\ProductCategoryGrandMother;
use App\Models\Backend\productCategorySecond;
use App\Models\Backend\ProductCategoryThird;

class PostController extends Controller
{
    // posts index
    public function index()
    {
        return view('backend.pages.posts.index');
    }



    // all posts load
    public function allPosts()
    {
        if (request()->ajax()) {

            return datatables()->of(Post::where('trash', false)->get())

                ->addColumn('sl', function ($data) {

                    //SL no genarate
                    $count = 1;
                    return $count = $count + 1;
                })
                ->addColumn('photo', function ($data) {


                    $image_path = url('storage/posts') . '/' . $data->image;

                    return '<img style="width:60px;" src="' . $image_path . '">';
                })

                ->addColumn('title', function ($data) {

                    return  mb_strimwidth($data->title, 0, 25).'..';
                })

                ->addColumn('category', function ($data) {

                return $data->mainCat->name;
            })

            ->addColumn('brand', function ($data) {

                return $data->getBrand->name;
            })

                ->addColumn(
                    'status',
                    function ($data) {

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

                ->addColumn(
                    'action',
                    function ($data) {

                    //Action btn show by conditions

                    $reeee = url('/post/edit/');


                    if (
                        $data->trash == 1
                    ) {

                        $button = '';

                        $button .= '<a href="#" post_trash_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Restore" class="btn btn-success btn-sm post_trash_btn"><i class="fa fa-undo"></i></a> ';
                        $button .= '<a href="#" post_delete_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Delete Permanently" class="btn btn-danger btn-sm post_delete_btn"><i class="fas fa-skull-crossbones"></i></a>';
                        return $button;
                    } else {
                        $button = '';

                        $button .= '<a href="#" post_view_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="View" class="btn btn-warning btn-sm post_view_btn"><i class="fa fa-eye"></i></a> ';

                        $button .= '<a href="' . $reeee . '/' . $data->id . '" post_edit_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-warning btn-sm post_edit_btn"><i class="fa fa-edit"></i></a> ';

                        $button .= '<a href="#" post_trash_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Move to trash" class="btn btn-danger btn-sm post_trash_btn"><i class="fa fa-trash"></i></a>';
                        return $button;
                    }
                }
            )

                ->rawColumns(['sl','photo', 'title', 'category', 'brand', 'status', 'action'])->make();
        }
    }



    // posts index
    public function trashedindex()
    {
        return view('backend\pages\posts\trashed-post');
    }



    // trashed Posts load
    public function trashedPosts()
    {
        if (request()->ajax()) {

            return datatables()->of(Post::where('trash', true)->get())

                ->addColumn('sl', function ($data) {

                    //SL no genarate
                    $count = 1;
                    return $count = $count + 1;
                })
                ->addColumn('photo', function ($data) {


                    $image_path = url('storage/posts') . '/' . $data->image;

                    return '<img style="width:60px;" src="' . $image_path . '">';
                })

                ->addColumn('title', function ($data) {

                    return mb_strimwidth($data->title, 0, 25).'..';
                })

                ->addColumn('category', function ($data) {

                return $data->mainCat->name;
            })

            ->addColumn('brand', function ($data) {

                return $data->getBrand->name;
            })

                ->addColumn(
                    'status',
                    function ($data) {

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

                ->addColumn(
                    'action',
                    function ($data) {


                $button = '';

                $button .= '<a href="#" post_trash_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Restore" class="btn btn-success btn-sm post_trash_btn"><i class="fa fa-undo"></i></a> ';
                $button .= '<a href="#" post_delete_id="' . $data->id . '" data-toggle="tooltip" data-placement="top" title="Delete Permanently" class="btn btn-danger btn-sm post_delete_btn"><i class="fas fa-skull-crossbones"></i></a>';
                return $button;

                }
            )

                ->rawColumns(['sl','photo', 'title', 'category', 'brand', 'status', 'action'])->make();
        }
    }


    /*
    |--------------------------------------------------------------------------
    | post add page load
    |--------------------------------------------------------------------------
    */
    public function addPost()
    {
        $tags = ProductTag::all();
        $cats_1 = ProductCategoryGrandMother::all();
        $brands = Brand::all();

        return view('backend.pages.posts.add-post', [
            'tags' => $tags,
            'cats_1' => $cats_1,
            'brands' => $brands,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | post store to database
    |--------------------------------------------------------------------------
    */
    public function storePost( Request $request )
    {

        $this->validate(
            $request,
            [
                'title'          => 'required|unique:posts',
                'long_desc'      => 'required',
                'photo'          => 'required',
                'tags'           => 'required',
                'cat_1'          => 'required',
                'brand'          => 'required',
            ],
            [
                'title.required'       => 'The title field is requred !',
                'title.unique'         => 'The title is already taken !',
                'long_desc.required'   => 'The long description is requred !',
                'photo.required'       => 'The photo is requred !',
                'tags.required'        => 'The tags is requred !',
                'cat_1.required'       => 'The category is requred !',
                'brand.required'       => 'The brand is requred !',
            ]
        );

        $image = '';
        if ($request->hasFile('photo')) {
            $img = $request->file('photo');

            $image = Str::slug($request->title).md5(rand()) . '.' . $img->getClientOriginalExtension();

            $inter = Image::make($img->getRealPath());
            $inter->save(storage_path('app/public/posts/') . $image);
        }


        Post::create([
            'publisher_id'          =>      Auth::guard('siteuser')->user()->id,
            'title'                 =>      $request->title,
            'slug'                  =>      Str::slug($request->title),
            'cat_1'                 =>      $request->cat_1,
            'cat_2'                 =>      $request->cat_2,
            'cat_3'                 =>      $request->cat_3,
            'tags'                  =>      json_encode($request->tags),
            'brand'                 =>      $request->brand,
            'long_desc'             =>      $request->long_desc,
            'video'                 =>      $request->video,
            'image'                 =>      $image,
        ]);
        return redirect()->route('admin.post.index')->with('msg','New post added successfully');
    }



    /*
    |--------------------------------------------------------------------------
    | post edit page load
    |--------------------------------------------------------------------------
    */
    public function editPost($id)
    {
        $post = Post::find($id);
        $tags = ProductTag::all();
        $cats_1 = ProductCategoryGrandMother::all();
        $cats_2 = productCategorySecond::all();
        $cats_3 = ProductCategoryThird::all();
        $brands = Brand::all();

        return view('backend.pages.posts.edit-post', [
            'post' => $post,
            'tags' => $tags,
            'cats_1' => $cats_1,
            'cats_2' => $cats_2,
            'cats_3' => $cats_3,
            'brands' => $brands,
        ]);
    }



    /*
    |--------------------------------------------------------------------------
    | post update
    |--------------------------------------------------------------------------
    */
    public function updatePost( Request $request )
    {
        $post = Post::find($request->id);

        if ($request->title != $post->title) {
            $this->validate($request , [
                'title'          => 'unique:posts',
            ],[
                'title.unique'         => 'The title is already taken !',
            ]);
        }

        $this->validate(
            $request,
            [
                'title'          => 'required',
                'long_desc'      => 'required',
                'photo'          => 'required',
                'tags'           => 'required',
                'cat_1'          => 'required',
                'brand'          => 'required',
            ],
            [
                'title.required'       => 'The title field is requred !',
                'long_desc.required'   => 'The long description is requred !',
                'photo.required'       => 'The photo is requred !',
                'tags.required'        => 'The tags is requred !',
                'cat_1.required'       => 'The category is requred !',
                'brand.required'       => 'The brand is requred !',
            ]
        );

        $image = '';
        if ($request->hasFile('photo')) {
            $img = $request->file('photo');
            $image = Str::slug($request->title).md5(rand()) . '.' . $img->getClientOriginalExtension();
            $inter = Image::make($img->getRealPath());
            $inter->save(storage_path('app/public/posts/') . $image);
            if (file_exists(storage_path('app/public/posts/') . $post->image) && $post->image != null) {
                unlink(storage_path('app/public/posts/') . $post->image);
            }
        } else {
            $image = $request->old_photo;
        }

        $post->publisher_id         = Auth::guard('siteuser')->user()->id;
        $post->title                = $request->title;
        $post->slug                 = Str::slug($request->title);
        $post->long_desc            = $request->long_desc;
        $post->cat_1                = $request->cat_1;
        $post->cat_2                = $request->cat_2;
        $post->cat_3                = $request->cat_3;
        $post->tags                 = json_encode($request->tags);
        $post->brand                = $request->brand;
        $post->video                = $request->video;
        $post->image                = $image;

        $post->update();

        return redirect()->route('admin.post.index')->with('msg','The post has beed updated successfully');


    }


    // post trash restore system
    public function trashRestore($id)
    {
        $post = Post::find($id);
        if ($post->trash == false) {
            $post->trash = true;
            $post->status = true;
            $post->update();
        } else {
            $post->trash = false;
            $post->status = false;
            $post->update();
            return [
                'key' => 'back'
            ];
        }

    }


    // Post delete
    public function postDelete($id)
    {
        $post = Post::find($id);
        $post->delete();
        if (file_exists(storage_path('app/public/posts/') . $post->image) && $post->image != null) {
            unlink(storage_path('app/public/posts/') . $post->image);
        }
    }















    //
}
