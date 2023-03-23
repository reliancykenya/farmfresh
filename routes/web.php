<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CropController;
use App\Http\Controllers\FaunaController;
use App\Http\Controllers\OptionController;
use App\Models\Animal;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::middleware('auth')->group(function(){
    Route::get('/admin',[AdminController::class,'index'])->name('admin.index');  
});




Auth::routes();

Route::post('/option',[OptionController::class,'chooseOption'])->name('option');

// fauna
Route::get('/option/fauna/index',[FaunaController::class,'index'])->name('fauna.index');
// Route::get('/option/flora/index',[FloraController::class,'index'])->name('flora.index');



// home routes
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('home.about');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('home.contact');
Route::get('/product', [App\Http\Controllers\HomeController::class, 'product'])->name('home.product');



// category controller
Route::post('/category',[CategoryController::class,'chooseCategory'])->name('category');




// category routes
Route::get('/category/crop/create',[CropController::class,'create'])->name('crop.create');
Route::post('/category/crop/create',[CropController::class,'store'])->name('crop.store');
Route::get('/category/crops',[CropController::class,'index'])->name('crop.index');

Route::post('/category/crop/{id}',[CropController::class,'destroy'])->name('crop.destroy');

Route::get('/category/crop/{id}/edit',[CropController::class,'edit'])->name('crop.edit');
Route::put('/category/crop/{id}/edit',[CropController::class,'update'])->name('crop.update');

// animal controller
Route::get('/category/animal/create',[AnimalController::class,'create'])->name('animal.create');
Route::delete('/category/animal/{id}',[AnimalController::class,'destroy'])->name('animal.destroy');

Route::get('/category/animal/create',[AnimalController::class,'create'])->name('animal.create');
Route::post('/category/animal/create',[AnimalController::class,'store'])->name('animal.store');
Route::get('/category/animal/index',[AnimalController::class,'index'])->name('animal.index');

Route::get('/category/animal/{id}/edit',[AnimalController::class,'edit'])->name('animal.edit');
Route::put('/category/animal/{id}',[AnimalController::class,'update'])->name('animal.update');



// blog routes
Route::get('/blog',[BlogController::class,'create'])->name('blog.create');
Route::post('/blog',[BlogController::class,'store'])->name('blog.store');


Route::get('/blog/index',[BlogController::class,'index'])->name('blog.index');

Route::delete('/blog/{blog}',[BlogController::class,'destroy'])->name('blog.destroy');

Route::get('/blog/{blog}/edit',[BlogController::class,'edit'])->name('blog.edit');
Route::put('/blog/{blog}',[BlogController::class,'update'])->name('blog.update');


Route::group(['middleware' => ['auth']], function() {
   
    /**
    * Verification Routes
    */
    Route::get('/email/verify', 'VerificationController@show')->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify')->middleware(['signed']);
    Route::post('/email/resend', 'VerificationController@resend')->name('verification.resend');
   
});

//only authenticated can access this group
Route::group(['middleware' => ['auth']], function() {
    //only verified account can access with this group
    Route::group(['middleware' => ['verified']], function() {
            /**
             * Dashboard Routes
             */
            Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
    });
});