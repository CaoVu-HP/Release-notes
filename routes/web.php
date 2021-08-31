<?php

use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VersionController;
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
Route::get('/release', [App\Http\Controllers\HomeController::class, 'index'])->name('release');
Route::get('/detail/{id}', [App\Http\Controllers\HomeController::class, 'detail'])->name('detail');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'get'])->name('home');

Route::get('/departments', [DepartmentController::class, 'index'])->name('departments');
Route::post('/department',[DepartmentController::class, 'store'])->name('storeDepartment');
Route::get('/department/{id}',[DepartmentController::class, 'show'])->name('department.show');
Route::post('updateDepartment',[DepartmentController::class, 'update'])->name('updateDepartment');
Route::get('/deleteDepartment/{id}',[DepartmentController::class, 'destroy'])->name('deleteDepartment');
Route::get('/departments/{id}/detail', [DepartmentController::class, 'detail'])->name('departmentDetail');

Route::get('/versions', [VersionController::class, 'index'])->name('version');
Route::post('/version',[VersionController::class, 'insert'])->name('insertVersion');
Route::get('/{id}',[VersionController::class, 'edit'])->name('editVersion');
Route::post('updateVersion',[VersionController::class, 'update'])->name('updateVersion');
Route::get('/deleteVersion/{id}',[VersionController::class, 'delete'])->name('deleteVersion');




