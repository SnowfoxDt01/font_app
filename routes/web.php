<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FontController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PreviewEditorController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\ShowcaseController;
use App\Http\Controllers\Admin\PreviewNameController;


Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'admin',
    'as' => 'admin.'
], function () {
    
    // Preview Name
    Route::group([
        'prefix' => 'preview-name',
        'as' => 'preview-name.'
    ], function () {
        Route::get('/', [PreviewNameController::class, 'index'])->name('index');
    });

    // trưng bày
    Route::group([
        'prefix' => 'showcase',
        'as' => 'showcase.'
    ], function () {
        Route::get('/', [ShowcaseController::class, 'index'])->name('index');
    });

    // hình ảnh
    Route::group([
        'prefix' => 'image',
        'as' => 'image.'
    ], function () {
        Route::get('/', [ImageController::class, 'index'])->name('index');
    });

    // Preview Editor
    Route::group([
        'prefix' => 'preview',
        'as' => 'preview.'
    ], function () {
        Route::get('/', [PreviewEditorController::class, 'index'])->name('index');
    });

    // Home
    Route::get('/dashboard', [HomeController::class, 'index'])->name('index');

    // Fonts
    Route::group([
        'prefix' => 'fonts',
        'as' => 'fonts.'
    ], function () {
        Route::get('/', [FontController::class, 'index'])->name('index');
        Route::post('/', [FontController::class, 'store'])->name('store');
        Route::delete('/{id}', [FontController::class, 'destroy'])->name('destroy');
    });

    // Categories
    Route::group([
        'prefix' => 'categories',
        'as' => 'categories.'
    ], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/create', [CategoryController::class, 'create'])->name('create');
        Route::post('/', [CategoryController::class, 'store'])->name('store');
        Route::get('/{id}', [CategoryController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
        Route::put('/{id}', [CategoryController::class, 'update'])->name('update');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('destroy');
    });

    // Tags
    Route::group([
        'prefix' => 'tags',
        'as' => 'tags.'
    ], function () {
        Route::get('/', [TagController::class, 'index'])->name('index');
        Route::get('/create', [TagController::class, 'create'])->name('create');
        Route::post('/', [TagController::class, 'store'])->name('store');
        Route::get('/{id}', [TagController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [TagController::class, 'edit'])->name('edit');
        Route::put('/{id}', [TagController::class, 'update'])->name('update');
        Route::delete('/{id}', [TagController::class, 'destroy'])->name('destroy');
    });
});
