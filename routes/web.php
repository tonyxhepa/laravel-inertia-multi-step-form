<?php

use App\Http\Controllers\ProductController;
use App\Http\Livewire\MultiStepForm;
use App\Http\Livewire\ProductCreate;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', ProductCreate::class);

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/first-step', [ProductController::class, 'firstStep'])->name('products.first.step');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
