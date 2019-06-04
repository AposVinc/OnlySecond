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
})->name('Home');



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
/*
        Route::get('/Login', function () {
            return view('backend.index');   //QUI VIENE SALTATA LA FORM DI LOGIN GESTITA NE BRANCH "BACKEND"
        })->name('Login');
*/
        Route::get('/Login', 'Auth\LoginController@showLoginFormBE')->name('LoginForm');
        Route::post('/LoginPost', 'Auth\LoginController@loginBE')->name('LoginPost');

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
                Route::post('/EditUpdate', 'ProductController@update')->name('EditUpdate');

                Route::get('/Delete', 'ProductController@showDeleteForm')->name('Delete');
                Route::post('/DeleteDestroy', 'ProductController@destroy')->name('DeleteDestroy');

                Route::get('/Restore', 'ProductController@showRestoreForm')->name('Restore');
                Route::post('/RestoreRestore', 'ProductController@restore')->name('RestoreRestore');
            });
        });

        #category
        Route::prefix('/Category')->group(function () {
            Route::name('Category.')->group(function () {
                Route::get('/List', 'CategoryController@showListForm')->name('List');

                Route::get('/Add', 'CategoryController@showAddForm')->name('Add');
                Route::post('/AddStore', 'CategoryController@create')->name('AddCreate');

                Route::get('/Edit', 'CategoryController@showEditForm')->name('Edit');
                Route::post('/EditUpdate', 'CategoryController@update')->name('EditUpdate');

                Route::get('/Delete', 'CategoryController@showDeleteForm')->name('Delete');
                Route::post('/DeleteDestroy', 'CategoryController@destroy')->name('DeleteDestroy');

                Route::get('/Restore', 'CategoryController@showRestoreForm')->name('Restore');
                Route::post('/RestoreRestore', 'CategoryController@restore')->name('RestoreRestore');
            });
        });

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
        
        #newsletter
        Route::prefix('/Newsletter')->group(function () {
            Route::name('Newsletter.')->group(function () {
                Route::get('/List', 'NewsletterController@showListForm')->name('List');

                Route::get('/SendMail', 'NewsletterController@showSendMailForm')->name('SendMailForm');
                Route::post('/SendMailPost', 'NewsletterController@SendMail')->name('SendMail');
            });
        });

        #discount
        Route::prefix('/Discount')->group(function () {
            Route::name('Discount.')->group(function () {
                Route::get('/List', 'DiscountController@showListForm')->name('List');

                Route::get('/Add', 'DiscountController@showAddForm')->name('Add');
                Route::post('/AddStore', 'DiscountController@create')->name('AddCreate');
            });
        });
    });
});

Route::fallback(function () {
    return view('frontend.404');
});