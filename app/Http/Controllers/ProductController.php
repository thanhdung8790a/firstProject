<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Image;

class ProductController extends Controller
{
    public function index(){
    	$products = Product::get();
    	$products = json_decode(json_encode($products));
    	// echo "<pre>"; print_r($products); die;
    	foreach ($products as $key => $value) {
    		$cat_name = Category::where(['id' => $value->category_id])->first();
    		// echo "<pre>"; print_r($cat_name->name); die;
    		// echo "<pre>"; print_r($products[$key]); die;
    		if ( !empty($cat_name->name) ) {
    			$products[$key]->category_name = $cat_name->name;
    		}else{
    			$products[$key]->category_name = "Chưa có danh mục";
    		}
    	}
    	// echo "<pre>"; print_r($products); die;
    	return view('admin.products.product')->with(compact('products'));
    }


    public function addProduct(Request $request){
    	if( $request->isMethod('post') ){
    		$this->validate($request, array(
				'product_name' => 'required',
				'product_code' => 'required',
				'product_color' => 'required',
				'product_price' => 'required|regex:/^\d*(\.\d{2})?$/',
		        'filename' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
	        ));
    		$data = $request->all();
    		// echo $data['product_price']; die;
    		if (empty($data['category_id'])) {
	        	return back()->with('flash_message_error','Bạn chưa chọn danh mục sản phẩm');
	        }else{
	        	$pro = new Product;

	    		if($request->hasFile('filename')){
			        $originalImage = $request->file('filename');
			        $make_image = Image::make($originalImage);

			        // Tao ten anh
			        $extension = $originalImage->getClientOriginalName();
			        $nameImage = time()."_".rand(111, 9999).$extension;
			        // Tao duong dan upload anh
			        $small_image_path = public_path().'/uploads/small/';
			        $thumbnail_image_path = public_path().'/uploads/thumbnail/';
			        $large_image_path = public_path().'/uploads/images/'; 
			        // Luu large image
			        $make_image->save($large_image_path.$nameImage);
			        // Luu thumbnail image
			        $make_image->resize(150, 150)->save($thumbnail_image_path.$nameImage);
			        // Luu small image
			        $make_image->resize(100, 100)->save($small_image_path.$nameImage);
			        
			        // echo $nameImage; die;
			        $pro->product_image	= $nameImage;
			    }

			    // Kiem tra $data['category_id'] != null
			    if (empty($data['category_id'])) {
			    	return back()->with('flash_message_error','Bạn chưa chọn danh mục');
			    }else{
			    	$pro->category_id = $data['category_id'];
				    $pro->product_name = $data['product_name'];
				    $pro->product_code = $data['product_code'];
				    $pro->product_color = $data['product_color'];
				    $pro->product_desc = $data['product_desc'];
				    $pro->product_price = $data['product_price'];

				    $pro->save();
				    return back()->with('flash_message_success','Thêm mới thành công');
			    }
	        }
    	}
    	// Lay ra tat ca danh muc voi parent_id = 0
    	$categories = Category::where(['parent_id' => 0])->get();
    	// echo "<pre>"; print_r($categories); die;
    	$categories_dropdow = "<option selected disabled>Chọn danh mục</option>";
    	foreach ($categories as $cat) {
    		$categories_dropdow .= "<option value='".$cat->id."'>".$cat->name."</option>" ;
    		$sub_categories = Category::where(['parent_id' => $cat->id])->get();
    		foreach($sub_categories as $sub_cat):
    			$categories_dropdow .= "<option value = '".$sub_cat->id."'> &nbsp--&nbsp; " .$sub_cat->name. "</option>";
    		endforeach;
    	}
    	return view('admin.products.add-product')->with(compact('categories_dropdow'));
    }

    public function editProduct(Request $request, $id = null){
    	// echo "edit-product"; die;
    	if( $request->isMethod('post') ){
    		$this->validate($request, array(
				'product_name' => 'required',
				'product_code' => 'required',
				'product_color' => 'required',
				'product_price' => 'required|regex:/^\d*(\.\d{2})?$/',
		        'filename' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
	        ));
    		$data = $request->all();
    		// echo "<pre>"; print_r($data); die;
    		// echo $data['category_id']; die;

    		if($request->hasFile('filename')){
		        $originalImage = $request->file('filename');
		        $make_image = Image::make($originalImage);

		        // Tao ten anh
		        $extension = $originalImage->getClientOriginalName();
		        $nameImage = time()."_".rand(111, 9999).$extension;
		        // Tao duong dan upload anh
		        $small_image_path = public_path().'/uploads/small/';
		        $thumbnail_image_path = public_path().'/uploads/thumbnail/';
		        $large_image_path = public_path().'/uploads/images/'; 
		        // Luu large image
		        $make_image->save($large_image_path.$nameImage);
		        // Luu thumbnail image
		        $make_image->resize(150, 150)->save($thumbnail_image_path.$nameImage);
		        // Luu small image
		        $make_image->resize(100, 100)->save($small_image_path.$nameImage);
		        
		        // echo $nameImage; die;
		        $product_image	= $nameImage;
		    }else{
		    	$product_image	= $data['product_image'];
		    }

		    try {
			    // $count = DB::table('Category')
			    $sql_query = Product::where(['id' 	=> $id])
			    			->update(['category_id' => $data['category_id'], 
			    					'product_name' 	=> $data['product_name'], 
			    					'product_code' 	=> $data['product_code'],
			    					'product_desc' 	=> $data['product_desc'], 
			    					'product_price' => $data['product_price'],
			    					'product_image' => $product_image, 
			    					'product_color' => $data['product_color']]);
			   	if($sql_query){
			   		return redirect('/admin/product')
			   				->with('flash_message_success','Cập nhật thành công');
			   	}else{
			   		echo "Thất bại"; die;
			   	}
			} catch (\Illuminate\Database\QueryException $e) {
			    var_dump($e->getMessage()); die;
			}
    	}

    	if ( !empty($id) ) {
    		$product_detail = Product::where(['id' => $id])->first();
    		// echo "<pre>"; print_r($product_detail); die;
    		// Lay ra tat ca danh muc voi parent_id = 0
    		$category_name = Category::where(['id' => $product_detail->category_id])->first();
    		// echo "<pre>"; print_r($category_name->name); die;
    		$categories = Category::where(['parent_id' => 0])->get();
    		$categories_dropdow = "<option selected value='".$category_name->id."'>".$category_name->name."</option>" ;
	    	foreach ($categories as $cat) {
	    		$categories_dropdow .= "<option value='".$cat->id."'>".$cat->name."</option>" ;
	    		$sub_categories = Category::where(['parent_id' => $cat->id])->get();
	    		foreach($sub_categories as $sub_cat):
	    			$categories_dropdow .= "<option value = '".$sub_cat->id."'> &nbsp--&nbsp; " .$sub_cat->name. "</option>";
	    		endforeach;
	    	}
    		return view('admin.products.edit-product')->with(compact('product_detail'))
    												->with(compact('categories_dropdow'));
    	}
    }

    public function deleteProduct(Request $res, $id = null){
		if ( $res->isMethod('get') ) {
			if (!empty($id)) {
				$sql_query = Product::where(['id' => $id])->delete();
				try{
					if ($sql_query) {
						return redirect('admin/product')
							->with('flash_message_success','Xóa sản phẩm thành công');
					}else{
						return redirect('admin/product')
								->with('flash_message_success','Xóa sản phẩm thất bại');
					}
				}catch(QueryException $e){
					dd($e->getMessage());
				}	
			}	
		}	
	}

	public function deleteProducts(Request $request){
		$data = $request->all();
		if (!empty($data['productIDs'])) {
			Product::whereIn('id', $data['productIDs'])->delete();
			echo "true"; die;
		}else{
			echo "false"; die;
		}
	}
}
