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

Route::get('/Home', function () {
    return view('frontend.index');
})->name('Home');

Route::get('/Home1', function () {
    return view('frontendColorshop.index');
})->name('Home1');

Route::get('/Shop', function () {
    return view('frontend.shop');
})->name('Shop');

Route::get('/ContactUS', function(){
    return view('frontend.contact');
})->name('ContactUS');

Route::get('/About', function(){
    return view('frontend.about');
})->name('About');

Route::get('/Checkout', function(){
    return view('frontend.checkout');
})->name('Checkout');

Route::get('/CartPage', function(){
    return view('frontend.cartpage');
})->name('CartPage');

Route::get('/Discount', function(){
    return view('frontend.discount');
})->name('Discount');

Route::get('/Profile', function () {
    return view('frontend.profile');
})->name('Profile');

Route::get('/Chronology', function () {
    return view('frontend.chronology');
})->name('Chronology');

Route::get('/EditProfile', function () {
    return view('frontend.editprofile');
})->name('EditProfile');

Route::get('/Wishlist', function () {
   return view('frontend.wishlist');
})->name('Wishlist');

Route::get('/Payment', function () {
    return view('frontend.payment');
})->name('Payment');

Route::get('/Review', function () {
    return view('frontend.review');
})->name('Review');

Route::get('/Address', function () {
    return view('frontend.address');
})->name('Address');

Route::get('/Password_Resets', function () {
    return view('frontend.password_resets');
})->name('Password_Resets');

Route::get('WorkInProgress', function () {
    return view('frontend.workinprogress');
})->name('WorkInProgress');


Route::post('/ContactUS/AddPost', 'ContactUSController@create')->name('ContactUS.AddPost');

Route::post('/Newsletter/AddPost', 'NewsletterController@create')->name('Newsletter.AddPost');



//ROUTE CON SOLO MODEL UTENTE E NON ADMIN
// Authentication Routes...
Route::get('Login', 'Auth\LoginController@showLoginForm')->name('user.login');
Route::post('Login', 'Auth\LoginController@loginFE')->name('user.loginpost');
Route::get('Logout', 'Auth\LoginController@logout')->name('user.logout');

// Registration Routes...
Route::get('Register', 'Auth\RegisterController@showRegistrationForm')->name('user.register');
Route::post('Register', 'Auth\RegisterController@register')->name('user.registerpost');

/*
// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('user.login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', 'Auth\LoginController@logoutex')->name('user.logout'); //era post, non so perchè

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('user.register');
Route::post('register', 'Auth\RegisterController@register');
*/

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');


//ADMIN
Route::prefix('Admin')->group(function () {
    Route::name('Admin.')->group(function () {

        Route::get('/Layout', function () {
            return view('backend.layout');
        })->name('Layout');

        Route::get('', function () {
            return view('backend.index');   //QUI VIENE SALTATA LA FORM DI LOGIN GESTITA NE BRANCH "BACKEND"
        });

        Route::get('/Index', 'Controller@Index')->name('Index'); //QUI VIENE SALTATA LA FORM DI LOGIN GESTITA NE BRANCH "BACKEND"

        Route::get('/Login', 'Auth\LoginController@showLoginFormBE')->name('LoginForm');
        Route::post('/LoginPost', 'Auth\LoginController@loginBE')->name('LoginPost');

        #route chiamata ajax per collection
        Route::post('/EditGetCollection', 'CollectionController@getCollection')->name('GetCollection');
        Route::post('/RestoreGetCollection','CollectionController@getCollectionRestore')->name('RestoreGetCollection');

        #route chiamata ajax per collection
        Route::post('/GetProduct', 'ProductController@getProduct')->name('GetProduct');
        Route::post('/RestoreGetProduct', 'ProductController@getProductRestore')->name('RestoreGetProduct');

        #route chiamata ajax per banner
        Route::post('/GetBanner', 'BannerController@getBanner')->name('GetBanner');
        Route::post('/GetVisible', 'BannerController@getVisible')->name('GetVisible');
        Route::post('/RestoreGetBanner', 'BannerController@getBannerRestore')->name('RestoreGetBanner');

        #route chiamata ajax per offer
        Route::post('/GetPrice', 'OfferController@getPrice')->name('GetPrice');
        Route::post('/GetRate', 'OfferController@getRate')->name('GetRate');
        Route::post('/GetDate', 'OfferController@getDate')->name('GetDate');
        Route::post('/GetProductWithOffer', 'ProductController@getProductWithOffer')->name('GetProductWithOffer');
        Route::post('/RestoreGetProductWithOffer', 'ProductController@getProductRestoreWithOffer')->name('RestoreGetProductWithOffer');

        #route chiamata ajax per image
        Route::post('/GetImage', 'ImageController@getImage')->name('GetImage');
        Route::post('/RestoreGetImage', 'ImageController@getImageRestore')->name('RestoreGetImage');


        Route::group(['middleware' => ['permission:gest_utenti']], function () {
            #user
            Route::prefix('/User')->group(function () {
                Route::name('User.')->group(function () {
                    Route::get('/List', 'UserController@showListForm')->name('List');

                    Route::get('/Add', 'UserController@showAddForm')->name('Add');
                    Route::post('/AddPost', 'UserController@create')->name('AddPost');

                    Route::get('/Edit', 'UserController@showEditForm')->name('Edit');
                    Route::post('/EditPost', 'UserController@update')->name('EditPost');

                    Route::get('/Delete', 'UserController@showDeleteForm')->name('Delete');
                    Route::post('/DeletePost', 'UserController@destroy')->name('DeletePost');

                    Route::get('/Restore', 'UserController@showRestoreForm')->name('Restore');
                    Route::post('/RestorePost', 'UserController@restore')->name('RestorePost');
                });
            });

            #role
            Route::prefix('/Role')->group(function () {
                Route::name('Role.')->group(function () {
                    Route::get('/List', 'RoleController@showListForm')->name('List');

                    Route::get('/Add', 'RoleController@showAddForm')->name('Add');
                    Route::post('/AddPost', 'RoleController@create')->name('AddPost');

                    Route::get('/Edit', 'RoleController@showEditForm')->name('Edit');
                    Route::post('/EditPost', 'RoleController@update')->name('EditPost');

                    Route::get('/Delete', 'RoleController@showDeleteForm')->name('Delete');
                    Route::post('/DeletePost', 'RoleController@destroy')->name('DeletePost');

                    //Ripristina non c'è perche non previsto da Spatie infatti non ha SoftDeletes
                });
            });
        });


        Route::group(['middleware' => ['permission:gest_prodotti']], function () {
            #brand
            Route::prefix('/Brand')->group(function () {
                Route::name('Brand.')->group(function () {
                    Route::get('/List', 'BrandController@showListForm')->name('List');
                    Route::get('/List/Image/{id}', 'BrandController@showImage')->name('Image');

                    Route::get('/Add', 'BrandController@showAddForm')->name('Add');
                    Route::post('/AddPost', 'BrandController@create')->name('AddPost');

                    Route::get('/Edit', 'BrandController@showEditForm')->name('Edit');
                    Route::post('/EditPost', 'BrandController@update')->name('EditPost');

                    Route::get('/Delete', 'BrandController@showDeleteForm')->name('Delete');
                    Route::post('/DeletePost', 'BrandController@destroy')->name('DeletePost');

                    Route::get('/Restore', 'BrandController@showRestoreForm')->name('Restore');
                    Route::post('/RestorePost', 'BrandController@restore')->name('RestorePost');
                });
            });

            #collection
            Route::prefix('/Collection')->group(function () {
                Route::name('Collection.')->group(function () {
                    Route::get('/List', 'CollectionController@showListForm')->name('List');

                    Route::get('/Add', 'CollectionController@showAddForm')->name('Add');
                    Route::post('/AddPost', 'CollectionController@create')->name('AddPost');

                    Route::get('/Edit', 'CollectionController@showEditForm')->name('Edit');
                    Route::post('/EditPost', 'CollectionController@update')->name('EditPost');

                    Route::get('/Delete', 'CollectionController@showDeleteForm')->name('Delete');
                    Route::post('/DeletePost', 'CollectionController@destroy')->name('DeletePost');

                    Route::get('/Restore', 'CollectionController@showRestoreForm')->name('Restore');
                    Route::post('/RestorePost', 'CollectionController@restore')->name('RestorePost');
                });
            });


            #product
            Route::prefix('/Product')->group(function () {
                Route::name('Product.')->group(function () {
                    Route::get('/List', 'ProductController@showListForm')->name('List');

                    Route::get('/Add', 'ProductController@showAddForm')->name('Add');
                    Route::post('/AddPost', 'ProductController@create')->name('AddPost');

                    Route::get('/Edit', 'ProductController@showEditForm')->name('Edit');
                    Route::post('/EditPost', 'ProductController@update')->name('EditPost');

                    Route::get('/Delete', 'ProductController@showDeleteForm')->name('Delete');
                    Route::post('/DeletePost', 'ProductController@destroy')->name('DeletePost');

                    Route::get('/Restore', 'ProductController@showRestoreForm')->name('Restore');
                    Route::post('/RestorePost', 'ProductController@restore')->name('RestorePost');
                });
            });


            #category
            Route::prefix('/Category')->group(function () {
                Route::name('Category.')->group(function () {
                    Route::get('/List', 'CategoryController@showListForm')->name('List');

                    Route::get('/Add', 'CategoryController@showAddForm')->name('Add');
                    Route::post('/AddPost', 'CategoryController@create')->name('AddPost');

                    Route::get('/Edit', 'CategoryController@showEditForm')->name('Edit');
                    Route::post('/EditPost', 'CategoryController@update')->name('EditPost');

                    Route::get('/Delete', 'CategoryController@showDeleteForm')->name('Delete');
                    Route::post('/DeletePost', 'CategoryController@destroy')->name('DeletePost');

                    Route::get('/Restore', 'CategoryController@showRestoreForm')->name('Restore');
                    Route::post('/RestorePost', 'CategoryController@restore')->name('RestorePost');
                });
            });
        });

        Route::group(['middleware' => ['permission:gest_fornitori']], function () {
            #supplier
            Route::prefix('/Supplier')->group(function () {
                Route::name('Supplier.')->group(function () {
                    Route::get('/List', 'SupplierController@showListForm')->name('List');

                    Route::get('/Add', 'SupplierController@showAddForm')->name('Add');
                    Route::post('/AddPost', 'SupplierController@create')->name('AddPost');

                    Route::get('/Edit', 'SupplierController@showEditForm')->name('Edit');
                    Route::post('/EditPost', 'SupplierController@update')->name('EditPost');

                    Route::get('/Delete', 'SupplierController@showDeleteForm')->name('Delete');
                    Route::post('/DeletePost', 'SupplierController@destroy')->name('DeletePost');

                    Route::get('/Restore', 'SupplierController@showRestoreForm')->name('Restore');
                    Route::post('/RestorePost', 'SupplierController@restore')->name('RestorePost');
                });
            });
        });

        Route::group(['middleware' => ['permission:gest_newsletter']], function () {
            #newsletter
            Route::prefix('/Newsletter')->group(function () {
                Route::name('Newsletter.')->group(function () {
                    Route::get('/List', 'NewsletterController@showListForm')->name('List');
                    Route::get('/SendMail', 'NewsletterController@showSendMailForm')->name('SendMailForm');
                    Route::post('/SendMailPost', 'NewsletterController@SendMail')->name('SendMail');
                });
            });
        });

        Route::group(['middleware' => ['permission:gest_offerte']], function () {
            #offer
            Route::prefix('/Offer')->group(function () {
                Route::name('Offer.')->group(function () {
                    Route::get('/List', 'OfferController@showListForm')->name('List');

                    Route::get('/Add', 'OfferController@showAddForm')->name('Add');
                    Route::post('/AddPost', 'OfferController@create')->name('AddPost');

                    Route::get('/Edit', 'OfferController@showEditForm')->name('Edit');
                    Route::post('/EditPost', 'OfferController@update')->name('EditPost');

                    Route::get('/Delete', 'OfferController@showDeleteForm')->name('Delete');
                    Route::post('/DeletePost', 'OfferController@destroy')->name('DeletePost');

                    Route::get('/Restore', 'OfferController@showRestoreForm')->name('Restore');
                    Route::post('/RestorePost', 'OfferController@restore')->name('RestorePost');
                });
            });
        });


        Route::group(['middleware' => ['permission:gest_imgprod']], function () {
            #image
            Route::prefix('/Image')->group(function () {
                Route::name('Image.')->group(function () {
                    Route::get('/List', 'ImageController@showListForm')->name('List');
                    Route::get('/List/Image/{id}', 'ImageController@showImage')->name('ShowImage');

                    Route::get('/Add', 'ImageController@showAddForm')->name('Add');
                    Route::post('/AddPost', 'ImageController@create')->name('AddPost');
                });
            });
        });

        Route::group(['middleware' => ['permission:gest_banner']], function () {
            #banner
            Route::prefix('/Banner')->group(function () {
                Route::name('Banner.')->group(function () {
                    Route::get('/List', 'BannerController@showListForm')->name('List');
                    Route::get('/List/Image/{id}', 'BannerController@showImage')->name('ShowImage');

                    Route::get('/Add', 'BannerController@showAddForm')->name('Add');
                    Route::post('/AddPost', 'BannerController@create')->name('AddPost');

                    Route::get('/Edit', 'BannerController@showEditForm')->name('Edit');
                    Route::post('/EditPost', 'BannerController@update')->name('EditPost');

                    Route::get('/Delete', 'BannerController@showDeleteForm')->name('Delete');
                    Route::post('/DeletePost', 'BannerController@destroy')->name('DeletePost');
                });
            });
        });

        Route::group(['middleware' => ['permission:gest_assistenza']], function () {
            #contact us
            Route::prefix('/ContactUS')->group(function () {
                Route::name('ContactUS.')->group(function () {
                    Route::get('/List', 'ContactUSController@showListForm')->name('List');

                    Route::get('/ShowMail/{id}', 'ContactUSController@showMail')->name('ShowMail');
                });
            });
        });


    });
});

    Route::fallback(function () {
        return view('frontend.404');
    });




