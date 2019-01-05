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
		//$cats = Category::get();
		$cats = Category::all();
		// $cats = json_decode(json_encode($cats));
		// echo "<pre>"; print_r($cats); die;
		return view('admin.categories.category')->with('cats', $cats);
	}

	public function addCategory(Request $request){
		// echo('die'); die;
		if ( $request->isMethod('post') ) {
			$this->validate($request, array(
				'cat_name' => 'required',
		        'filename' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
		    }else{
		    	$cat->url = "";
		    };
			
			$cat->name = $data['cat_name'];
			$cat->description = $data['cat_desc'];
			$cat->parent_id = $data['parent_id'];
			$cat->save();
			return back()
	            ->with('flash_message_success','Thêm mới thành công');
		}
		$levels = Category::where(['parent_id' => 0])->get();
		return view('admin.categories.add-category')
					->with(compact('levels'));
	}	

	public function editCategory(Request $res, $id = null){
		if ( $res->isMethod('post') ) {
			$this->validate($res, array(
				'cat_name' => 'required',
		        'filename' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
	        ));
	        $data = $res->all();
	        if($res->hasFile('filename')){
		        $originalImage = $res->file('filename');
		        $thumbnailImage = Image::make($originalImage);
		        $thumbnailPath = public_path().'/uploads/thumbnail/';
		        $originalPath = public_path().'/uploads/images/';
		        $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
		        $thumbnailImage->resize(150, 150);
		        $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName()); 
		        $nameImage = time().$originalImage->getClientOriginalName();
		        // echo $nameImage; die;
		        // $cat->url = $nameImage;
		    }else{
		    	$nameImage = "";
		    };
	        // echo $nameImage; die;
	        // Category::where(['id' => $id])->update(['name' => $data['cat_name'], 'description' => $data['cat_desc'], 'url' => $data['filename']]);
	        try {
			    // $count = DB::table('Category')
			    $sql_query = Category::where(['id' => $id])
			    			->update(['name' => $data['cat_name'], 
			    					'parent_id' => $data['parent_id'], 
			    					'description' => $data['cat_desc'], 
			    					'url' => $nameImage]);
			   	if($sql_query){
			   		return redirect('/admin/category')
			   				->with('flash_message_success','Cập nhật thành công');
			   	}else{
			   		echo "that bai"; die;
			   	}
			} catch (\Illuminate\Database\QueryException $e) {
			    var_dump($e); die;
			}
		}
		$cat_detail = Category::where(['id' => $id])->first();
		$levels = Category::where(['parent_id' => 0])->get();
		// echo "<pre>"; print_r($cat_detail); die;
		// echo $id; die;
		return view('admin.categories.edit-category')
					->with(compact('levels'))
					->with(compact('cat_detail'));
	}

	public function deleteCategory(Request $res, $id = null){
		if ( $res->isMethod('get') ) {
			if (!empty($id)) {
				$sql_query = Category::where(['id' => $id])->delete();
				if ($sql_query) {
					return redirect('admin/category')
							->with('flash_message_success','Xóa danh mục thành công');
				}else{
					return redirect('admin/category')
							->with('flash_message_success','Xóa danh mục thất bại');
				}
			}	
		}	
	}

}
