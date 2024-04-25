<?php

use App\Events\NewOrder;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\ChildController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Admin\UserController;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\HomeController;

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


Auth::routes();
Route::group(['middleware' => 'auth'], function () {
 Route::get('/', function() {
    return "True";
 })->name('home');
});




//Route::get('Users/GetUsers', [UserController::class, 'GetUsers'])->name('Users.GetUsers');
//Route::get('Children/GetChildren', [ChildController::class, 'GetChildren'])->name('Children.GetChildren');
//Route::get('Books/GetBooks', [BookController::class, 'GetBooks'])->name('Books.GetBooks');
//Route::get('Publishers/GetPublishers', [PublisherController::class, 'GetPublishers'])->name('Publishers.GetPublishers');

