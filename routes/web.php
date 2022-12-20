<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\RoleController;

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
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard')->middleware(['auth', 'verified']);

Route::get('/add-product',[ProductController::class,'index'])->name('product.index')->middleware(['auth', 'verified']);
Route::post('/create-product',[ProductController::class,'create'])->name('product.create')->middleware(['auth', 'verified']);
Route::get('/manage-product',[ProductController::class,'manage'])->name('product.manage')->middleware(['auth', 'verified']);
Route::get('/edit-product/{id}',[ProductController::class,'edit'])->name('product.edit')->middleware(['auth', 'verified']);
Route::post('/update-product/{id}',[ProductController::class,'update'])->name('product.update')->middleware(['auth', 'verified']);
Route::get('/delete-product/{id}',[ProductController::class,'delete'])->name('product.delete')->middleware(['auth', 'verified']);

Route::get('/add-role',[RoleController::class,'index'])->name('role.index')->middleware(['auth', 'verified']);
Route::post('/add-create',[RoleController::class,'createRole'])->name('role.create')->middleware(['auth', 'verified']);
Route::get('/add-role-user',[RoleController::class,'usersRole'])->name('assign.users')->middleware(['auth', 'verified']);
Route::post('/assign-role-user',[RoleController::class,'assignRole'])->name('assign.role')->middleware(['auth', 'verified']);
Route::get('/view-manage-role',[RoleController::class,'viewRole'])->name('view.role')->middleware(['auth', 'verified']);
Route::get('/edit-role/{id}/{roleId}',[RoleController::class,'editRole'])->name('role.edit')->middleware(['auth', 'verified']);
Route::post('/update-role/{id}',[RoleController::class,'updateRole'])->name('role.update')->middleware(['auth', 'verified']);
Route::get('/delete-role/{id}',[RoleController::class,'deleteRole'])->name('role.delete')->middleware(['auth', 'verified']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
