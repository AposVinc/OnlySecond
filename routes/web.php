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
Route::prefix('Admin')->group(function () {
    Route::name('Admin.')->group(function () {

        Route::get('', function () {
            return view('backend.index');   //QUI VIENE SALTATA LA FORM DI LOGIN GESTITA NE BRANCH "BACKEND"
        });

        Route::get('/Index', function () {
            return view('backend.index');   //QUI VIENE SALTATA LA FORM DI LOGIN GESTITA NE BRANCH "BACKEND"
        })->name('Index');

        Route::get('/Login', function () {
            return view('backend.index');   //QUI VIENE SALTATA LA FORM DI LOGIN GESTITA NE BRANCH "BACKEND"
        })->name('Login');

        Route::get('/prova', 'ProveController@prova');
        Route::get('/prova1', 'ProveController@prova1');

        #brand
        Route::prefix('/Brand')->group(function () {
            Route::name('Brand.')->group(function () {
                Route::get('/List', 'BrandController@showListForm')->name('List');

                Route::get('/Add', 'BrandController@showAddForm')->name('Add');
                Route::post('/AddStore', 'BrandController@create')->name('AddCreate');

                Route::get('/Edit', 'BrandController@showEditForm')->name('Edit');
                Route::post('/EditUpdate', 'BrandController@update')->name('EditUpdate');

                Route::get('/Delete', 'BrandController@showDeleteForm')->name('Delete');
                Route::post('/DeleteDestroy', 'BrandController@destroy')->name('DeleteDestroy');

                Route::get('/Restore', 'BrandController@showRestoreForm')->name('Restore');
                Route::post('/RestoreRestore', 'BrandController@restore')->name('RestoreRestore');
            });
        });

        #collection
        Route::prefix('/Collection')->group(function () {
            Route::name('Collection.')->group(function () {
                Route::get('/List', 'CollectionController@showListForm')->name('List');

                Route::get('/Add', 'CollectionController@showAddForm')->name('Add');
                Route::post('/AddStore', 'CollectionController@create')->name('AddCreate');

                Route::get('/Edit', 'CollectionController@showEditForm')->name('Edit');
                Route::post('/EditGetCollection', 'CollectionController@getCollection')->name('EditGetCollection');
                Route::post('/EditUpdate', 'CollectionController@update')->name('EditUpdate');

                Route::get('/Delete', 'CollectionController@showDeleteForm')->name('Delete');
                Route::post('/DeleteDestroy', 'CollectionController@destroy')->name('DeleteDestroy');

                Route::get('/Restore', 'CollectionController@showRestoreForm')->name('Restore');
                Route::post('/RestoreGetCollection','CollectionController@getCollectionRestore')->name('RestoreGetCollection');
                Route::post('/RestoreRestore', 'CollectionController@restore')->name('RestoreRestore');
            });
        });


        #product
        Route::prefix('/Product')->group(function () {
            Route::name('Product.')->group(function () {
                Route::get('/List', 'ProductController@showListForm')->name('List');

                Route::get('/Add', 'ProductController@showAddForm')->name('Add');
                Route::post('/AddStore', 'ProductController@create')->name('AddCreate');

                Route::get('/Edit', 'ProductController@showEditForm')->name('Edit');
                Route::post('/EditGet', 'ProductController@getCollection')->name('EditGetProduct');
                Route::post('/EditUpdate', 'ProductController@update')->name('EditUpdate');

                Route::get('/Delete', 'ProductController@showDeleteForm')->name('Delete');
                Route::post('/DeleteDestroy', 'ProductController@destroy')->name('DeleteDestroy');

                Route::get('/Restore', 'ProductController@showRestoreForm')->name('Restore');
                Route::post('/RestoreGetProduct', 'ProductController@getProductRestore')->name('RestoreGetProduct');
                Route::post('/RestoreRestore', 'ProductController@restore')->name('RestoreRestore');
            });
        });

        #category
        Route::get('/listCategory', 'CategoryController@showListForm')->name('listCategory');

        Route::get('/addCategory', 'CategoryController@showAddForm')->name('addCategory');
        Route::post('/addCategorySend', 'CategoryController@create')->name('addCategoryCreate');

        Route::get('/editCategory', 'CategoryController@showEditForm')->name('editCategory');
        Route::post('/getCategory', 'CategoryController@getCategory')->name('editGetCategory');
        Route::post('/editCategoryUpdate', 'CategoryController@update')->name('editCategoryUpdate');

        Route::get('/deleteCategory', 'CategoryController@showDeleteForm')->name('deleteCategory');
        Route::post('/deleteCategoryDestroy', 'CategoryController@destroy')->name('deleteCategoryDestroy');

        Route::get('/restoreCategory', 'CategoryController@showRestoreForm')->name('restoreCategory');
        Route::post('/getCategoryRestore', 'CategoryController@getCategoryRestore')->name('restoreGetCategory');
        Route::post('/restoreCategoryRestore', 'CategoryController@restore')->name('restoreCategoryRestore');

        #supplier
        Route::prefix('/Supplier')->group(function () {
            Route::name('Supplier.')->group(function () {
                Route::get('/List', 'SupplierController@showListForm')->name('List');

                Route::get('/Add', 'SupplierController@showAddForm')->name('Add');
                Route::post('/AddStore', 'SupplierController@create')->name('AddCreate');

                Route::get('/Edit', 'SupplierController@showEditForm')->name('Edit');
                Route::post('/EditUpdate', 'SupplierController@update')->name('EditUpdate');

                Route::get('/Delete', 'SupplierController@showDeleteForm')->name('Delete');
                Route::post('/DeleteDestroy', 'SupplierController@destroy')->name('DeleteDestroy');

                Route::get('/Restore', 'SupplierController@showRestoreForm')->name('Restore');
                Route::post('/RestoreRestore', 'SupplierController@restore')->name('RestoreRestore');
            });
        });
    });
});

Route::fallback(function () {
    return view('frontend.404');
});