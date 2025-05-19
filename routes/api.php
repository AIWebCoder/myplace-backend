<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MessengerController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\VideoController;
use App\Providers\PostsHelperServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login-api', [LoginController::class, 'loginApi']);
Route::post('/register-api', [LoginController::class, 'registerApi']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/get-post', function ( ) {
        $posts = PostsHelperServiceProvider::getUserPosts(1, false, 1, false, true);
        return $posts;
    });
});
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/posts/save', [PostsController::class, 'savePost']);
});

Route::group(['prefix' => 'attachment', 'as' => 'attachment.'], function () {
    Route::post('/upload/{type}', ['uses' => 'AttachmentController@upload', 'as'   => 'upload']);
});

Route::post('/upload-video', [VideoController::class, 'uploadVideo']);
Route::post('/split-video', [VideoController::class, 'splitVideoBySize']);
Route::middleware('auth:sanctum')->group(function () {
    Route::group(['prefix' => 'my', 'as' => 'my.'], function () {
        Route::group(['prefix' => 'messenger', 'as' => 'messenger.'], function () {
            Route::get('/', [MessengerController::class,'indexApi']);
            Route::get('/fetchMessages/{userID}', [MessengerController::class,'fetchMessages']);
            Route::post('/sendMessage', [MessengerController::class, 'sendMessage']);
        });
    });
});
Route::middleware(['api', 'web'])->group(function () {
    Route::get('/{username}', ['uses' => 'ProfileController@apiIndex', 'as'   => 'profile']);
});