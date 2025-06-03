<?php

use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MessengerController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VideoController;
use App\Model\Post;
use App\Providers\PostsHelperServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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

Route::get('/fetch-all-post', function () {
    return response()->json(
        \App\Model\Post::with(['comments', 'reactions', 'bookmarks', 'attachments'])->get()
    );
});

Route::post('/upload-video', [VideoController::class, 'uploadVideo']);
Route::post('/split-video', [VideoController::class, 'splitVideoBySize']);

// Authenticated Routes (Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    
    // Post related routes
    Route::get('/get-post', function (Request $request) {
        return PostsHelperServiceProvider::getUserPosts($request->user()->id, false, 1, false, true);
    });

    Route::post('/posts/save', [PostsController::class, 'savePost']);
    Route::post('/attachment/upload/{type}', [AttachmentController::class, 'upload']);

    // Messenger routes
    Route::prefix('my/messenger')->as('my.messenger.')->group(function () {
        Route::get('/', [MessengerController::class, 'indexApi']);
        Route::get('/fetchMessages/{userID}', [MessengerController::class, 'fetchMessages']);
        Route::post('/sendMessage', [MessengerController::class, 'sendMessage']);
    });

    // Authenticated + Web middleware (for feed-style post fetching)
    Route::middleware('web')->get('/get-all-post', function (Request $request) {
        $startPage = PostsHelperServiceProvider::getFeedStartPage(
            PostsHelperServiceProvider::getPrevPage($request)
        );
        return PostsHelperServiceProvider::getFeedPosts($request->user()->id, false, $startPage);
    });
});

// Public Profile Route with `api` + `web` middleware
Route::middleware(['api', 'web'])->get('/{username}', [ProfileController::class, 'apiIndex'])->name('profile');