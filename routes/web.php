<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OrderDetailController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RatingController;
use App\Http\Controllers\Admin\ReplyController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\StatusController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\client\CartController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\SearchController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//client

Route::prefix('/')->group(function(){

    Route::get('/',[HomeController::class,'index'])->name('home');

    Route::get('/contact', [HomeController::class, 'contact']);
    Route::get('/shop', [HomeController::class, 'shop'])->name('shop');
    Route::get('/shoppingCart', [HomeController::class, 'shoppingCart'])->name('cart');
    Route::get('/checkout', [HomeController::class, 'checkout']);
    Route::post('/checkout', [HomeController::class, 'checkout1'])->name('checkout');
    Route::get('/productDetail/{id}', [HomeController::class, 'shopDetail'])->name('pro_detail');
    Route::get('/addToCart/{id}/{quanty?}', [CartController::class, 'create'])->name('addToCart');
    Route::get('/addCart/{id}', [CartController::class, 'add'])->name('addCart');
    Route::post('/cart-save-all', [CartController::class, 'update'])->name('updateCart');
    Route::get('/deleteCart/{id}', [CartController::class, 'destroy'])->name('deleteCart');
    Route::get('/pro_cate/{id}', [HomeController::class, 'pro_cate'])->name('pro_cate');
    Route::get('/pro_size/{id}', [HomeController::class, 'pro_size'])->name('pro_size');
    Route::get('/shop/search', [SearchController::class, 'shopSearch'])->name('shopSearch');
    Route::get('/search', [SearchController::class, 'search'])->name('search');
    Route::get('/orderSearch/{key?}', [SearchController::class, 'orderSearch'])->name('orderSearch');
    Route::get('/listOrderDetails/{id}', [SearchController::class, 'listOrderDetails'])->name('listOrderDetails');
    Route::get('/listOrder/{id}', [SearchController::class, 'listOrder'])->name('listOrder');
    Route::get('/acceptOrder/{id}', [OrderController::class, 'accept'])->name('acceptOrder');

    Route::post('/store',[ContactController::class,'store'])->name('contacts.store');

});

//server

Route::middleware(['auth'])->prefix('/admin')->group(function(){

    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    Route::get('/thongke',[AdminController::class,'thongkedonhang'])->name('thongke');

    Route::prefix('roles')->controller(RoleController::class)->name('roles.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'destroy')->name('destroy');
    });



    // admin users

    Route::prefix('users')->controller(UserController::class)->name('users.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/changeRole/{id}', 'changeRole')->name('changeRole');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'destroy')->name('destroy');
    });

    // admin categories

    Route::prefix('categories')->controller(CategoryController::class)->name('categories.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'destroy')->name('destroy');
    });

    // admin sizes

    Route::prefix('sizes')->controller(SizeController::class)->name('sizes.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'destroy')->name('destroy');
    });

    // admin products

    Route::prefix('products')->controller(ProductController::class)->name('products.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::get('/changeStatus/{id}', 'changeStatus')->name('changeStatus');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'destroy')->name('destroy');
    });

    // admin contacts

    Route::prefix('contacts')->controller(ContactController::class)->name('contacts.')->group(function(){
        Route::get('/', 'index')->name('index');

        Route::delete('/delete/{id}', 'destroy')->name('destroy');
    });

    //admin orders

    Route::prefix('orders')->controller(OrderController::class)->name('orders.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'destroy')->name('destroy');
    });

    //admin order_details

    Route::prefix('orderDetails')->controller(OrderDetailController::class)->name('orderDetails.')->group(function(){
        Route::get('/{id}', 'show')->name('index');
    });
    //admin comments

    Route::prefix('comments')->controller(CommentController::class)->name('comments.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('details');
        Route::delete('/delete/{id}', 'destroy')->name('destroy');
    });
    //admin replies

    Route::prefix('replies')->controller(ReplyController::class)->name('replies.')->group(function(){
        Route::get('/', 'index')->name('index');
        // Route::get('/{id}', 'show')->name('details');
        Route::delete('/delete/{id}', 'destroy')->name('destroy');
    });

    //admin ratings
    Route::prefix('ratings')->controller(RatingController::class)->name('ratings.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('details');
    });

     // admin status

     Route::prefix('statuses')->controller(StatusController::class)->name('statuses.')->group(function(){
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'destroy')->name('destroy');
    });

});

Route::middleware('guest')->prefix('/auth')->name('auth.')->group(function () {

    //login
    Route::get('/login', [LoginController::class, 'loginform'])->name('loginform');
    Route::post('/login', [LoginController::class, 'postlogin'])->name('postlogin');
    //register
    Route::get('/register', [RegisterController::class, 'registerform'])->name('register');
    Route::post('/register', [RegisterController::class, 'postRegister'])->name('postRegister');
    //login GG
    Route::get('/login-google', [LoginController::class, 'loginGG'])->name('loginGG');
    Route::get('/google/callback', [LoginController::class, 'postloginGG'])->name('postloginGG');
});
//logout
Route::post('/logout', [LoginController::class,'logout'])->name('logout');


Route::post('/comment',[CommentController::class, 'store'])->name('comments.store');
Route::post('/replies/{id}',[ReplyController::class, 'store'])->name('replies.store');
Route::post('/rating',[RatingController::class, 'store'])->name('rating');

