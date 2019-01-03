<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Image;

class CategoryController extends Controller
{
    

	public function index(){
		$cats = Category::all();
		return view('admin.categories.category')->with('cats', $cats);
	}

	public function addCategory(Request $request){
		// echo('die'); die;
		if ( $request->isMethod('post') ) {
			$this->validate($request, array(
				'cat_name' => 'required',
				'cat_desc' => 'required',
		        'filename' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
	        ));
	        $data = $request->all();
	        //echo "<pre>"; var_dump($request);
	        $cat = new Category;

	        if($request->hasFile('filename')){
		        $originalImage = $request->file('filename');
		        $thumbnailImage = Image::make($originalImage);
		        $thumbnailPath = public_path().'/uploads/thumbnail/';
		        $originalPath = public_path().'/uploads/images/';
		        $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
		        $thumbnailImage->resize(150, 150);
		        $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName()); 
		        $nameImage = time().$originalImage->getClientOriginalName();
		        // echo $nameImage; die;
		        $cat->url = $nameImage;
		    };
			
			$cat->name = $data['cat_name'];
			$cat->description = $data['cat_desc'];
			
			$cat->save();
			return back()
	            ->with('flash_message_success','Thêm mới thành công')
	            ->with('flash_url_image', $nameImage);
		}
		return view('admin.categories.add-category');
	}

}
