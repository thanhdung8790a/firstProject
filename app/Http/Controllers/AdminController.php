<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\Category;
use App\Product;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Image;

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

    public function profile(Request $request, $id = null){
        $current_user = User::where(['id' => $id])->first();
        return view('admin.profile', compact('current_user'));
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

    public function updateUserInfo(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            try{
                $sql_query = User::where(['id'=>$data['id']])->update(['display_name'   =>$data['display_name'],
                                                                        'fullname'      =>$data['fullname'],
                                                                        'address'       =>$data['address'],
                                                                        'phone'         =>$data['phone']]);
                if ($sql_query){
                    return redirect('/admin/dashboard')
                        ->with('flash_message_success','Cập nhật thành công');
                }
            }catch (\Illuminate\Database\QueryException $e){
                var_dump($e->getMessage()); die;
            }
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

    public function updateUserImage(Request $request){
        if ($request->isMethod('post')) {
            $this->validate($request, array(
                'file_user_image'      => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ));
            $data = $request->all();

            if($request->hasFile('file_user_image')){
                $originalImage = $request->file('file_user_image');
                $make_image = Image::make($originalImage);
                // Tao ten anh
                $extension = $originalImage->getClientOriginalName();
                $nameImage = time()."_".rand(111, 9999).$extension;
                // Tao duong dan upload anh
                $thumbnail_image_path   = public_path().'/uploads/users/thumbnail/';
                $large_image_path       = public_path().'/uploads/users/images/';
                // Luu large image
                $make_image->save($large_image_path.$nameImage);
                // Luu thumbnail image
                $make_image->resize(275, 255)->save($thumbnail_image_path.$nameImage);
                // echo $nameImage; die;
                $user_image	= $nameImage;
            }else{
                $user_image	= $data['user_image'];
            }

            try{
                if (User::where(['id'=>$data['user_id']])->update(['image'=>$user_image])){
                    $current_user = User::where(['id'=>$data['user_id']])->first();
//                    echo "<pre>"; print_r($current_user); die;
                    return back()->with('flash_message_success', 'Cập nhật avatar thành công', compact('current_user'));
                }else{
                    echo 'Thất bại'; die;
                }
            }catch (QueryException $e){
                dd($e->getMessage());
            };


            echo $user_image; die;
        }
    }

    public function deleteUserImage(Request $request, $id = null){
        try{
            $sql_delete_image = User::where(['id' => $id])->update(['image' => '']);
            $current_user = User::where(['id' => $id])->first();
            if ($sql_delete_image){
                return back()->with('flash_message_success', 'Xóa avatar thành công', compact('current_user'));
            }else{
                return back()->with('flash_message_error', 'Xóa avatar không thành công', compact('current_user'));
            }
        }catch (QueryException $e){
            dd($e->getMessage());
        }
    }

    public function logout(){
    	// echo "logout"; die;
    	Session::flush();
    	return redirect('/admin')->with('flash_message_success', 'Logout thành công');
    }
}
