<?php

/*
|--------------------------------------------------------------------------
    1. brand page view/load
    2. All Brands load
    3. Brand add
    4. Brand status Update
    5. Edit brand
    6. Update brand
    7. Brand trash - restore  system
    8. Brand delete system
|--------------------------------------------------------------------------
*/






namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Backend\Brand;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{

/*
|--------------------------------------------------------------------------
| 1. brand page view/load
|--------------------------------------------------------------------------
*/
public function brandPageLoad(){

    return view('backend.pages.product.brand.index');
}


/*
|--------------------------------------------------------------------------
| 2. All Brands load
|--------------------------------------------------------------------------
*/
public function allAdminBrands(){

    $data = Brand::all();
    $count = 1;
    $brand_list = '';
    foreach ($data as $brand) {




        //status btn checked unchecked
        $status_check = $brand->status ? 'checked' : '';


        //Action btn show by conditions

        if ($brand->trash == 1) {
            $bg = 'bg-danger';
            $button = '<a href="#" brand_restore_id="'.$brand->id.'" data-toggle="tooltip" data-placement="top" title="Restore" class="btn btn-success btn-sm brand_restore_btn"><i class="fa fa-undo"></i></a>
            <a href="#" brand_delete_id="'.$brand->id.'" data-toggle="tooltip" data-placement="top" title="Delete Permanently" class="btn btn-danger btn-sm brand_delete_btn"><i class="fas fa-skull-crossbones"></i></a>
            ';
            $status_btn = '<p class="text-dark bg-info p-2">Restore first</p>';
        } else {
            $bg = '';
            $button = '<a href="#" brand_edit_id="'.$brand->id.'" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-warning btn-sm brand_edit_btn"><i class="fa fa-edit"></i></a>
            <a href="#" brand_trash_id="'.$brand->id.'" data-toggle="tooltip" data-placement="top" title="Move to trash" class="btn btn-danger btn-sm brand_trash_btn"><i class="fa fa-trash"></i></a>';

            $status_btn = ' <label class="switch">
                                <input value="'.$brand->id.'" id="brand_status_btn" type="checkbox" '.$status_check.'>
                                <span class="slider round"></span>
                            </label>
                          ';
        }


        // background color by status
        $sbg = '';
        if ($brand->trash == 0 && $brand->status == 0) {
            $sbg = 'bg-warning';
        } else {
            $sbg = '';
        }


        $logo = asset('storage/brands').'/'.$brand->logo;

        $brand_list .= '<tr class="'.$bg.''.  $sbg.'">';
        $brand_list .= '<td>'.$count++.'</td>';
        $brand_list .= '<td>'.$brand->name.'</td>';
        $brand_list .= '<td>'.$brand->slug.'</td>';
        $brand_list .= '<td>'.$status_btn.'</td>';
        $brand_list .= '<td><img style="width: 60px;" src="'.$logo.'"></td>';
        $brand_list .= '<td>
                            <a href="#" brand_view_id="'.$brand->id.'" data-toggle="tooltip" data-placement="top" title="View" class="btn btn-info btn-sm view_brand_btn"><i class="fa fa-eye"></i></a>
                            '.$button.'
                        </td>';
        $brand_list .= '</tr>';
    }
    return $brand_list;

}


/*
|--------------------------------------------------------------------------
| 3. Brand add
|--------------------------------------------------------------------------
*/
public function AddBrand(Request $request){

    $file_name = '';
    if ($request->hasFile('logo')) {
        $file = $request->file('logo');
        $file_name = Str::slug($request->name).'-brand-logo.'.$file->getClientOriginalExtension();

        $extention = $file->getClientOriginalExtension();
        if ($extention == 'jpg' || $extention == 'jpeg' || $extention == 'png' || $extention == 'webp') {
            $file->move(storage_path('app/public/brands'),$file_name);
        }

    }

    $exist_name=  Brand::where('name', $request->name)->first();

    if (!empty($exist_name)) {
        return [
            'f' => 'Hi'
        ];
    } else if ($request->file('logo') == '') {
        return [
            'logo' => 'empty'
        ];
    } else {
        Brand::create([
            'name'              =>      $request->name,
            'slug'              =>      Str::slug($request->name),
            'logo'              =>      $file_name
        ]);
        return [
            'f' => 'Hello'
        ];
    }

}


/*
|--------------------------------------------------------------------------
| 4. Brand status Update
|--------------------------------------------------------------------------
*/
public function updateBrandStatus($id){

    $data = Brand::find($id);

    if ($data->status==true) {
        $data->status = false;
    } else {
        $data->status = true;
    }
    $data->update();
}


/*
|--------------------------------------------------------------------------
| 5. Edit brand
|--------------------------------------------------------------------------
*/
public function editBrand($id){

    $data = Brand::find($id);

   return [
       'id'        => $data->id,
       'name'      => $data->name,
       'old_logo' => $data->logo,
       'photo_path' => url('storage/brands/'),
   ];

}


/*
|--------------------------------------------------------------------------
| 6. Update brand
|--------------------------------------------------------------------------
*/
public function updateBrand(Request $request , $id){

    $data = Brand::find($id);


    $image_path = storage_path('app/public/brands/').$data->logo;

    $file_name = '';
    if ($request->hasFile('new_logo')) {
        $file = $request->file('new_logo');

    } else {
        $file = $request->file('old_logo');
    }

    $file_name = Str::slug($request->name).'-brand-logo.'.md5(rand()).'.'.$file->getClientOriginalExtension();

    $extention = $file->getClientOriginalExtension();

    if ($extention == 'jpg' || $extention == 'jpeg' || $extention == 'png' || $extention == 'webp') {
        $file->move(storage_path('app/public/brands'),$file_name);
    }
    if(file_exists($image_path)){
        unlink($image_path);
    }



    if ($data->name != $request->name) {
        $exist_name        =  Brand::where('name', $request->name)->first();
    } else {
        $exist_name = '';
    }


    if (!empty($exist_name)) {
        return [
            'f' => 'Hi'
        ];
    } else {
        $data->name                     =      $request->name;
        $data->slug                     =      Str::slug($request->name);
        $data->logo                     =      $file_name;

        $data->update();

        return [
            'f' => false
        ];
    }

}


/*
|--------------------------------------------------------------------------
| 7. Brand trash - restore  system
|--------------------------------------------------------------------------
*/
public function trashRestoreBrand($id){
    $data = Brand::find($id);

    if ($data->trash==false) {

        $data->trash = true;
        $data->status = false;
        $data -> update();

    } else {
        $data->trash = false;
        $data->status = true;
        $data -> update();
    }

}


/*
|--------------------------------------------------------------------------
| 8. Brand delete system
|--------------------------------------------------------------------------
*/
public function deleteBrand($id){

    $data = Brand::find($id);
    $data -> delete();

    $image_path = storage_path('app/public/brands/').$data->logo;
    if(file_exists($image_path)){
        unlink($image_path);
    }

}
















}
