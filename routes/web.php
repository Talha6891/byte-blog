<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublicController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('post-show/{slug}', [PublicController::class, 'showPost'])->name('post.show');

Auth::routes();

Route::group([
    'middleware' => ['auth', 'verified', 'role:admin'],
    'prefix' => 'admin'
],
    function () {

        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::resources([
            'users' => UserController::class,
            'categories' => CategoryController::class,
            'posts' => PostController::class,
            'tags' => TagController::class,
            'roles' => RoleController::class,
        ]);

        // Admin profile
        Route::prefix('/profile')->name('profile.')->group(function () {
            Route::get('/show', [AdminProfileController::class, 'show'])->name('show');
            Route::put('/update/{id}', [AdminProfileController::class, 'update'])->name('update');
        });
    });


