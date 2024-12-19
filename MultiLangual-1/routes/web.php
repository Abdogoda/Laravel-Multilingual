<?php

use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::middleware('setLang')->group(function(){
 Route::resource('products', ProductController::class);
 
 Route::get("change-language/{language}", LanguageController::class)->name("change-language");
});