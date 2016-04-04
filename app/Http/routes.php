<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::any('/wechat', 'WechatController@serve');
// Route::get('/test', 'WechatController@test');
// Route::get('/login', 'WechatController@login');
// Route::group(['middleware' => ['web', 'wechat.oauth']], function () {
//   Route::get('/user', function () {
//     $user = session('wechat.oauth_user'); // 拿到授权用户资料
//     dd($user);
//   });
// });
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
   Route::get('/', array('as' => 'landingpage', 'uses' => 'ClientController@home'));
   // authentication related routes
	 Route::get('/admin', 'Auth\AuthController@showLoginForm');
   Route::get('/admin/logout', array('as' => 'user.logout', 'uses' => 'Auth\AuthController@logout'));
	 Route::get('/admin/register', 'Auth\AuthController@showRegistrationForm');
   Route::auth();

    Route::get('/home', 'UserController@redirectToDashboard');
    Route::get('/admin/{username}/dashboard', array('as' => 'user.dashboard', 'uses' => 'UserController@dashboard'));
    Route::get('/admin/{username}/profile', array('as' => 'user.profile', 'uses' => 'UserController@profile'));

    Route::get('/admin/{username}/products', array('as' => 'user.products', 'uses' => 'ProductController@showAllProducts'));
    Route::get('/admin/{username}/product/create', array('as' => 'create.product.form', 'uses' => 'ProductController@showCreateProductForm'));
    Route::post('/admin/{username}/product/create', array('as' => 'product.create', 'uses' => 'ProductController@createProduct'));
    Route::get('/admin/{username}/product/{product_name}/create', array('as' => 'edit.product.form', 'uses' => 'ProductController@showEditProductForm'));
    Route::post('/admin/{username}/product/{product_name}/update', array('as' => 'update.product', 'uses' => 'ProductController@updateProduct'));


    Route::get('/admin/{username}/pages', array('as' => 'user.pages', 'uses' => 'PageController@viewUserPages'));
    Route::get('/admin/{username}/pages/create', array('as' => 'user.page.create', 'uses' => 'PageController@showCreateUserPageForm'));
    Route::post('/admin/{username}/pages/create', array('as' => 'page.create', 'uses' => 'PageController@createUserPage'));
    // Route::get('/admin/{username}/pages/{pagename}/edit', array('as' => 'user.page.form.edit', 'uses' => 'PageController@showEditUserPageForm'));
    // Route::post('/admin/{username}/pages/{pagename}/edit', array('as' => 'user.page.edit', 'uses' => 'PageController@editUserPage'));
    // Route::get('/admin/{username}/page/{pagename}/delete', array('as' => 'user.page.delete', 'uses' => 'PageController@deleteUserPage'));
    

});
