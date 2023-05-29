<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\MitraController;
use App\Http\Controllers\TransactionHotelController;
use Illuminate\Support\Facades\Artisan;

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
Route::get('/cache', function() {
    Artisan::call('cache:clear');

    dd("cache clear All");
});
Route::get('/', [HomeController::class, 'index']) -> name('home');
Route::get('/package', [PackageController::class, 'index']) -> name('package');
Route::get('/package/detail/{id}', [PackageController::class, 'detail']) -> name('package-detail');
Route::get('/hotel', [ServiceController::class, 'hotel']) -> name('service-hotel');
Route::get('/hotel/detail/{id}', [ServiceController::class, 'show']) -> name('hotel-detail');
Route::get('/checkout-hotel/{id}', [TransactionHotelController::class, 'index']) -> name('checkout-hotel') -> middleware(['auth', 'verified']);
Route::post('/checkout-hotel-create', [TransactionHotelController::class, 'process']) -> name('checkout-hotel-create') -> middleware(['auth', 'verified']);
Route::get('/detail-checkout-hotel/{id}', [TransactionHotelController::class, 'create']) -> name('detail-checkout-hotel') -> middleware(['auth', 'verified']);
Route::get('/checkout-hotel-success/{id}', [TransactionHotelController::class, 'success']) -> name('checkout-hotel-success') -> middleware(['auth', 'verified']);
Route::get('/checkout-hotel-remove/{id}', [TransactionHotelController::class, 'remove']) -> name('checkout-hotel-remove') -> middleware(['auth', 'verified']);
// Route::get('/checkout-hotel/{id}', function($id) {
//         return view('pages.checkout_hotel',[
//             'id' => $id
//         ]);
// });
Route::get('/detail/checkout/{id}', [CheckoutController::class, 'detailcheckout']) -> name('detailcheckout') -> middleware(['auth', 'verified']);
Route::get('/checkout/{id}', [CheckoutController::class, 'index']) -> name('checkout') -> middleware(['auth', 'verified']);
Route::post('/checkout/{id}', [CheckoutController::class, 'process']) -> name('checkout-post') -> middleware(['auth', 'verified']);
Route::post('/checkout/create/{detail_id}', [CheckoutController::class, 'create']) -> name('checkout-create') -> middleware(['auth', 'verified']);
Route::get('/checkout/remove/{detail_id}', [CheckoutController::class, 'remove']) -> name('checkout-remove') -> middleware(['auth', 'verified']);
Route::get('/checkout/confirm/{id}', [CheckoutController::class, 'success']) -> name('checkout-success') -> middleware(['auth', 'verified']);

Route::prefix('admin')
    ->namespace('Admin')
    ->middleware(['auth'])
    ->group(function() {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('hotel', 'HotelController');
        Route::resource('transactionhotel', 'TransactionHotelAdmin');
        Route::resource('galleryhotel', 'GalleryHotelController');
        Route::resource('travel-package', 'TravelPackageController');
        Route::resource('gallery', 'GalleryController');
        Route::resource('transaction', 'TransactionController');
        Route::get('mitra',[MitraController::class,"index"])->name("mitra.index");
        Route::get('mitra/create',[MitraController::class,"create"])->name("mitra.create");
        Route::post('mitra',[MitraController::class,"store"])->name("mitra.store");
        Route::get('mitra/edit/{id}',[MitraController::class,"edit"])->name("mitra.edit");
        Route::post('mitra/update/{id}',[MitraController::class,"update"])->name("mitra.update");
        Route::post('mitra/destroy/{id}',[MitraController::class,"destroy"])->name("mitra.destroy");
    }
);
