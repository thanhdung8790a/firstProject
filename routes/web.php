<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/welcome', function () {
//     return view('welcome');
// })->middleware('auth');

Route::get('/welcome', function () {
//    Debugbar::info($object);
//    Debugbar::error('Error!');
//    Debugbar::warning('Watch out…');
//    Debugbar::addMessage('Another message', 'mylabel');
    return view('welcome');
});

Route::get('/', 'IndexController@index');
Route::get('/category/{id}', 'IndexController@category');
Route::get('/products/{product_slug}', 'ProductController@showProductWithId');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::match(['get', 'post'], '/admin', 'AdminController@login');
Route::get('/posts', 'PostController@index');

// Router group admin
// Kiểm tra xem tài khoản đã đăng nhập chưa
Route::group(['middleware'=> ['auth']], function(){
	Route::get('/admin/dashboard', 'AdminController@dashboard');
	Route::get('/admin/settings', 'AdminController@settings');
    Route::get('/admin/profile/{id}', 'AdminController@profile');
	Route::get('/admin/check-pwd', 'AdminController@chkPassword');
	Route::match(['get', 'post'], '/admin/update-pwd', 'AdminController@updatePassword');
    Route::match(['get'], '/admin/deleteUserImage/{id}', 'AdminController@deleteUserImage');
    Route::match(['get', 'post'], '/admin/update-thumbnail', 'AdminController@updateUserImage');
    Route::match(['get', 'post'], '/admin/update-info', 'AdminController@updateUserInfo');
    Route::match(['get', 'post'], '/admin/update-user-role', 'AdminController@updateUserRole');

	// Categories routes (Admin)
	Route::get('/admin/category', 'CategoryController@index');
	Route::match(['get', 'post'], '/admin/add-category', 'CategoryController@addCategory');
	Route::match(['get', 'post'], '/admin/edit-category/{id}', 'CategoryController@editCategory');
	Route::match(['get', 'post'], '/admin/delete-category/{id}', 'CategoryController@deleteCategory');

	// Products routes (Admin)
	Route::get('/admin/product', 'ProductController@index');
	Route::match(['get', 'post'], '/admin/add-product', 'ProductController@addProduct');
	Route::match(['get', 'post'], '/admin/edit-product/{id}', 'ProductController@editProduct');
	Route::match(['get', 'post'], '/admin/delete-product/{id}', 'ProductController@deleteProduct');
	Route::match(['get', 'post'], '/admin/deleteProductImage/{id}', 'ProductController@deleteProductImage');
	Route::match(['get', 'post'], '/admin/delete-products', 'ProductController@deleteProducts');

	// Products Attributes routes (Admin)
	Route::match(['get', 'post'], '/admin/add-attributes/{id}', 'ProductController@addAttributes');
	Route::get('/admin/delete-product-attributes/{id}', 'ProductController@deleteProductAttributes');
});
// Thoát khỏi hệ quản trị
Route::get('/logout', 'AdminController@logout');
