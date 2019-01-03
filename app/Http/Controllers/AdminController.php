<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $request){
    	if ( $request->isMethod('post') ) {
    		$data = $request->input();
    		if ( \Auth::attempt(['email'=>$data['email'], 'password'=>$data['password'], 'admin'=>'1']) ) {
    			// echo "Success"; die();
    			// Tao mot adminSession voi gia tri la $data['email']
    			// Session::put('adminSession', $data['email']);
    			return redirect('admin/dashboard');
    			// return redirect::action('AdminController@dashboard');
    		}else{
    			return redirect('/admin')->with('flash_message_error', 'Email hoặc mật khẩu không đúng');
    		}
    	}
    	return view('admin.admin_login');
    }

    public function dashboard(){
    	// if ( Session::has('adminSession') ) {
    	// 	# code...
    	// }else{
    	// 	return redirect('/admin')->with('flash_message_error', 'Bạn chưa đăng nhập! Vui lòng đăng nhập.');
    	// }
    	return view('admin.dashboard');
    }

    public function settings(){
    	return view('admin.settings');
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
