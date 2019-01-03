<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    
	public function addCategory(Request $request){
		if ( $request->isMethod('post') ) {
			$this->validate($request, array(
		        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
	        ));
	        if($request->hasFile('image')){
		        $image = $request->file('image');
		        $filename = time() . '.' . $image->getClientOriginalExtension();
		        Image::make($image)->resize(160, 160)->save( public_path() . '\\media\\people\\'. $filename );
		        $cat->url = $filename; die;
		    };
			$data = $request->all();
			//echo "<pre>"; var_dump($request);
			$cover = $data['cat_url'];
			die;
		    $extension = $cover->getClientOriginalExtension();
		    
		    Storage::disk('public')->put($cover->getFilename().'.'.$extension,  File::get($cover));
		    echo $cover; die;
			$cat = new Category;
			$cat->name = $data['cat_name'];
			$cat->description = $data['cat_desc'];
			$cat->url = $cover->getFilename().'.'.$extension;
			$cat->save();
		}
		return view('admin.categories.add-category');
	}

}
