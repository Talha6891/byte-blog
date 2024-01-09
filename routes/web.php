<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::resource('users', UserController::class);

Auth::routes();

Route::group([
    'middleware' => ['auth', 'verified', 'role:admin'],
    'prefix' => 'admin'
],
    function () {
        Route::get('/dashboard', [HomeController::class, 'index'])->name('home');
        Route::resources([
            'categories' => CategoryController::class,
            'posts' => PostController::class,
            'tags' => TagController::class,
            'roles' => RoleController::class,
        ]);
        //Admin profile
        Route::controller(AdminProfileController::class)->group(function(){
            Route::get('/profile/show','show')->name('profile.show');
            Route::put('/profile/update/{id}', 'update')->name('profile.update');
        });
    });

