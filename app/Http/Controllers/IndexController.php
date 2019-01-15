<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Product;
use App\Category;

class IndexController extends Controller
{
    public function index(){
    	$listFeaturesProducts = Product::orderBy('created_at', 'desc')
				                 ->take(6)
				                 ->get();
		// echo count($listFeaturesProducts); die;
        // echo "<pre>"; print_r($listFeaturesProducts); die;
        // Lay ra danh sach Category
        $categories = Category::where(['parent_id' => 0])->get();
//        print_r($categories_menu); die;
    	return view('index')->with(compact('listFeaturesProducts', 'categories'));
    }

    public function category(){
        die('category');
    }

}
