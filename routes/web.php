<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\IndexController;

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

    //Excel FIle Upload
    Route::get('users/import', [UserController::class,'show'])->name('users.import');
    Route::post('/users/import', [UserController::class,'exstore'])->name('users.exstore');

});




require __DIR__.'/auth.php';
