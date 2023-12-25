<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\CompanyController;





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
//TOPページ
Route::get('/',  [WebController::class, 'index'])->name('top');
//会社情報ページ
Route::get('company',  [CompanyController::class, 'index'])->name('company');

//レビューの保存
Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');
//予約の保存
Route::post('reservations', [ReservationController::class, 'store'])->name('reservations.store');


//お気に入り追加
Route::get('restaurants/{restaurant}/favorite', [RestaurantController::class, 'favorite'])->name('restaurants.favorite');
//
Route::post('restaurants/{restaurant}/reservation', [RestaurantController::class, 'reservation'])->name('restaurants.reservation');



Route::controller(UserController::class)->group(function () {
    Route::get('users/mypage', 'mypage')->name('mypage');
    Route::get('users/mypage/edit', 'edit')->name('mypage.edit');
    Route::put('users/mypage', 'update')->name('mypage.update');
    //パスワード変更
    Route::get('users/mypage/password/edit', 'edit_password')->name('mypage.edit_password');
    Route::put('users/mypage/password', 'update_password')->name('mypage.update_password'); 
    //お気に入り管理
    Route::get('users/mypage/favorite', 'favorite')->name('mypage.favorite');
    //予約一覧の表示
    Route::get('users/mypage/reservation/index', 'reservation_index')->name('mypage.reservation_index');
    //退会画面
    Route::delete('users/mypage/delete', 'destroy')->name('mypage.destroy');

});

Route::resource('restaurants',RestaurantController::class)->middleware(['auth','verified']);

Auth::routes(['verify'=>true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


