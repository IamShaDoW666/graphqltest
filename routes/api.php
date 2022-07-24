<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\Post;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/users', UserController::class);
Route::apiResource('/posts', PostController::class);
Route::get('/posts-with-user/{post}', function($post){
    return $post = Post::query()
                    ->with('user')
                    ->findOrFail($post);
});
Route::get('/user-with-posts/{user}', function($user){
    return $user = User::query()
                    ->with('posts')
                    ->findOrFail($user);
});

