<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\ChildController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Admin\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


    Route::group(['middleware' => 'auth:admin', 'prefix' => 'Admin'], function () {
         Route::get('/',[AdminController::class , 'index'] )->name('Admin');
         Route::get('/logout',[LoginController::class , 'logout'] )->name('admin.logout');
         // ------------------------------Start Users--------------------------------------------

         Route::resource('Users', UserController::class );
         Route::get('Users/GetUsers', [UserController::class, 'GetUsers'])->name('Users.GetUsers');

         // ------------------------------End Users--------------------------------------------


        // ------------------------------Start Children--------------------------------------------

        Route::resource('Children', ChildController::class );
        Route::get('Children/GetChildren', [ChildController::class, 'GetChildren'])->name('Children.GetChildren');

        // ------------------------------End Children--------------------------------------------


        // ------------------------------Start Books--------------------------------------------

        Route::resource('Books', BookController::class );
        Route::get('Books/{id}/status', [BookController::class, 'changeStatus'])->name('Books.changeStatus');
        Route::get('Books/GetBooks', [BookController::class, 'GetBooks'])->name('Books.GetBooks');


        // ------------------------------End Books--------------------------------------------



        // ------------------------------Start Publisher--------------------------------------------

        Route::resource('Publishers', PublisherController::class );
        Route::get('Publishers/GetPublishers', [PublisherController::class, 'GetPublishers'])->name('Publishers.GetPublishers');

        // ------------------------------End Publishers--------------------------------------------


        // ------------------------------Start Admins--------------------------------------------

            Route::get('profile',[AdminController::class , 'profile'] )->name('admin.profile');
            Route::put('profile/{id}',[AdminController::class , 'updateprofile'])->name('admin.update.profile');

        // ------------------------------End Admins--------------------------------------------





    });



Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin', 'prefix' => 'Admin'], function () {

    Route::get('login', [LoginController::class , 'login'])->name('admin.login');
    Route::post('login',[LoginController::class , 'postLogin'])->name('admin.post.login');

});
