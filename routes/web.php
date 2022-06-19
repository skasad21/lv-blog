<?php

use App\Http\Controllers\Admin\AdminController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::get('/dashboard', function () {
//     return view('admin.index');
// })->middleware(['auth'])->name('dashboard');

// Admin Group
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
});


// User Group
// Route::middleware(['auth','role:user'])->group(function(){
//     Route::get('/users',[AdminController::class,'index'])->name('admin.index');
// });

require __DIR__.'/auth.php';
