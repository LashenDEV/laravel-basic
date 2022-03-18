<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\User;

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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    $brands = DB::table('brands')->get();
    return view('home', compact('brands'));
});

Route::get('/home', function () {
    echo "This is the home page";
});

Route::get('/about', function () {
    return view('about');
});


Route::get('/contactfafdfaff-fdsfaf-fafd', [ContactController::class, 'index'])->name('cont');

Route::get('/category/all', [CategoryController::class, 'allCat'])->name('all.category');
Route::post('/category/add', [CategoryController::class, 'addCat'])->name('store.category');
Route::get('/category/edit/{id}', [CategoryController::class, 'Edit'])->name('edit.category');
Route::post('/category/update/{id}', [CategoryController::class, 'Update'])->name('update.category');
Route::get('softdelete/category/{id}', [CategoryController::class, 'SoftDelete'])->name('softdelete.category');
Route::get('restore/category/{id}', [CategoryController::class, 'Restore'])->name('restore.category');
Route::get('pdelete/category/{id}', [CategoryController::class, 'PDelete'])->name('pdelete.category');

//Brands
Route::get('/brand/all', [BrandController::class, 'allBrand'])->name('all.brand');
Route::post('/brand/add', [BrandController::class, 'StoreBrand'])->name('store.brand');
Route::get('/brand/edit/{id}', [BrandController::class, 'Edit'])->name('edit.brand');
Route::get('/brand/delete/{id}', [BrandController::class, 'Delete'])->name('delete.brand');
Route::post('/brand/update/{id}', [BrandController::class, 'Update'])->name('update.brand');
Route::post('/brand/delete/{id}', [BrandController::class, 'Delete'])->name('delete.brand');
Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');

//Multi Image
Route::get('/multi/image', [BrandController::class, 'MultiImage'])->name('multi.image');
Route::post('/multi/add', [BrandController::class, 'StoreImage'])->name('store.image');


//Admin All Route
Route::get('/home/slider', [HomeController::class, 'HomeSlider'])->name('home.slider');
Route::get('/add/slider', [HomeController::class, 'AddSlider'])->name('add.slider');
Route::post('/store/slider', [HomeController::class, 'StoreSlider'])->name('store.slider');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    $users = User::all();
//    $users = DB::table('users')->get();
    return view('admin.index');
})->name('dashboard');
