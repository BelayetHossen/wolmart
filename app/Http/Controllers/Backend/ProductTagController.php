<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Backend\ProductTag;
use App\Http\Controllers\Controller;

class ProductTagController extends Controller
{

/*
|--------------------------------------------------------------------------
| 1. tag index
|--------------------------------------------------------------------------
*/
public function index(){
    return view('backend.pages.tags.index');
}

/*
|--------------------------------------------------------------------------
| 2. All tags
|--------------------------------------------------------------------------
*/
public function allTags(){

    $data = ProductTag::latest()->get();
    $count = 1;
    $tag_list = '';
    foreach ($data as $tag) {

        $tag_list .= '<tr class="">';
        $tag_list .= '<td>'.$count++.'</td>';
        $tag_list .= '<td>'.$tag->name.'</td>';
        $tag_list .= '<td>'.$tag->slug.'</td>';
        $tag_list .= '<td>
                            <a href="#" tag_delete_id="'.$tag->id.'" data-toggle="tooltip" data-placement="top" title="Delete Permanently" class="btn btn-danger btn-sm tag_delete_btn"><i class="fas fa-skull-crossbones"></i></a>

                        </td>';
        $tag_list .= '</tr>';
    }
    return $tag_list;


}


/*
|--------------------------------------------------------------------------
| 3. tag store
|--------------------------------------------------------------------------
*/
public function store(Request $request){

    $name_check = ProductTag::where('name', $request->name)->first();

    if (!empty($name_check)) {
        return [
            'name_check' => 'exist'
        ];
    } else {
        ProductTag::create([
            'name'      =>  $request->name,
            'slug'      =>  Str::slug($request->name)
        ]);
    }

}

/*
|--------------------------------------------------------------------------
| 4. tag index
|--------------------------------------------------------------------------
*/
public function tagDelete($id){

    $data = ProductTag::find($id);
    $data->delete();

}













}
