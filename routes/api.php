<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookController;
use App\Http\Middleware\APIMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

    Route::post('registerUser', [AuthController::class, 'registerUser'])->name('api.registerUser');
    Route::post('registerPublisher', [AuthController::class, 'registerPublisher'])->name('api.registerPublisher');
    Route::post('login', [AuthController::class, 'login'])->name('api.login');

Route::middleware(['auth:sanctum'])->group(function (){ //,'my_auth'
    Route::get('profile', [AuthController::class, 'profile'])->name('profile');
    Route::get('profile_publisher', [AuthController::class, 'profile_publisher'])->name('profile_publisher');

    Route::get('books', [BookController::class, 'index'])->name('books.index');
    Route::get('books/{id}', [BookController::class, 'show'])->name('books.show');
    Route::get('MyBooks', [BookController::class, 'MyBooks'])->name('books.MyBooks');
    Route::post('UploadBook', [BookController::class, 'UploadBook'])->name('books.UploadBook');
    Route::post('AddBook', [BookController::class, 'AddBook'])->name('books.AddBook');
    Route::get('ShowBooksForUser/{id}', [BookController::class, 'ShowBooksForUser'])->name('User.ShowBooksForUser');


});
