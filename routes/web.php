<?php

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
Route::middleware('auth')->group(function() {

    Route::get('teachers/index', [\App\Http\Controllers\TeacherController::class, 'index'])->name('teachers.index');
    Route::get('teachers/{id}/edit/',[\App\Http\Controllers\TeacherController::class,'edit'])->name('teachers.edit');

    Route::get('teachers/create',[\App\Http\Controllers\TeacherController::class,'create'])->name('teachers.create');
    Route::post('teachers/store',[\App\Http\Controllers\TeacherController::class,'store'])->name('teachers.store');

    Route::put('teachers/{id}/update/',[\App\Http\Controllers\TeacherController::class,'update'])->name('teachers.update');
    Route::get('teachers/{id}/delete/',[\App\Http\Controllers\TeacherController::class,'destroy'])->name('teachers.destroy');


    Route::get('departments/index', [\App\Http\Controllers\DepartmentController::class, 'index'])->name('departments.index');
    Route::get('departments/{id}/edit/',[\App\Http\Controllers\DepartmentController::class,'edit'])->name('departments.edit');
    Route::get('departments/{id}/show/',[\App\Http\Controllers\DepartmentController::class,'show'])->name('departments.show');

    Route::get('departments/create',[\App\Http\Controllers\DepartmentController::class,'create'])->name('departments.create');
    Route::post('departments/store',[\App\Http\Controllers\DepartmentController::class,'store'])->name('departments.store');

    Route::put('departments/{id}/update/',[\App\Http\Controllers\DepartmentController::class,'update'])->name('departments.update');
    Route::get('departments/{id}/delete/',[\App\Http\Controllers\DepartmentController::class,'destroy'])->name('departments.destroy');



    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


});

Auth::routes();
