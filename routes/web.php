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

Route::get('/', function () {
    return view('frontend.index');
});


Route::get('/home', function () {
    return view('frontend.index');
});



Route::get('/shop', 'ShopController@index')->name('shop');


//ROUTE CON SOLO MODEL UTENTE E NON ADMIN
// Authentication Routes...

Route::get('login', 'Auth\LoginController@showLoginForm')->name('user.login');
Route::post('login', 'Auth\LoginController@login')->name('user.loginpost');
Route::get('logout', 'Auth\LoginController@logout')->name('user.logout'); //era post, non so perchè
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('user.register');
Route::post('register', 'Auth\RegisterController@register')->name('user.registerpost');

/*
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('user.login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logoutex')->name('user.logout'); //era post, non so perchè

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('user.register');
Route::post('register', 'Auth\RegisterController@register');
*/
/*  DA DEFINIRE

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
*/

//ADMIN
Route::name('admin.')->group(function () {

    Route::get('admin', function (){
        return view('backend.index');   //QUI VIENE SALTATA LA FORM DI LOGIN GESTITA NE BRANCH "BACKEND"
    });

    Route::get('admin/index', function (){
        return view('backend.index');   //QUI VIENE SALTATA LA FORM DI LOGIN GESTITA NE BRANCH "BACKEND"
    })->name('index');

    Route::get('admin/login', function (){
        return view('backend.index');   //QUI VIENE SALTATA LA FORM DI LOGIN GESTITA NE BRANCH "BACKEND"
    })->name('login');


    #brand
    Route::get('admin/listbrand', 'BrandController@showListForm')->name('listbrand');

    Route::get('admin/addbrand', 'BrandController@showAddForm')->name('addbrand');
    Route::post('admin/addbrandstore', 'BrandController@create')->name('addbrandcreate');

    Route::get('admin/editbrand', 'BrandController@showEditForm')->name('editbrand');
    Route::post('admin/editbrandupdate', 'BrandController@update')->name('editbrandupdate');

    Route::get('admin/deletebrand','BrandController@showDeleteForm')->name('deletebrand');
    Route::post('admin/deletebranddestroy','BrandController@destroy')->name('deletebranddestroy');

    Route::get('admin/restorebrand','BrandController@showRestoreForm')->name('restorebrand');
    Route::post('admin/restorebrandrestore','BrandController@restore')->name('restorebrandrestore');


    #collection
    Route::get('admin/listcollection', 'CollectionController@showListForm')->name('listcollection');

    Route::get('admin/addcollection', 'CollectionController@showAddForm')->name('addcollection');
    Route::post('admin/addcollectioncreate', 'CollectionController@create')->name('addcollectioncreate');

    Route::get('admin/editcollection', 'CollectionController@showEditForm')->name('editcollection');
    Route::post('admin/getCollection', 'CollectionController@getCollection')->name('editGetCollection');
    Route::post('admin/editcollectionupdate', 'CollectionController@update')->name('editcollectionupdate');

    Route::get('admin/deletecollection','CollectionController@showDeleteForm')->name('deletecollection');
    Route::post('admin/deletecollectiondestroy','CollectionController@destroy')->name('deletecollectiondestroy');

    Route::get('admin/restorecollection','CollectionController@showRestoreForm')->name('restorecollection');
    Route::post('admin/restorecollectionrestore','CollectionController@restore')->name('restorecollectioncollection');


    #product
    Route::get('admin/addproduct', 'ProductController@showAddProductForm')->name('addproduct');
    Route::post('admin/addproductsend', 'ProductController@store')->name('addproductstore');

    Route::get('admin/editproduct', function (){
        return view('backend.prodotto.editproduct');
    })->name('editproduct');

    Route::get('admin/deleteproduct', function (){
        return view('backend.prodotto.deleteproduct');
    })->name('deleteproduct');

});





Route::fallback(function () {
    return view('frontend.404');
});