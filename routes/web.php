<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [App\Http\Controllers\PagesController::class, 'home'])->name('home');

Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'index']);
Route::resource('/articles', App\Http\Controllers\ArticleController::class, ['only' => ['show', 'index']]);


Route::get('/products', [App\Http\Controllers\PagesController::class, 'products'])->name('products');


Route::get('/about', [App\Http\Controllers\PagesController::class, 'about'])->name('about');

//contact routes
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'show']);
Route::post('/contact/submit', [App\Http\Controllers\ContactController::class, 'contactToAdmin']);
Route::get('/contactSent' , [App\Http\Controllers\ContactController::class, 'contactSent']);

// product routes (user only)
Route::resource('/products', App\Http\Controllers\Admin\ProductController::class, ['only' => ['index', 'show']]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // alle pages dat door een auth moet gaan, steek je hier in 
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index' ]);

    // category routes 

    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'index');
        Route::post('/category', 'store');
        Route::get('/category/create', 'create');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}','update');
    


        Route::get('/category/{category}/delete', 'delete');
    });

    // product routes
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function () {
        Route::get('/products', 'indexAdmin');
        Route::post('/products', 'store');

        Route::get('/products/create', 'create');
        Route::get('/products/{products}/edit', 'edit');
        Route::put('/products/{products}','update');
    

        Route::get('/products/{products}/delete', 'delete');
    });

    // Article route (admin only )
    Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'indexAdmin']);

    // FAQ en FAQ categories 
    Route::controller(App\Http\Controllers\Admin\FAQController::class)->group(function(){
        Route::get('/faqs', 'indexAdmin');

    });

    Route::controller(App\Http\Controllers\Admin\FAQCategoryController::class)->group(function(){
        
        Route::get('/faqcat', 'index');
        Route::get('/faqcat/create', 'index');
        Route::get('/faqcat/edit', 'index');
        Route::get('/faqcat/destroy', 'index');
        Route::post('/faqcat', 'create');
        Route::put('/faqcat', 'edit');
        Route::delete('/faqcat', 'destroy');

    });


    Route::get('/meats', App\Http\Livewire\Admin\Meat\Index::class);
});

Route::controller(App\Http\Controllers\Admin\FAQController::class)->group(function(){
    Route::get('/faqs', 'index');

});

require __DIR__.'/auth.php';
