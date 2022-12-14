<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\governorateController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\SettingController;
use App\Http\Controllers\Api\BloodTypeController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ContactControllrer;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\DonnationController;
use App\Http\Controllers\Api\NotificationSettingController;

;
use App\Models\DonnationRequest;

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

Route::group([''],function(){
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('forget-password', [AuthController::class, 'forgetPassword']);

    Route::get('governorates', [GovernorateController::class, 'index']);
    Route::get('blood-types', [BloodTypeController::class, 'index']);
    Route::get('cities', [CityController::class, 'index']);
    Route::get('setting', [SettingController::class, 'setting']);
    Route::post('password-forget', [AuthController::class, 'forgetPassword']);
    });

Route::middleware('auth:api')->group(function(){
    Route::get('my-profile', [ProfileController::class, 'myProfile']);
    Route::post('edit-profile', [ProfileController::class, 'editProfile']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('contact-us', [ContactControllrer::class, 'contactUs']);
    Route::get('posts', [PostController::class, 'index']);
    Route::get('post-search', [PostController::class, 'searchPosts']);
    Route::get('post/{id}', [PostController::class, 'show']);
    Route::get('post-favorite/{id}', [PostController::class, 'addToFavorite']);
    Route::get('list-favorite', [PostController::class, 'listFavourite']);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('category-posts/{id}', [PostController::class, 'categoryPosts']);
    Route::get('donnation-requests', [DonnationController::class, 'index']);
    Route::post('donnation-request-create', [DonnationController::class, 'add']);
    Route::post('notification-setting', [NotificationSettingController::class, 'notificationSetting']);
});

