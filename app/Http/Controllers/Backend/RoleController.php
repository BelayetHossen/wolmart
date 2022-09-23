<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use App\Models\Backend\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{

/*
|--------------------------------------------------------------------------
| Role page view/load
|--------------------------------------------------------------------------
*/
public function adminRoleView(){
    $permission = ['Dashboard','User','Product','Post','Genarel settings','Order', 'Shipping settings'];
    return view('backend.pages.roles.index',[
        'permission' => $permission
    ]);
}

/*
|--------------------------------------------------------------------------
| All Roles load
|--------------------------------------------------------------------------
*/
public function allAdminRoles(){

        $data = Role::all();
        $count = 1;
        $role_list = '';
        foreach ($data as $role) {


            //make permission list
            $permission = json_decode($role->permission);
            $per_list = '';
            foreach ($permission as $per) {
                $per_list .= '<ul>';
                $per_list .= '<li><i class="fa fa-check-circle"></i> '.$per.'</li>';
                $per_list .= '</ul>';
            }

            //status btn checked unchecked
            $status_check = $role->status ? 'checked' : '';


            //Action btn show by conditions

            if ($role->trash == 1) {
                $bg = 'bg-danger';
                $button = '<a href="#" restore_id="'.$role->id.'" data-toggle="tooltip" data-placement="top" title="Restore" class="btn btn-success btn-sm role_restore_btn"><i class="fa fa-undo"></i></a>
                <a href="#" delete_id="'.$role->id.'" data-toggle="tooltip" data-placement="top" title="Delete Permanently" class="btn btn-danger btn-sm role_delete_btn"><i class="fas fa-skull-crossbones"></i></a>
                ';
                $status_btn = '<p class="text-dark bg-info p-2">Restore first</p>';
            } else {
                $bg = '';
                $button = '<a href="#" role_edit_id="'.$role->id.'" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-warning btn-sm role_edit_btn"><i class="fa fa-edit"></i></a>
                <a href="#" trash_id="'.$role->id.'" data-toggle="tooltip" data-placement="top" title="Move to trash" class="btn btn-danger btn-sm role_trash_btn"><i class="fa fa-trash"></i></a>';

                $status_btn = ' <label class="switch">
                                    <input value="'.$role->id.'" id="role_status_btn" type="checkbox" '.$status_check.'>
                                    <span class="slider round"></span>
                                </label>
                              ';
            }


            // background color by status
            $sbg = '';
            if ($role->trash == 0 && $role->status == 0) {
                $sbg = 'bg-warning';
            } else {
                $sbg = '';
            }



            $role_list .= '<tr class="'.$bg.''.  $sbg.'">';
            $role_list .= '<td>'.$count++.'</td>';
            $role_list .= '<td>'.$role->name.'</td>';
            $role_list .= '<td>'.$per_list.'</td>';
            $role_list .= '<td>'.$status_btn.'</td>';
            $role_list .= '<td>
                                <a href="#" role_view_id="'.$role->id.'" data-toggle="tooltip" data-placement="top" title="View" class="btn btn-info btn-sm view_role_btn"><i class="fa fa-eye"></i></a>
                                '.$button.'
                            </td>';
            $role_list .= '</tr>';
        }
        return $role_list;

}

/*
|--------------------------------------------------------------------------
| Role add
|--------------------------------------------------------------------------
*/
public function addRole(Request $request){

        $exist_name=  Role::where('name', $request->name)->first();

        if (!empty($exist_name)) {
            return [
                'f' => 'Hi'
            ];
        } else {
            Role::create([
                'name'              =>      $request->name,
                'slug'              =>      Str::slug($request->name),
                'permission'        =>      json_encode($request->permission)
            ]);
            return [
                'f' => 'Hello'
            ];
        }

}


/*
|--------------------------------------------------------------------------
| Role trash system
|--------------------------------------------------------------------------
*/
public function trashRestoreRole($id){
    $data = Role::find($id);

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
| Role delete system
|--------------------------------------------------------------------------
*/
public function deleteRole($id){

    $data = Role::find($id);
    $data -> delete();

}



/*
|--------------------------------------------------------------------------
| Edit role
|--------------------------------------------------------------------------
*/
public function editRole($id){
    $permission = ['Dashboard','User','Product','Post','Genarel settings','Order', 'Shipping settings'];
    $data = Role::find($id);


    $per_list = '<ul>';
    foreach ($permission as $per) {

        $checked = '';
        if(in_array($per, json_decode($data->permission))){
            $checked = 'checked';
        }

        $per_list .= '<li style="list-style: none;"><input name="permission[]" '.$checked.' type="checkbox" value="'.$per.'" id="'.$per.'"> <label for="'.$per.'">'.$per.'</label></li>';
    }
    $per_list .= '<ul>';

    return [
        'id' => $data->id,
        'name' => $data->name,
        'permission' => $per_list
    ];

}

/*
|--------------------------------------------------------------------------
| Update Role
|--------------------------------------------------------------------------
*/
public function updateRole(Request $request, $id){

    $data = Role::find($id);
    $data->name = $request->name;
    $data->slug = Str::slug($request->name);
    $data->permission = json_encode($request->permission);
    $data->update();

}


/*
|--------------------------------------------------------------------------
| Role status Update
|--------------------------------------------------------------------------
*/
public function updateRoleStatus($id){

    $data = Role::find($id);

    if ($data->status==true) {
        $data->status = false;
    } else {
        $data->status = true;
    }
    $data->update();
}



















}
