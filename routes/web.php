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

Route::get('/contact', function(){
    return view('frontend.contact');
});

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
    Route::get('admin/listBrand', 'BrandController@showListForm')->name('listBrand');

    Route::get('admin/addBrand', 'BrandController@showAddForm')->name('addBrand');
    Route::post('admin/addBrandCreate', 'BrandController@create')->name('addBrandCreate');

    Route::get('admin/editBrand', 'BrandController@showEditForm')->name('editBrand');
    Route::post('admin/editBrandUpdate', 'BrandController@update')->name('editBrandUpdate');

    Route::get('admin/deleteBrand','BrandController@showDeleteForm')->name('deleteBrand');
    Route::post('admin/deleteBrandDestroy','BrandController@destroy')->name('deleteBrandDestroy');

    Route::get('admin/restoreBrand','BrandController@showRestoreForm')->name('restoreBrand');
    Route::post('admin/restoreBrandRestore','BrandController@restore')->name('restoreBrandRestore');


    #collection
    Route::get('admin/listCollection', 'CollectionController@showListForm')->name('listCollection');

    Route::get('admin/addCollection', 'CollectionController@showAddForm')->name('addCollection');
    Route::post('admin/addCollectionCreate', 'CollectionController@create')->name('addCollectionCreate');

    Route::get('admin/editCollection', 'CollectionController@showEditForm')->name('editCollection');
    Route::post('admin/getCollection', 'CollectionController@getCollection')->name('editGetCollection');
    Route::post('admin/editCollectionUpdate', 'CollectionController@update')->name('editCollectionUpdate');

    Route::get('admin/deleteCollection','CollectionController@showDeleteForm')->name('deleteCollection');
    Route::post('admin/deleteCollectionDestroy','CollectionController@destroy')->name('deleteCollectionDestroy');

    Route::get('admin/restoreCollection','CollectionController@showRestoreForm')->name('restoreCollection');
    Route::post('admin/getCollectionRestore', 'CollectionController@getCollectionRestore')->name('restoreGetCollection');
    Route::post('admin/restoreCollectionRestore','CollectionController@restore')->name('restoreCollectionRestore');


    #product
    Route::get('admin/listProduct', 'ProductController@showListForm')->name('listProduct');

    Route::get('admin/addProduct', 'ProductController@showAddForm')->name('addProduct');
    Route::post('admin/addProductCreate', 'ProductController@create')->name('addProductCreate');

    Route::get('admin/editProduct', 'ProductController@showEditForm')->name('editProduct');
    Route::post('admin/getProduct', 'ProductController@getCollection')->name('editGetProduct');
    Route::post('admin/editProductUpdate', 'ProductController@update')->name('editProductUpdate');

    Route::get('admin/deleteProduct','ProductController@showDeleteForm')->name('deleteProduct');
    Route::post('admin/deleteProductDestroy','ProductController@destroy')->name('deleteProductDestroy');

    Route::get('admin/restoreProduct','ProductController@showRestoreForm')->name('restoreProduct');
    Route::post('admin/getProductRestore', 'ProductController@getProductRestore')->name('restoreGetProduct');
    Route::post('admin/restoreProductRestore','ProductController@restore')->name('restoreProductRestore');

    #category
    Route::get('admin/listCategory', 'CategoryController@showListForm')->name('listCategory');

    Route::get('admin/addCategory', 'CategoryController@showAddForm')->name('addCategory');
    Route::post('admin/addCategoryCreate', 'CategoryController@create')->name('addCategoryCreate');

    Route::get('admin/editCategory', 'CategoryController@showEditForm')->name('editCategory');
    Route::post('admin/getCategory', 'CategoryController@getCategory')->name('editGetCategory');
    Route::post('admin/editCategoryUpdate', 'CategoryController@update')->name('editCategoryUpdate');

    Route::get('admin/deleteCategory', 'CategoryController@showDeleteForm')->name('deleteCategory');
    Route::post('admin/deleteCategoryDestroy', 'CategoryController@destroy')->name('deleteCategoryDestroy');

    Route::get('admin/restoreCategory', 'CategoryController@showRestoreForm')->name('restoreCategory');
    Route::post('admin/getCategoryRestore', 'CategoryController@getCategoryRestore')->name('restoreGetCategory');
    Route::post('admin/restoreCategoryRestore', 'CategoryController@restore')->name('restoreCategoryRestore');
});

Route::fallback(function () {
    return view('frontend.404');
});