<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DailyPostLimitController;
use App\Http\Controllers\Admin\PermissionController;

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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [IndexController::class,'index']);
Route::get('/post/{post}', [IndexController::class,'show'])->name('show');
Route::get('/category/{category}', [IndexController::class,'showcategorywise'])->name('showcategorywise');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:admin'])->name('dashboard');

Route::resource('/posts', PostController::class);


// Route::get('/dashboard', function () {
//     return view('admin.index');
// })->middleware(['auth'])->name('dashboard');

//Admin Group
Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('/admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::post('/roles/{role}/permissions', [RoleController::class, 'assignPermissions'])->name('roles.permissions');
    Route::resource('/roles', RoleController::class);
    Route::resource('/permissions', PermissionController::class);
    Route::resource('/users', UserController::class);
    //Route::get('/categories', [CategoryController::class,'index'])->name('categories.index');

    // Route::get('ajax-book-crud', [DailyPostLimitController::class, 'index']);
    // Route::post('add-update-book', [DailyPostLimitController::class, 'store']);
    // Route::post('edit-book', [DailyPostLimitController::class, 'edit']);
    // Route::post('delete-book', [DailyPostLimitController::class, 'destroy']);


    // Route::get('/dailypostlimits', [DailyPostLimitController::class, 'index'])->name('dailypostlimits.index');
    Route::resource('/dailypostlimits', DailyPostLimitController::class);

    Route::resource('/categories', CategoryController::class);

    //Excel FIle Upload
    Route::get('users/import', [UserController::class,'show'])->name('users.import');
    Route::post('/users/import', [UserController::class,'exstore'])->name('users.exstore');

});




require __DIR__.'/auth.php';
