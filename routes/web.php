<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\ImageController as AdminImageController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\LegalInformationController;
use App\Http\Controllers\PrivacyPolicyController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/articles', [AdminArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{article}/show', [AdminArticleController::class, 'show'])->name('articles.show');

Route::get('/images', [AdminImageController::class, 'index'])->name('images.index');

Route::get('/recherche', [SearchController::class,'search'])->name('search');

Route::get('legal', [LegalInformationController::class, 'index'])->name('legal');
Route::get('policy', [PrivacyPolicyController::class, 'index'])->name('policy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/carts/{id}', [CartController::class, 'destroy'])->name('carts.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('addresses', AddressController::class);
    Route::get('/addresses/edit', [AddressController::class, 'edit'])->name('addresses.edit');
    Route::get('/carts', [CartController::class, 'index'])->name('carts.index');
    Route::post('/carts/store/{article}', [CartController::class, 'store'])->name('carts.store');
    Route::post('/carts/increment/{cart}', [CartController::class, 'increment'])->name('carts.increment');
    Route::post('/carts/decrement/{cart}', [CartController::class, 'decrement'])->name('carts.decrement');

    Route::middleware('admin')->group(function(){
        Route::resource("articles", AdminArticleController::class)->only(['store', 'create', 'edit', 'update', 'destroy']);
        Route::resource("images", AdminImageController::class)->only(['index','store', 'create', 'edit', 'update', 'destroy']);
        Route::get('/images/show', [AdminImageController::class, 'show'])->name('images.show');
    });
});

Route::resource("carts", CartController::class)->only(['create', 'edit', 'update'])
->middleware(['auth', 'verified']);



require __DIR__.'/auth.php';
