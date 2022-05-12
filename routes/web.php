<?php

use App\Http\Controllers\ServiceController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PortfolioController;
use App\Models\Multipic;
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
    $homeabout = DB::table('home_abouts')->first();
    $images = Multipic::all();
    $services = DB::table('services')->get();
    return view('home', compact('brands', 'homeabout', 'services', 'images'));
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
Route::post('/brand/update/{id}', [BrandController::class, 'Update'])->name('update.brand');
Route::get('/brand/delete/{id}', [BrandController::class, 'Delete'])->name('delete.brand');
Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');

//Multi Image
Route::get('/multi/image', [BrandController::class, 'MultiImage'])->name('multi.image');
Route::post('/multi/add', [BrandController::class, 'StoreImage'])->name('store.image');


//Admin All Route
Route::get('/home/slider', [HomeController::class, 'HomeSlider'])->name('home.slider');
Route::get('/add/slider', [HomeController::class, 'AddSlider'])->name('add.slider');
Route::post('/store/slider', [HomeController::class, 'StoreSlider'])->name('store.slider');
Route::get('/edit/slider/{id}', [HomeController::class, 'EditSlider'])->name('edit.slider');
Route::post('/update/slider/{id}', [HomeController::class, 'UpdateSlider'])->name('update.slider');
Route::get('/delete/slider/{id}', [HomeController::class, 'DeleteSlider'])->name('delete.slider');

//Home About All Routes
Route::get('/home/about', [AboutController::class, 'HomeAbout'])->name('home.about');
Route::get('/add/about', [AboutController::class, 'AddAbout'])->name('add.about');
Route::post('/store/about', [AboutController::class, 'StoreAbout'])->name('store.about');
Route::get('/edit/about/{id}', [AboutController::class, 'EditAbout'])->name('edit.about');
Route::post('/update/about/{id}', [AboutController::class, 'UpdateAbout'])->name('update.about');
Route::get('/delete/about/{id}', [AboutController::class, 'DeleteAbout'])->name('delete.about');

//Services All Routes
Route::get('/home/service', [ServiceController::class, 'HomeService'])->name('home.service');
Route::get('/add/service', [ServiceController::class, 'AddService'])->name('add.service');
Route::post('/store/service', [ServiceController::class, 'StoreService'])->name('store.service');
Route::get('/edit/service/{id}', [ServiceController::class, 'EditService'])->name('edit.service');
Route::post('/update/service/{id}', [ServiceController::class, 'UpdateService'])->name('update.service');
Route::get('/delete/service/{id}', [ServiceController::class, 'DeleteService'])->name('delete.service');

//Portfolio Route
Route::get('/portfolio', [PortfolioController::class, 'Portfolio'])->name('portfolio');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //    $users = User::all();
    //    $users = DB::table('users')->get();
    return view('admin.index');
})->name('dashboard');
