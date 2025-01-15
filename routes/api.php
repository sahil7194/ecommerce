<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;



Route::resource("users", UserController::class);
Route::resource("addresses", AddressController::class);
Route::resource('categories',CategoryController::class);
Route::resource("countries", CountryController::class);
Route::resource("states", StateController::class);
Route::resource("vendors", VendorController::class);
Route::resource('products', ProductController::class);
