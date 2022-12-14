<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\GovernorateController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ContactsController;
use App\Http\Controllers\Admin\DonnationRequestController;
use App\Http\Controllers\Admin\BloodTypeController;
use App\Http\Controllers\Web\AuthController;
use Illuminate\Support\Facades\Route;

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
Route::get('admin/', [AdminController::class, 'login'])->name('admin.login');
Route::post('admin/handlelogin', [AdminController::class, 'handleLogin'])->name('admin.handlelogin');

Route::middleware('auth:admin')->prefix('admin/')->group(function(){
Route::get('index', [AdminController::class, 'index'])->name('admin.index');
//Client Routes
Route::resource('clients', ClientController::class);
//Governorate routes
Route::resource('governorates', GovernorateController::class);
//Cities routes
Route::resource('cities', CityController::class);
//Categories routes
Route::resource('categories', CategoryController::class);
//Posts routes
Route::resource('posts', PostController::class);
//contacts routes
Route::resource('contacts', ContactsController::class);
//donnations routes
Route::resource('donnationRequests', DonnationRequestController::class);
Route::resource('bloodTypes', BloodTypeController::class);
//settings routes
Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
Route::post('settings/{id}', [SettingController::class, 'update'])->name('settings.update');
//users routes
Route::resource('users', UserController::class);
//roles routes
Route::resource('roles', RoleController::class);
});


Route::get('/', [AuthController::class, 'index'])->name('index');
Route::get('/login', [AuthController::class, 'login'])->name('client.login');
Route::post('/handleLogin', [AuthController::class, 'handleLogin'])->name('client.handleLogin');
Route::get('/register', [AuthController::class, 'register'])->name('client.register');

Route::middleware('auth:client')->prefix('/')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout'])->name('client.logout');
    Route::get('/donnationRequests', [AuthController::class, 'index'])->name('client.donnationRequests');
});
