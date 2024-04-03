<?php

use App\Http\Controllers\back\AdminBanerController;
use App\Http\Controllers\back\AdminCategoryController;
use App\Http\Controllers\back\AdminCommentController;
use App\Http\Controllers\back\AdminDashboardController;
use App\Http\Controllers\back\AdminOrderController;
use App\Http\Controllers\back\AdminProductController;
use App\Http\Controllers\back\AdminSliderController;
use App\Http\Controllers\back\AdminStatController;
use App\Http\Controllers\back\AdminUserController;
use App\Http\Controllers\front\CheckOutController;
use App\Http\Controllers\front\CommentController;
use App\Http\Controllers\front\ProductController;
use App\Http\Controllers\front\BasketController;
use App\Http\Controllers\front\SearchController;
use App\Http\Controllers\front\ShowCartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\IndexController;
use App\Http\Controllers\ProfileController;
use Aghandeh\IranShippingPrice\Shipping;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('/index')->group(function(){
    Route::get('/index',[IndexController::class,'index'])->name('index');
    Route::get('/about-us',[IndexController::class,'aboutUs'])->name('about.index');
    Route::get('/connect-us',[IndexController::class,'connectUs'])->name('connect.index');
});
Route::prefix('/product')->group(function(){
    Route::get('/index/{product}',[ProductController::class,'index'])->name('product.index');
    Route::post('/addToBasket/{product}',[ProductController::class,'addToBasket'])->name('add.basket');
    Route::post('/addcomment/{product}',[CommentController::class,'store'])->name('comment.store');
});

Route::prefix('/basket')->group(function(){
    Route::get('/index',[BasketController::class,'index'])->name('basket.index');
    Route::get('/basket-delete/{basket}',[BasketController::class,'deleteBasket'])->name('destroy.basket');
    Route::post('/doChange/{basket}',[BasketController::class,'update'])->name('update.basket');
    Route::post('/postprice',[BasketController::class,'calculatePost'])->name('post.price');
});

Route::prefix('/checkout')->group(function(){
    Route::get('/index',[CheckOutController::class,'index'])->name('checkout.checkout');
    Route::post('/checkCode',[CheckOutController::class,'checkCodeResponse'])->name('check.discount.code');
    Route::post('/calculatetotalprice',[CheckOutController::class,'calculateTotalPriceAll'])->name('calculate.total.price');
    Route::post('/saveorder',[CheckOutController::class,'saveOrder'])->name('save.order');
    // Route::get('/postprice',[CheckOutController::class,'calculatePost'])->name('post.price');
});

Route::prefix('/search')->group(function(){
    Route::get('/index',[SearchController::class,'index'])->name('search.index');
    Route::post('/search',[SearchController::class,'search'])->name('search');
    Route::get('search_pro_result',[SearchController::class,'displaySearch'])->name('search.display');

});
Route::prefix('/admin/category')->group(function(){
    Route::get('/index',[AdminCategoryController::class,'index'])->name('admin.category.index')->middleware(['auth','CheckRole']);
    Route::get('/children/{category}',[AdminCategoryController::class,'showChildren'])->name('admin.category.children')->middleware(['auth','CheckRole']);
    Route::get('/create',[AdminCategoryController::class,'create'])->name('admin.category.create')->middleware(['auth','CheckRole']);
    Route::post('/store',[AdminCategoryController::class,'store'])->name('admin.category.store')->middleware(['auth','CheckRole']);
    Route::get('/edit/{category}',[AdminCategoryController::class,'edit'])->name('admin.category.edit')->middleware(['auth','CheckRole']);
    Route::post('/update/{category}',[AdminCategoryController::class,'update'])->name('admin.category.update')->middleware(['auth','CheckRole']);
    Route::get('/destroy',[AdminCategoryController::class,'destroy'])->name('admin.category.destroy')->middleware(['auth','CheckRole']);
});
Route::prefix('/admin/product')->group(function(){
    Route::get('/index',[AdminProductController::class,'index'])->name('admin.product.index')->middleware(['auth','CheckRole']);
    Route::get('/create',[AdminProductController::class,'create'])->name('admin.product.create')->middleware(['auth','CheckRole']);
    Route::post('/store',[AdminProductController::class,'store'])->name('admin.product.store')->middleware(['auth','CheckRole']);
    Route::get('/edit/{product}',[AdminProductController::class,'edit'])->name('admin.product.edit')->middleware(['auth','CheckRole']);
    Route::post('/update/{product}',[AdminProductController::class,'update'])->name('admin.product.update')->middleware(['auth','CheckRole']);
    Route::get('/destroy',[AdminProductController::class,'destroy'])->name('admin.product.destroy')->middleware(['auth','CheckRole']);
})->middleware(['auth','CheckRole']);
Route::prefix('/admin/comment')->group(function(){
    Route::get('/index',[AdminCommentController::class,'index'])->name('admin.comment.index')->middleware(['auth','CheckRole']);
    Route::get('/status/{comment}',[AdminCommentController::class,'setStatus'])->name('admin.comment.status')->middleware(['auth','CheckRole']);
    Route::get('/edit/{comment}',[AdminCommentController::class,'edit'])->name('admin.comment.edit')->middleware(['auth','CheckRole']);
    Route::post('/update/{comment}',[AdminCommentController::class,'update'])->name('admin.comment.update')->middleware(['auth','CheckRole']);
    Route::get('/destroy',[AdminCommentController::class,'destroy'])->name('admin.comment.destroy')->middleware(['auth','CheckRole']);
})->middleware(['auth','CheckRole']);
Route::prefix('/admin/user')->group(function(){
    Route::get('/index',[AdminUserController::class,'index'])->name('admin.user.index')->middleware(['auth','CheckRole']);
    Route::get('/status/{user}',[AdminUserController::class,'setStatus'])->name('admin.user.status')->middleware(['auth','CheckRole']);
    Route::get('/edit/{user}',[AdminUserController::class,'edit'])->name('admin.user.edit')->middleware(['auth','CheckRole']);
    Route::post('/update/{user}',[AdminUserController::class,'update'])->name('admin.user.update')->middleware(['auth','CheckRole']);
    Route::get('/destroy',[AdminUserController::class,'destroy'])->name('admin.user.destroy')->middleware(['auth','CheckRole']);
})->middleware(['auth','CheckRole']);
Route::prefix('/admin/baner')->group(function(){
    Route::get('/index',[AdminBanerController::class,'index'])->name('admin.baner.index')->middleware(['auth','CheckRole']);
    Route::get('/create',[AdminBanerController::class,'create'])->name('admin.baner.create')->middleware(['auth','CheckRole']);
    Route::post('/store',[AdminBanerController::class,'store'])->name('admin.baner.store')->middleware(['auth','CheckRole']);
    Route::get('/edit/{baner}',[AdminBanerController::class,'edit'])->name('admin.baner.edit')->middleware(['auth','CheckRole']);
    Route::post('/update/{baner}',[AdminBanerController::class,'update'])->name('admin.baner.update')->middleware(['auth','CheckRole']);
    Route::get('/destroy',[AdminBanerController::class,'destroy'])->name('admin.baner.destroy')->middleware(['auth','CheckRole']);
})->middleware(['auth','CheckRole']);

Route::prefix('/admin/slider')->group(function(){
    Route::get('/index',[AdminSliderController::class,'index'])->name('admin.slider.index')->middleware(['auth','CheckRole']);
    Route::get('/create/{product}',[AdminSliderController::class,'create'])->name('admin.slider.create')->middleware(['auth','CheckRole']);
    Route::post('/store',[AdminSliderController::class,'store'])->name('admin.slider.store')->middleware(['auth','CheckRole']);
    Route::get('/edit/{slider}',[AdminSliderController::class,'edit'])->name('admin.slider.edit')->middleware(['auth','CheckRole']);
    Route::post('/update/{slider}',[AdminSliderController::class,'update'])->name('admin.slider.update')->middleware(['auth','CheckRole']);
    Route::get('/destroy',[AdminBanerController::class,'destroy'])->name('admin.slider.destroy')->middleware(['auth','CheckRole']);
})->middleware(['auth','CheckRole']);

Route::prefix('/admin/order')->group(function(){
    Route::get('/index',[AdminOrderController::class,'index'])->name('admin.order.index')->middleware(['auth','CheckRole']);
    Route::get('/edit/{order}',[AdminOrderController::class,'edit'])->name('admin.order.edit')->middleware(['auth','CheckRole']);
    Route::get('/showfactor/{order}',[AdminOrderController::class,'showFactor'])->name('show.factor')->middleware(['auth','CheckRole']);
    Route::post('/update/{order}',[AdminOrderController::class,'update'])->name('admin.order.update')->middleware(['auth','CheckRole']);
    Route::get('/destroy',[AdminOrderController::class,'destroy'])->name('admin.order.destroy')->middleware(['auth','CheckRole']);
    Route::get('/getstat',[AdminStatController::class,'getStat'])->name('admin.get.stat')->middleware(['auth','CheckRole']);
    Route::post('/proces-stat',[AdminStatController::class,'processStat'])->name('admin.process.stat')->middleware(['auth','CheckRole']);
    Route::get('/show-stat',[AdminStatController::class,'showStat'])->name('admin.show.stat')->middleware(['auth','CheckRole']);
})->middleware(['auth','CheckRole']);
Route::prefix('/admin/dashboard')->group(function(){
    Route::get('/index',[AdminDashboardController::class,'index'])->name('admin.dashboard.index');
});
Route::get('buy',function(){
    return view('front.checkout.shop');
});
Route::post('shop',[CheckOutController::class,'add_order'])->name('admin.show.stat');
Route::get('order',[CheckOutController::class,'order'])->name('admin.show.stat');


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';