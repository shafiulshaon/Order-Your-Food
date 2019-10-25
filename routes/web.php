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

//login-logout-userTypeError-resetPassword routes
Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@verify');
Route::get('/login/logout', 'LoginController@logout')->name('logout');
Route::get('/error', 'ErrorController@index')->name('error'); 
Route::get('/resetPassword', 'LoginController@resetPassword')->name('resetpassword');   
Route::post('/resetPassword', 'LoginController@sendEmailresetPassword');  
Route::get('/resetPassword/changePassword/{userID}/{md5Pass}', 'LoginController@changePassword')->name('changePassword');  
Route::Post('/resetPassword/changePassword/{userID}/{md5Pass}', 'LoginController@storeChangePassword');  
Route::get('/faq', 'LoginController@faq')->name('faq'); 
Route::get('/contact', 'LoginController@contact')->name('contact'); 


//registration routes
Route::get('/customerRegistration', 'CustomerController@registrationForm')->name('customerRegistration'); 
Route::post('/customerRegistration', 'CustomerController@storeRegistrationForm'); 
Route::get('/restaurantRegistration', 'RestaurantController@registrationForm')->name('restaurantRegistration'); 
Route::post('/restaurantRegistration', 'RestaurantController@storeRegistrationForm'); 



Route::group(['middleware' => 'sess'], function(){

	//all admin routes
	Route::group(['middleware' => 'admin'], function(){
		Route::get('/adminHome', 'AdminController@index')->name('adminHome');
		Route::get('/adminProfile', 'AdminController@profile')->name('adminProfile');
		Route::get('/adminProfile/edit/{userID}', 'AdminController@edit')->name('adminProfile.edit');
		Route::post('/adminProfile/edit/{userID}', 'AdminController@profileupdate');
		Route::post('/adminHome', 'AdminController@searchDetails');
		Route::get('/admin/deleteItem/{itemID}', 'AdminController@deleteItem')->name('admin.deleteItem');
		Route::get('/admin/item', 'AdminController@item')->name('adminItem');
		Route::get('/adminChangePassword/edit/{userID}', 'AdminController@passwordEdit')->name('adminChangePassword.edit');
		Route::post('/adminChangePassword/edit/{userID}', 'AdminController@passwordUpdate'); 
		Route::get('/adminReport', 'AdminController@report')->name('adminReport'); 
		Route::get('/viewRestaurent/{resID}', 'AdminController@viewRestaurentDetails')->name('viewRestaurent');
	});

	
	//all customer routes
	Route::group(['middleware' => 'customer'], function(){

		Route::get('/customerHome', 'CustomerController@index')->name('customerHome');
		Route::get('/customerProfile', 'CustomerController@profile')->name('customerProfile');
		Route::get('/customerProfile/edit/{userID}', 'CustomerController@edit')->name('customerProfile.edit');
		Route::post('/customerProfile/edit/{userID}', 'CustomerController@profileupdate');
		Route::get('/customerChangePassword/edit/{userID}', 'CustomerController@passwordEdit')->name('customerChangePass.edit');
		Route::post('/customerChangePassword/edit/{userID}', 'CustomerController@passwordUpdate'); 
		Route::get('/customerItem', 'CustomerController@item')->name('customerItem');
		Route::get('/customerItem/addToCart/{itemID}', 'CustomerController@itemAddToCart')->name('customerItem.addToCart');
		Route::post('/customerItem/addToCart/{itemID}', 'CustomerController@storeItemAddToCart');
		Route::get('/customerCart&Order', 'CustomerController@cartNorder')->name('customerCart&Order');
		Route::get('/customerCart/edit/{cartID}', 'CustomerController@cartEdit')->name('customerCart.edit');
		Route::post('/customerCart/edit/{cartID}', 'CustomerController@cartUpdate');
		Route::get('/customerCart/remove/{cartID}', 'CustomerController@cartRemove')->name('customerCart.remove');
		Route::post('/customerCart/remove/{cartID}', 'CustomerController@cartDestroy');
		Route::get('/customerItem/order', 'CustomerController@orderItem')->name('customerItem.order');
		Route::post('/customerItem/order', 'CustomerController@storeOrderItem');
		Route::get('/customerItem/orderList', 'CustomerController@orderItemList')->name('customerItem.orderList');
		Route::get('/customerView/restaurantDetails/{userID}', 'CustomerController@restaurantDetails')->name('customerView.restaurantDetails');
		Route::post('/customerView/restaurantDetails/{userID}', 'CustomerController@storeRestaurantReview');
		Route::post('/customerHome', 'CustomerController@searchDetails');
	});

	//all restaurant routes
	Route::group(['middleware' => 'restaurant'], function(){
		
		Route::get('/restaurantHome', 'RestaurantController@index')->name('restaurantHome');
		Route::get('/restaurantProfile', 'RestaurantController@profile')->name('restaurantProfile');
		Route::get('/restaurantItem', 'RestaurantController@item')->name('restaurantItem');
		Route::get('/restaurantProfile/edit/{userID}', 'restaurantController@edit')->name('restaurantProfile.edit');
		Route::post('/restaurantProfile/edit/{userID}', 'restaurantController@profileupdate');  
		Route::get('/restaurantChangePassword/edit/{userID}', 'restaurantController@passwordEdit')->name('restaurantChangePass.edit');
		Route::post('/restaurantChangePassword/edit/{userID}', 'restaurantController@passwordUpdate');
		Route::get('/restaurantCreateItem', 'restaurantController@createItem')->name('restaurantCreateItem');
		Route::post('/restaurantCreateItem', 'restaurantController@storeItem');
		Route::get('/restaurantItem/edit/{itemID}', 'restaurantController@itemEdit')->name('restaurantItem.edit');
		Route::post('/restaurantItem/edit/{itemID}', 'restaurantController@itemUpdate');  
		Route::get('/restaurantItem/delete/{itemID}', 'restaurantController@itemDelete')->name('restaurantItem.delete');
		Route::post('/restaurantItem/delete/{itemID}', 'restaurantController@itemDestroy');
		Route::get('/restaurantOrder', 'restaurantController@order')->name('restaurantOrder');
		Route::get('/restaurantOrder/history', 'restaurantController@orderHistory')->name('restaurantOrderHistory');
		Route::get('/restaurantOrder/Delivered/{dCrtID}', 'restaurantController@orderDelivered')->name('restaurantOrderDelivered');
		Route::get('/restaurantOrder/Postponed/{pCrtID}', 'restaurantController@orderPostponed')->name('restaurantOrderPostponed');
		Route::post('/restaurantHome', 'RestaurantController@searchDetails');
		Route::get('/viewRestaurentDetails/{resID}', 'restaurantController@viewRestaurentDetails')->name('viewRestaurentDetails');

	});

		
});


Route::get('/', function(){
	return redirect()->route('login');
});