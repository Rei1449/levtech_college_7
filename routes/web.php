<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/a', function() {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('posts/{post}', [PostController::class, 'show']);

Route::get('/calendar', [EventController::class, 'show'])->name("show");
Route::post('/calendar/get', [EventController::class, 'get'])->name('get');
Route::post('/calendar/create', [EventController::class, 'create'])->name("create"); // 予定の新規追加
Route::delete('/calendar/delete', [EventController::class, 'delete'])->name("delete");
Route::put('/calendar/update', [EventController::class, 'update'])->name("update");

// Route::get('11111111111111111/{post}', [PostController::class, 'show11111']);

Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    Route::get('/', 'index')->name('index');
    // Route::get('/', function() {
    //     return view('welcome');
    // });
    // Route::post('/posts', 'store')->name('store');
    // Route::get('/posts/create', 'create')->name('create');
    // Route::get('/posts/{post}', 'show')->name('show');
    // Route::put('/posts/{post}', 'update')->name('update');
    // Route::delete('/posts/{post}', 'delete')->name('delete');
    // Route::get('/posts/{post}/edit', 'edit')->name('edit');
});

Route::get('/categories/{category}', [CategoryController::class,'index'])->middleware("auth");

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// web.php

// 以下を追記
Route::put('/calendar/update', [EventController::class, 'update'])->name("update"); // 予定の更新
Route::delete('/calendar/delete', [EventController::class, 'delete'])->name("delete");

require __DIR__.'/auth.php';