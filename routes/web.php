<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutusController;
use App\Http\Controllers\CasesController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;


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
Route::group(['prefix' => 'admin'], function () {
    Route::post('/add_stocks', [HomeController::class, 'add_stocks'])->name('add_stocks')->middleware('auth');
    Route::get('/stock/delete/{id}', [HomeController::class, 'delete_stock'])->name('delete_stock')->middleware('auth');
    Route::get('/card/input/{id}', [HomeController::class, 'card'])->middleware('auth');
    Voyager::routes();
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about-us', [AboutusController::class, 'index'])->name('about-us');
Route::get('/cases', [CasesController::class, 'index'])->name('cases');
Route::get('/case/{id}', [CasesController::class, 'single_index'])->name('cases.single');
Route::get('/about-qst', [FAQController::class, 'index'])->name('faq');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact');
Route::get('/terms-conditions', [TermsController::class, 'index'])->name('terms');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile')->middleware('auth');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/project-cards', [CasesController::class, 'list_cards']);
Route::post('/project-cards', [CasesController::class, 'list_cards']);
Route::post('/add-cart', [CartController::class, 'store'])->name('cart.store');
Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
