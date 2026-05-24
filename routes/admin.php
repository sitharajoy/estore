<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\admin\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth','adminCheck'])->group(function() {
  Route::prefix('admin')->name('admin.')->group(function(){
    Route::resources([
      'users' => UserController::class,
      'admins' => AdminController::class,
      'categories' => CategoryController::class,
    ]);
  });
});