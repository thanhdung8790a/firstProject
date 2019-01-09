<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use App\Product;

class IndexController extends Controller
{
    public function index(){
    	$listFeaturesProducts = Product::orderBy('created_at', 'desc')
				                 ->take(6)
				                 ->get();
		// echo count($listFeaturesProducts); die;
  //   	echo "<pre>"; print_r($listFeaturesProducts); die;
    	return view('index')->with(compact('listFeaturesProducts'));
    }
}
