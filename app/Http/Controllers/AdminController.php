<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $request){
    	if ( $request->isMethod('post') ) {
    		$data = $request->input();
    		if ( \Auth::attempt(['email'=>$data['email'], 'password'=>$data['password']]) ) {
    			// echo "Success"; die();
    			// Tao mot adminSession voi gia tri la $data['email']
    			Session::put('admin_session', $data['email']);
    			return redirect('admin/dashboard');
    			// return redirect::action('AdminController@dashboard');
    		}else{
    			return redirect('/admin')->with('flash_message_error', 'Email hoặc mật khẩu không đúng! Vui lòng thử lại.');
    		}
    	}
    	return view('admin.admin_login');
    }

    public function dashboard(Request $request){
        if ($request){
            $check_role = $request->user()->authorizeRoles(['supper admin', 'admin', 'employee', 'saler']);
            if ($check_role == 1)
            {
                if ( Session::has('admin_session') ) {
                    $user = User::where(['email'=>Session::get('admin_session')])->first();
                    $count_user     = count(User::get());
                    $count_category = count(Category::get());
                    $count_product  = count(Product::get());
                    Session::put('user_session', $user);
                    // echo "<pre>"; print_r($count_category); die;
                    return view('admin.dashboard')->with(compact('user', 'count_user', 'count_category', 'count_product'));
                }else{
                    return redirect('/admin')->with('flash_message_error', 'Bạn chưa đăng nhập! Vui lòng đăng nhập.');
                }
            }
        }
    }

    public function settings(){
    	return view('admin.settings');
    }

    public function profile(){
        return view('admin.profile');
    }

    public function chkPassword(Request $request){
        $data = $request->all();
        $current_password = $data['current_pwd'];
        $check_password = User::where(['admin'=>'1'])->first();
        if(Hash::check($current_password, $check_password->password)){
            echo "true"; die;
        }else {
            echo "false"; die;
        }
    }

    public function updatePassword(Request $request){
    	if ($request->isMethod('post')) {
    		$data = $request->all();
    		$check_password = User::where(['email' => Auth::user()->email])->first();
    		$current_pwd = $data['current_pwd'];
    		if (Hash::check($current_pwd, $check_password->password)) {
    			$password = bcrypt($data['new_pwd']);
    			User::where('id', '1')->update(['password' => $password]);
    			return redirect('/admin/settings')->with('flash_message_success', 'Cập nhật mật khẩu thành công');
    		}else{
    			return redirect('/admin/settings')->with('flash_message_error', 'Mật khẩu hiện tại không đúng');
    		}
    	}
    }

    public function logout(){
    	// echo "logout"; die;
    	Session::flush();
    	return redirect('/admin')->with('flash_message_success', 'Logout thành công');
    }
}
