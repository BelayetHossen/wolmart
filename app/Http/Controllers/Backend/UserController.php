<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Role;
use App\Models\Backend\Siteuser;
use App\Models\Frontend\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{

/*
|--------------------------------------------------------------------------
| User page view/load
|--------------------------------------------------------------------------
*/
public function adminUserView(){

    $role = Role::where('status', 1)->where('trash', 0)->get();

    $random_number = str_shuffle(time(). 'QWERTYUIOPASDFGHJKLZXCVBNM@#$%^&*()_+<>?";:/,.');
    $random_pass = substr($random_number, 5, 8);

    if (request()->ajax()) {

        return datatables()->of(Siteuser::where('trash', 0)->get())

        ->addColumn('sl',function($data){

            //SL no genarate
            $count = 1;
            return $count=$count+1;
        })

        ->addColumn('role',function($data){


            return $data->role->name;
        })

        ->addColumn('photo',function($data){
            $image_path = url('storage/users').'/'.$data->photo;
            $image_male = url('storage/gender_photo/male.jpg');
            $image_female = url('storage/gender_photo/female.jpg');

            if ($data->photo == '' ) {
                if ($data->gender == 'Male') {
                    return '<img style="width:35px;" src="'.$image_male.'">';
                }

                if ($data->gender == 'female') {
                    return '<img style="width:35px;" src="'.$image_female.'">';
                }

            } else {
                return '<img style="width:35px;" src="'.$image_path.'">';
            }
        })

        ->addColumn('status',function($data){

            //status btn checked unchecked
            $status_check = $data->status ? 'checked' : '';

            $button = '<label class="switch">
                            <input value="'.$data->id.'" id="user_status_btn" type="checkbox" '.$status_check.'>
                            <span class="slider round"></span>
                    </label>';
            return $button;

        })

        ->addColumn('action',function($data){

                $button = '';
                $button .= '<a href="#" user_view_id="'.$data->id.'" data-toggle="tooltip" data-placement="top" title="View" class="btn btn-info btn-sm view_user_btn"><i class="fa fa-eye"></i></a> ';

                $button .= '<a href="#" user_edit_id="'.$data->id.'" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-warning btn-sm user_edit_btn"><i class="fa fa-edit"></i></a> ';

                $button .= '<a href="#" user_trash_id="'.$data->id.'" data-toggle="tooltip" data-placement="top" title="Move to trash" class="btn btn-danger btn-sm user_trash_btn"><i class="fa fa-trash"></i></a>';
                return $button;


        })

            ->rawColumns(['sl','role','photo','status','action'])

            ->make();

    }


    return view('backend.pages.users.index',[
        'role' => $role,
        'rand_pass' => $random_pass,
    ]);
}


/*
|--------------------------------------------------------------------------
| admin/staff User page view/load
|--------------------------------------------------------------------------
*/
public function boxViewUsersLoad(){

    $staff_users = Siteuser::where('status', 1)->where('trash', 0)->get();
    return view('backend.pages.users.staff-users', [
        'siteusers' => $staff_users
    ]);
}

/*
|--------------------------------------------------------------------------
| admin/staff User settings page view/load
|--------------------------------------------------------------------------
*/
public function userSettings(){



    return view('backend.pages.users.user-settings');
}



/*
|--------------------------------------------------------------------------
| Trashed User page view/load
|--------------------------------------------------------------------------
*/

public function trashedUsersLoad(){

    $role = Role::where('status', 1)->where('trash', 0)->get();

    if (request()->ajax()) {

        return datatables()->of(Siteuser::where('trash', 1)->get())

        ->addColumn('sl',function($data){

            //SL no genarate
            $count = 1;
            return $count=$count+1;
        })

        ->addColumn('role',function($data){


            return $data->role->name;
        })

        ->addColumn('photo',function($data){
            $image_path = url('storage/users').'/'.$data->photo;
            $image_male = url('storage/gender_photo/male.jpg');
            $image_female = url('storage/gender_photo/female.jpg');

            if ($data->photo == '' ) {
                if ($data->gender == 'Male') {
                    return '<img style="width:35px;" src="'.$image_male.'">';
                }

                if ($data->gender == 'female') {
                    return '<img style="width:35px;" src="'.$image_female.'">';
                }

            } else {
                return '<img style="width:35px;" src="'.$image_path.'">';
            }
        })

        ->addColumn('action',function($data){

            $button = '';

            $button .= '<a href="#" user_restore_id="'.$data->id.'" data-toggle="tooltip" data-placement="top" title="Restore" class="btn btn-success btn-sm user_restore_btn"><i class="fa fa-undo"></i></a> ';

            $button .= '<a href="#" user_delete_id="'.$data->username.'" data-toggle="tooltip" data-placement="top" title="Delete Permanently" class="btn btn-danger btn-sm user_delete_btn"><i class="fas fa-skull-crossbones"></i></a>';
            return $button;
        })

        ->rawColumns(['sl','role','photo','action'])->make();
    }

    return view('backend.pages.users.trash-users');

}






/*
|--------------------------------------------------------------------------
| User add
|--------------------------------------------------------------------------
*/
public function adminUserAdd(Request $request){

    $exist_phone        =  Siteuser::where('phone', $request->phone)->first();
    $exist_email        =  Siteuser::where('email', $request->email)->first();
    $exist_username     =  Siteuser::where('username', $request->username)->first();

    $file_name = '';
    if ($request->hasFile('photo')) {
        $file = $request->file('photo');
        $file_name = md5(rand()).'.'.$file->getClientOriginalExtension();

        $extention = $file->getClientOriginalExtension();
        if ($extention == 'jpg' || $extention == 'jpeg' || $extention == 'png' ||$extention == 'webp') {
            $file->move(storage_path('app/public/users'),$file_name);
        }

    } else {

        $file = '';
    }

    if (!empty($exist_phone)) {
        return [
            'phone_check' => 'phone_exist'
        ];
    } else if (!empty($exist_email)) {
        return [
            'email_check' => 'email_exist'
        ];
    } else if (!empty($exist_username)) {
        return [
            'username_check' => 'username_exist'
        ];
    } else {
        Siteuser::create([
            'name'                  =>      $request->name,
            'role_id'               =>      $request->role_id,
            'username'              =>      $request->username,
            'phone'                 =>      $request->phone,
            'email'                 =>      $request->email,
            'password'              =>      Hash::make($request->password),
            'gender'                =>      $request->gender,
            'photo'                 =>      $file_name,
        ]);
        $store_name = Str::slug($request->name);
        $store_url = '/agent/'.$store_name;
        Vendor::create([
            'f_name'        => $request->name,
            'username'      => $request->username,
            'phone'         => $request->phone,
            'email'         => $request->email,
            'store_name'    => $store_name,
            'store_url'     => $store_url,
            'password'      => Hash::make($request->password),
            'status'        => true,
        ]);
        return [
            'f' => false
        ];
    }
}


/*
|--------------------------------------------------------------------------
| User status Update
|--------------------------------------------------------------------------
*/
public function adminUserStatus($id){

    $data = Siteuser::find($id);

    if ($data->status==true) {
        $data->status = false;
    } else {
        $data->status = true;
    }
    $data->update();
}


/*
|--------------------------------------------------------------------------
| Edit user
|--------------------------------------------------------------------------
*/
public function edituser($id){

     $data = Siteuser::find($id);

     $role_data = Role::where('status', 1)->where('trash', 0)->get();

     // role show
        $role_list = '';
        $role_list .= '<select name="role_id" class="form-control">';
        $role_list .= '<option value="" disabled>-Select-</option>';
            foreach ($role_data as $role){
                $selected = '';
                if($data->role_id == $role->id){
                    $selected = 'selected';
                } else {
                    $selected = '';
                }
                $role_list .= '<option value="'.$role->id.'" '.$selected.'>'.$role->name.'</option>';
            }
        $role_list .='</select>';

        // gender select
        $male_check = '';
        if($data->gender == 'Male'){
            $male_check = 'selected';
        } else {
            $male_check = '';
        }
        $female_check = '';
        if($data->gender == 'Female'){
            $female_check = 'selected';
        } else {
            $female_check = '';
        }
        // gender show
        $gender_list = '';
        $gender_list .= '<select name="gender" class="form-control">';
        $gender_list .= '<option value="" disabled>-Select-</option>';

                $gender_list .= '<option value="Male" '.$male_check.'>Male</option>';
                $gender_list .= '<option value="Female" '.$female_check.'>Female</option>';

        $gender_list .='</select>';

    return [
        'id'        => $data->id,
        'name'      => $data->name,
        'username'  => $data->username,
        'phone'     => $data->phone,
        'email'     => $data->email,
        'role'      => $role_list,
        'gender'    => $gender_list,
        'old_photo' => $data->photo,
        'photo_path' => url('storage/users/'),
    ];

}

/*
|--------------------------------------------------------------------------
| Update user
|--------------------------------------------------------------------------
*/
public function updateUser(Request $request){

    $data = Siteuser::find($request->edit_id);

    if ($data->phone != $request->phone) {
        $exist_phone        =  Siteuser::where('phone', $request->phone)->first();
    } else {
        $exist_phone = '';
    }

    if ($data->email != $request->email) {
        $exist_email        =  Siteuser::where('email', $request->email)->first();
    } else {
        $exist_email = '';
    }

    if ($data->username != $request->username) {
        $exist_username     =  Siteuser::where('username', $request->username)->first();
    } else {
        $exist_username = '';
    }



    // $file_name = '';
    // if ($request->hasFile('photo')) {
    //     $file = $request->file('photo');
    //     $file_name = md5(rand()).'.'.$file->getClientOriginalExtension();
    //     $file->move(storage_path('app/public/users'),$file_name);
    // }

    $image_path = storage_path('app/public/users/').$data->photo;

    $file_name = '';

    if($request -> hasFile('new_photo')) {


            $file = $request -> file('new_photo');
            $file_name = md5(rand()).'.'.$file->getClientOriginalExtension();
            $file->move(storage_path('app/public/users'),$file_name);

            if ($data->photo) {
                unlink($image_path);
            }


    } else {
        $file_name = $data->photo;
    }






    if (!empty($exist_phone)) {
        return [
            'phone_check' => 'phone_exist'
        ];
    }  else if (!empty($exist_email)) {
        return [
            'email_check' => 'email_exist'
        ];
    } else if (!empty($exist_username)) {
        return [
            'username_check' => 'username_exist'
        ];
    } else {

        $data->name                  =      $request->name;
        $data->role_id               =      $request->role_id;
        $data->username              =      $request->username;
        $data->phone                 =      $request->phone;
        $data->email                 =      $request->email;
        $data->gender                =      $request->gender;
        $data->photo                 =      $file_name;

        $data->update();

        return [
            'f' => false
        ];
    }

}


/*
|--------------------------------------------------------------------------
| User trash - restore  system
|--------------------------------------------------------------------------
*/
public function trashRestoreUser($id){
    $data = Siteuser::find($id);

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
| User delete system
|--------------------------------------------------------------------------
*/
public function deleteUser($username){

    $data = Siteuser::where('username',$username)->first();
    $vendor = Vendor::where('username',$username)->first();
    $data -> delete();
    $vendor -> delete();

    $image_path = storage_path('app/public/users/').$data->photo;
    if(file_exists($image_path)){
        unlink($image_path);
    }
    $ven_banner = storage_path('app/public/vendors/').$vendor->banner;
    if(file_exists($ven_banner)){
        unlink($ven_banner);
    }
    $ven_logo = storage_path('app/public/vendors/').$vendor->logo;
    if(file_exists($ven_logo)){
        unlink($ven_logo);
    }

}


/*
|--------------------------------------------------------------------------
| User delete system
|--------------------------------------------------------------------------
*/
public function singleUser($id){

    $data = Siteuser::find($id);
    $image_path = url('storage/users').'/'.$data->photo;
    $photo = '<img style="width: 100%;" src="'.$image_path.'">';

    $user_info = '';
    $user_info .= '<table class="table table-dark">';

    $user_info .= '<tr>
                    <th scope="col">Full Name</th>
                    <td> : '.$data->name.'</td>
                </tr>';
    $user_info .= '<tr>
                    <th scope="col">Role</th>
                    <td> : '.$data->role->name.'</td>
                </tr>';
    $user_info .= '<tr>
                    <th scope="col">Phone</th>
                    <td> : '.$data->phone.'</td>
                </tr>';
    $user_info .= '<tr>
                    <th scope="col">Email</th>
                    <td> : '.$data->email.'</td>
                </tr>';
    $user_info .= '<tr>
                    <th scope="col">Username</th>
                    <td> : '.$data->username.'</td>
                </tr>';

    $user_info .= '</table>';




    return [
        'user'              => $data,
        'user_info'         => $user_info,
        'photo'             => $photo,

    ];



}















}
