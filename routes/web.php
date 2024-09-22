<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Default_index');
});

// Route::get('/search','SearchController@search');

Route::get('/search',[SearchController::class,'search']);

Route::get('user/{status}',[UserController::class,'Faq_for_user'])->name('user_status');
Route::get('/dashboard',[UserController::class,'DataTable_Faq'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/add_edit_faqs/{type}/{id?}',[UserController::class,'Add_Edit_FaqView'])->name('Add_Edit_FaqView');

Route::match(['post', 'put'], '/Faq/{status}/{id?}',[UserController::class,'Add_Faq'])->name('Faq');

// Route::post('/Faq/{status}',[UserController::class,'Add_Faq'])->name('Faq');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
