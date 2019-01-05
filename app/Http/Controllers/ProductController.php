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
    	foreach ($products as $key => $value) {
    		$category_name = Category::where(['id' => $value->category_id])->first();
    		$products[$key]->category_name = $category_name->name;
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

    public function editProduct(){

    }

    public function deleteProduct(){

    }
}
