<?php


use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\DetailPropertyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SimulasiKprController;
use App\Http\Controllers\LoginController;
use App\Models\DetailProperty;
use App\Http\Controllers\DashboardUnitsController;
use App\Http\Controllers\DashboardProvincesController;
use App\Http\Controllers\DashboardCitiesController;
use App\Http\Controllers\DashboardHomeController;
use App\Http\Controllers\DashboardAmenitiesController;
use App\Http\Controllers\DashboardNearbysController;
use App\Http\Controllers\DashboardGallerysController;
use App\Http\Controllers\DashboardDetailController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardAboutUsController;
use App\Http\Controllers\DashboardContactUsController;
use App\Http\Controllers\DashboardBannersController;
use App\Models\AdminsProperty;
use App\Models\Banner;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {

    $banner = Banner::all();
    $sales = AdminsProperty::all();

    $randomSales = $sales->random();


    return view('index',  compact('randomSales', 'banner'));
})->name('landing');

Route::get('/aboutus', [AboutUsController::class, 'index'])->name('aboutus');
// Route::get('/propertyDetail/{slug}', [DetailPropertyController::class, 'index'])->name('propertyDetail');
Route::get('detail/{slug}', [DetailPropertyController::class, 'index'])->name('propertyDetail');

Route::get('/searchproperty', [SearchController::class, 'index'])->name('search.prop');

Route::get('/SimulasiKpr', [SimulasiKprController::class, 'index'])->name('simulasi.kpr');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'auth']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware('auth');

Route::get('/dashboard/units/checkSlug', [DashboardUnitsController::class,  'checkSlug'])->middleware('auth');
Route::get('/dashboard/provinces/checkSlug', [DashboardProvincesController::class,  'checkSlug'])->middleware('auth');
Route::get('/dashboard/cities/checkSlug', [DashboardCitiesController::class,  'checkSlug'])->middleware('auth');
Route::get('/dashboard/homes/checkSlug', [DashboardHomeController::class,  'checkSlug'])->middleware('auth');


Route::resource('/dashboard/units', DashboardUnitsController::class)->middleware('auth');
Route::resource('/dashboard/provinces', DashboardProvincesController::class)->middleware('auth');
Route::resource('/dashboard/cities', DashboardCitiesController::class)->middleware('auth');
Route::resource('/dashboard/homes', DashboardHomeController::class)->middleware('auth');
Route::resource('/dashboard/amenities', DashboardAmenitiesController::class)->middleware('auth');
Route::resource('/dashboard/nearbys', DashboardNearbysController::class)->middleware('auth');
Route::resource('/dashboard/gallerys', DashboardGallerysController::class)->middleware('auth');
Route::resource('/dashboard/details', DashboardDetailController::class)->middleware('auth');
Route::resource('/dashboard/admins', DashboardAdminController::class)->middleware('auth');
Route::resource('/dashboard/aboutus', DashboardAboutUsController::class)->middleware('auth');
Route::resource('/dashboard/contactus', DashboardContactUsController::class)->middleware('auth');
Route::resource('/dashboard/banners', DashboardBannersController::class)->middleware('auth');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');



//Login Robby Hernowo

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__ . '/auth.php';


//end 