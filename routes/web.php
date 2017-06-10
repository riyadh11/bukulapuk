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

  Route::get('/', 'HomeController@showHome');
  Route::get('/product/{id}', 'HomeController@showProduct');
  Route::get('/category/{id}', 'HomeController@showCategory');
  Route::get('/publisher/{id}', 'HomeController@showPublishers');
  Route::get('/seller/{id}', 'HomeController@showMember');
  Route::get('/browse', 'HomeController@showBrowse');
  Route::get('/s/{search}', 'HomeController@showSearch');
  Route::post('/search', 'HomeController@search');
  Route::post('/comment', 'MemberController@sendComment');
  Route::get('/cart', 'MemberController@showCart');
  Route::get('/shipping', 'MemberController@showShipping');
  Route::get('/addCart/{id}', 'MemberController@addCart');
  Route::get('/removeCart/{id}', 'MemberController@removeCart');
  Route::post('/checkout', 'MemberController@checkout');
  Route::get('/404', 'HomeController@notFounds');

  Route::get('/login', 'MemberAuth\LoginController@showLoginForm');
  Route::post('/login', 'MemberAuth\LoginController@login');
  Route::post('/logout', 'MemberAuth\LoginController@logout');
  Route::get('/logout', 'MemberAuth\LoginController@logout');

Route::group(['prefix' => 'admin'], function () {
  Route::get('/', 'AdminAuth\LoginController@showLoginForm');
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout');
  Route::get('/logout', 'AdminAuth\LoginController@logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');

  Route::get('/products', 'AdminController@showProductExplorer');
  Route::get('/show/{cat}/{filter}', 'AdminController@showProductFilter');

  Route::get('/configuration/categories', 'AdminController@showConfigurationCategories');
  Route::post('/configuration/categories', 'CategoryController@addCategory');
  Route::get('/categories/delete/{id}', 'CategoryController@deleteCategory');
  Route::post('/configuration/categories/edit', 'CategoryController@editCategory');

  Route::get('/configuration/shippings', 'AdminController@showConfigurationShippings');
  Route::post('/configuration/shippings', 'ShippingMethodController@addShipping_Method');
  Route::get('/shippings/delete/{id}', 'ShippingMethodController@deleteShipping_Method');
  Route::post('/configuration/shippings/edit', 'ShippingMethodController@editShipping_Method');
  
  Route::get('/configuration/products', 'AdminController@showConfigurationProducts');
  Route::post('/configuration/products', 'ProductStatusController@addProduct_Status');
  Route::get('/status/delete/{id}', 'ProductStatusController@deleteProduct_Status');
  Route::post('/configuration/products/edit', 'ProductStatusController@editProduct_Status');

  Route::get('/configuration/users', 'AdminController@showConfigurationUsers');
  Route::post('/configuration/users', 'MemberConfigurationController@addMember_Status');
  Route::get('/member_status/delete/{id}', 'MemberConfigurationController@deleteMember_Status');
  Route::post('/configuration/users/edit', 'MemberConfigurationController@editMember_Status');

  Route::get('/Member/delete/{id}', 'MonitoringController@bannedMember');
  Route::get('/Member/active/{id}', 'MonitoringController@activateMember');
  Route::get('/Member/toggle/{id}', 'MonitoringController@toggleMember');

  Route::get('/Monitor/product', 'MonitoringController@monitorProduct');
  Route::get('/products/active/{id}', 'MonitoringController@activateProduct');
  Route::get('/products/delete/{id}', 'MonitoringController@toggleProduct');
  Route::get('/products/show/{id}', 'AdminController@showProducts');

  Route::get('/Monitor/comment', 'MonitoringController@monitorComment');
  Route::get('/Comments/toggle/{id}', 'MonitoringController@toggleComment');

  Route::get('/configuration/comments', 'AdminController@showConfigurationComments');
  Route::post('/configuration/comments', 'CommentStatusController@addComment_Status');
  Route::get('/comments/delete/{id}', 'CommentStatusController@deleteComment_Status');
  Route::post('/configuration/comments/edit', 'CommentStatusController@editComment_Status');

  Route::get('/configuration/payments', 'AdminController@showConfigurationPayments');
  Route::post('/configuration/payments', 'PaymentMethodController@addPayment_Method');
  Route::get('/payments/delete/{id}', 'PaymentMethodController@deletePayment_Method');
  Route::post('/configuration/payments/edit', 'PaymentMethodController@editPayment_Method');

});

Route::group(['prefix' => 'member'], function () {
  Route::get('/', 'MemberAuth\LoginController@showLoginForm');
  Route::get('/login', 'MemberAuth\LoginController@showLoginForm');
  Route::post('/login', 'MemberAuth\LoginController@login');
  Route::post('/logout', 'MemberAuth\LoginController@logout');
  Route::get('/logout', 'MemberAuth\LoginController@logout');

  Route::get('/register', 'MemberAuth\RegisterController@showRegistrationForm');
  Route::post('/register', 'MemberAuth\RegisterController@register');
  Route::get('register/verify/{token}', 'MemberAuth\RegisterController@verify'); 

  Route::post('/password/email', 'MemberAuth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('/password/reset', 'MemberAuth\ResetPasswordController@reset');
  Route::get('/password/reset', 'MemberAuth\ForgotPasswordController@showLinkRequestForm');
  Route::get('/password/reset/{token}', 'MemberAuth\ResetPasswordController@showResetForm');

  Route::get('/products/add', 'MemberController@showAddProduct');
  Route::post('/products/add', 'ProductController@AddProduct');
  Route::post('/products/edit', 'ProductController@editProduct');
  Route::post('/products/delete', 'ProductController@deleteProduct');

  Route::get('/products', 'MemberController@showProductExplorer');
  Route::get('/products/edit/{id}', 'MemberController@showEditProduct');
  Route::get('/products/delete/{id}', 'ProductController@deleteC');
  Route::get('/profile', 'MemberController@showProfile');
  Route::post('/profile/update', 'MemberController@saveProfile');

  Route::get('/read', 'MemberController@readNotification');

  Route::get('/order', 'MemberController@showOrder');
  Route::get('/order/show/{id}', 'MemberController@showDetailOrder');
  Route::get('/order/invoice/{id}', 'MemberController@showInvoice');

  Route::get('/cart', 'MemberController@cart');
  Route::get('/comment', 'MemberController@comments');
  Route::post('/comment/update', 'MemberController@updateComment');
  Route::get('/comment/remove/{id}', 'MemberController@deleteComment');

});
