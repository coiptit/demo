<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PageController;

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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

Route::get('/email/verity',function (){
   return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('index');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

//Route::get('admin/login',function (){
//   return view('admin.login');
//})->name('admin.login');
Route::get('admin/login',[AdminController::class,'login'])->name('admin.login');
Route::post('admin/login',[AdminController::class,'loginConfirm'])->name('admin.loginConfirm');
Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function (){
    Route::get('logout',[AdminController::class,'logout'])->name('logout');
    Route::get('/',[AdminController::class,'index'])->name('index');
    Route::get('category',[AdminController::class,'category'])->name('category');
    Route::get('product',[AdminController::class,'product'])->name('product');
    Route::get('customer',[AdminController::class,'customer'])->name('customer');
    Route::get('order',[AdminController::class,'order'])->name('order');

    Route::resources([
        'categories'=>CategoryController::class,
        'products'=>ProductController::class,
    ]);
});

Route::get('/',[PageController::class,'index'])->name('index');
Route::get('/category/{id}',[PageController::class,'category'])->name('category');
Route::get('/cart',[PageController::class,'cart'])->name('cart');
Route::get('/contact',[PageController::class,'contact'])->name('contact');
Route::get('/detail/{id}',[PageController::class,'detail'])->name('detail');
Route::get('/product/add-to-cart/{id}',[PageController::class,'addToCart'])->name('addToCart');
Route::get('/product/update-cart',[PageController::class,'updateCart'])->name('updateCart');
Route::get('/product/delete-cart',[PageController::class,'deleteCart'])->name('deleteCart');
Route::middleware(['auth:sanctum', 'verified'])->post('/order',[PageController::class,'order'])->name('order');
Route::middleware(['auth:sanctum', 'verified'])->post('/contactPost',[PageController::class,'contactPost'])->name('contactPost');

