<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::group(['prefix' => 'ajax'], function(){
    Route::get('Tinh/{idQuan}',[
        'as' => 'getQuanHuyen',
        'uses' => 'AjaxController@getQuanHuyen'
    ]);
});
//Route::get('/', function () {
////    return ('URL: login để login - keezimin@gmail.com, 11111');
//    return view('frontend.index');
//});
Route::get('/',['as' => 'getIndex','uses' => 'MainController@getIndex']);
Route::get('sach/{id}/{slug}',['as' => 'getBook_detail','uses' => 'MainController@getBook_detail'])->where('id', '[0-9]+');
Route::get('mua-sach/{id}/{tensach}',['as' => 'getProduct','uses' => 'MainController@getProduct'])->where('id', '[0-9]+');
Route::get('xoa-sach/{id}',['as' => 'delProduct','uses' => 'MainController@delProduct']);
Route::get('xoa-tat-ca-sach',['as' => 'delAllProduct','uses' => 'MainController@delAllProduct']);
Route::get('tac-gia/{id}/{slug}',['as' => 'getAuthor','uses' => 'MainController@getAuthor'])->where('id', '[0-9]+');
Route::get('the-loai/{id}/{slug}',['as' => 'getBookCate','uses' => 'MainController@getBookCate'])->where('id', '[0-9]+');
Route::get('yeu-thich/{id}/{slug}',['as' => 'getBookLike','uses' => 'MainController@getBookLike'])->where('id', '[0-9]+');
Route::get('cap-nhat/{id}/{qty}', ['as' => 'getUpdate','uses' => 'MainController@getUpdate']);
Route::get('gio-hang',['as' => 'getCart','uses' => 'MainController@getCart']);
Route::get('thanh-toan', ['as' => 'getCheckOut','uses' => 'MainController@getCheckOut']);
Route::get('hoan-tat', ['as' => 'getComplete','uses' => 'Complete_CartController@getComplete@getComplete']);
Route::post('binh-luan/{id}', ['as' => 'postComment','uses' => 'CommentController@postComment'])->where('id', '[0-9]+');
Route::post('timkiem', ['as' => 'postSearch','uses' => 'BookController@postSearch']);

//Route::get('tac-gia/{slug}-{id}',['as' => 'getAuthor','uses' => 'MainController@getAuthor']);


//----- ADMIN LOGIN
Route::get('/login', ['as' => 'login_redirect','uses' => 'LoginController@redirect_login']);
Route::get('admin/login',['as' => 'getlogin','uses' => 'LoginController@getlogin']);
Route::post('admin/login',['as' => 'postlogin','uses' => 'LoginController@postlogin']);
Route::get('admin/logout',['as' => 'getlogout','uses' => 'LoginController@getlogout']);

//------- USER LOGIN

Route::get('user/login',['as' => 'getuserlogin','uses' => 'LoginController@getUserlogin']);
Route::get('user/register',['as' => 'getuserregister','uses' => 'LoginController@getUserRegister']);
Route::post('user/register',['as' => 'postUserReg','uses' => 'LoginController@postUserReg']);
Route::post('user/login',['as' => 'postUserlogin','uses' => 'LoginController@postUserlogin']);
Route::get('user/logout',['as' => 'getUserlogout','uses' => 'LoginController@getUserlogout']);

//--- ADMIN CONTROL PANEL

    Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function(){
        Route::get('/', function(){
            $total_book = DB::table('books')->count();
            $total_user = DB::table('users')->count();
            $total_cate = DB::table('categories')->count();
            $total_order = DB::table('orders')->count();
            return view('admin.index', compact('total_book','total_cate','total_user','total_order'));
        });

        Route::group(['prefix' => 'cate'], function(){
            Route::get('add',['as' => 'getCateAdd','uses' => 'CateController@getCateAdd']);
            Route::post('add',['as' => 'postCateAdd','uses' => 'CateController@postCateAdd']);
            Route::get('list', ['as' => 'getCateList','uses' => 'CateController@getCateList']);
            Route::get('edit/{id}', ['as' => 'getCateEdit','uses' => 'CateController@getCateEdit'])->where('id', '[0-9]+');
            Route::post('edit/{id}', ['as' => 'postCateEdit','uses' => 'CateController@postCateEdit'])->where('id', '[0-9]+');
            Route::get('delete/{id}', ['as' => 'getCateDelete','uses' => 'CateController@getCateDelete'])->where('id', '[0-9]+');
        });

        Route::group(['prefix' => 'book'], function(){
            Route::get('add',['as' => 'getBookAdd','uses' => 'BookController@getBookAdd']);
            Route::post('add',['as' => 'postBookAdd','uses' => 'BookController@postBookAdd']);
            Route::get('list', ['as' => 'getBookList','uses' => 'BookController@getBookList']);
            Route::get('edit/{id}', ['as' => 'getBookEdit','uses' => 'BookController@getBookEdit'])->where('id', '[0-9]+');
            Route::post('edit/{id}', ['as' => 'postBookEdit','uses' => 'BookController@postBookEdit'])->where('id', '[0-9]+');
            Route::get('delete/{id}', ['as' => 'getBookDelete','uses' => 'BookController@getBookDelete'])->where('id', '[0-9]+');
        });

        Route::group(['prefix' => 'user'], function(){
            Route::get('add',['as' => 'getUserAdd','uses' => 'UserController@getUserAdd']);
            Route::post('add',['as' => 'postUserAdd','uses' => 'UserController@postUserAdd']);
            Route::get('list', ['as' => 'getUserList','uses' => 'UserController@getUserList']);
            Route::get('edit/{id}', ['as' => 'getUserEdit','uses' => 'UserController@getUserEdit'])->where('id', '[0-9]+');
            Route::post('edit/{id}', ['as' => 'postUserEdit','uses' => 'UserController@postUserEdit'])->where('id', '[0-9]+');
            Route::get('delete/{id}', ['as' => 'getUserDelete','uses' => 'UserController@getUserDelete'])->where('id', '[0-9]+');
        });

        Route::group(['prefix' => 'author'], function(){
            Route::get('add',['as' => 'getAuthorAdd','uses' => 'AuthorController@getAuthorAdd']);
            Route::post('add',['as' => 'postAuthorAdd','uses' => 'AuthorController@postAuthorAdd']);
            Route::get('list', ['as' => 'getAuthorList','uses' => 'AuthorController@getAuthorList']);
            Route::get('edit/{id}', ['as' => 'getAuthorEdit','uses' => 'AuthorController@getAuthorEdit'])->where('id', '[0-9]+');
            Route::post('edit/{id}', ['as' => 'postAuthorEdit','uses' => 'AuthorController@postAuthorEdit'])->where('id', '[0-9]+');
            Route::get('delete/{id}', ['as' => 'getAuthorDelete','uses' => 'AuthorController@getAuthorDelete'])->where('id', '[0-9]+');
        });

        Route::group(['prefix' => 'publisher'], function(){
            Route::get('add',['as' => 'getPublisherAdd','uses' => 'PublisherController@getPublisherAdd']);
            Route::post('add',['as' => 'postPublisherAdd','uses' => 'PublisherController@postPublisherAdd']);
            Route::get('list', ['as' => 'getPublisherList','uses' => 'PublisherController@getPublisherList']);
            Route::get('edit/{id}', ['as' => 'getPublisherEdit','uses' => 'PublisherController@getPublisherEdit'])->where('id', '[0-9]+');
            Route::post('edit/{id}', ['as' => 'postPublisherEdit','uses' => 'PublisherController@postPublisherEdit'])->where('id', '[0-9]+');
            Route::get('delete/{id}', ['as' => 'getPublisherDelete','uses' => 'PublisherController@getPublisherDelete'])->where('id', '[0-9]+');
        });


        Route::get('/order',['as' => 'getOrderList','uses' => 'OrderController@getOrderList']);
        Route::post('/update_status',['as' => 'postUpdateStatus','uses' => 'OrderController@postUpdateStatus'])->where('id', '[0-9]+');
        Route::get('/delete_order/{id}',['as' => 'getDeleteOrder','uses' => 'OrderController@getDeleteOrder'])->where('id', '[0-9]+');
        Route::get('/order_detail/{id}',['as' => 'getOrderDetail','uses' => 'OrderController@getOrderDetail'])->where('id', '[0-9]+');
    });

    // FRONT END CONTROL
//like book
Route::post('like/{id}', ['as' => 'UserLikeBook','uses' => 'MainController@UserLikeBook']);
//contact
Route::get('/contact',['as' => 'getContact','uses' => 'ContactController@getContact']);
Route::post('/contact',['as' => 'postContact','uses' => 'ContactController@postContact']);
//profile
Route::get('/profile/{id}',['as' => 'getProfile','uses' => 'ProfileController@getProfile']);
Route::get('/profile/{id}/edit',['as' => 'getEditProfile','uses' => 'ProfileController@getEditProfile']);
Route::get('/profile/{id}/wishlist',['as' => 'getWishlist','uses' => 'ProfileController@getWishlist']);
Route::get('/profile/{id}/order/history',['as' => 'getOrderHistory','uses' => 'ProfileController@getOrderHistory']);