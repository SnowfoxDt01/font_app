<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FontController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\HomeController;


route::get('/', function () {
    return view('welcome');
});


route::group([
    'prefix' => 'admin',   
    'as' => 'admin.' 
], 
function (){
/*
|--------------------------------------------------------------------------
| Home route
|-------------------------------------------------------------------------
*/
route::get('/', [HomeController::class, 'index'])->name('index');


/*
|--------------------------------------------------------------------------
| Font routes (chi tiết, dùng {id})
|--------------------------------------------------------------------------
*/
route::group([
    'prefix' => 'fonts',   
    'as' => 'fonts.' 
], function (){
    Route::get('/', [FontController::class, 'index'])->name('index'); // danh sách fonts // form thêm font
    Route::post('/', [FontController::class, 'store'])->name('store'); // lưu font mới
    Route::get('/{id}', [FontController::class, 'show'])->name('show'); // chi tiết font
    Route::get('/{id}/edit', [FontController::class, 'edit'])->name('edit'); // form sửa font
    Route::put('/{id}', [FontController::class, 'update'])->name('update'); // update font
    Route::delete('/{id}', [FontController::class, 'destroy'])->name('destroy'); // xóa font
});
/*
|--------------------------------------------------------------------------
| Category routes (group)
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix' => 'categories',
    'as' => 'categories.',
], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::post('/', [CategoryController::class, 'store'])->name('store');
    Route::get('/{id}', [CategoryController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
    Route::put('/{id}', [CategoryController::class, 'update'])->name('update');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('destroy');
});
/*
|--------------------------------------------------------------------------
| Tag routes (group)
|--------------------------------------------------------------------------
*/
Route::group([
    'prefix' => 'tags',
    'as' => 'tags.',
], function () {
    Route::get('/', [TagController::class, 'index'])->name('index');
    Route::get('/create', [TagController::class, 'create'])->name('create');
    Route::post('/', [TagController::class, 'store'])->name('store');
    Route::get('/{id}', [TagController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [TagController::class, 'edit'])->name('edit');
    Route::put('/{id}', [TagController::class, 'update'])->name('update');
    Route::delete('/{id}', [TagController::class, 'destroy'])->name('destroy');
});

// end route
});
