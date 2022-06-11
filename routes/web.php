<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\App;
use App\Http\Controllers\Admin\ModulController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\HizmetController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\UrunController;
use App\Http\Controllers\Admin\ProjeController;
use App\Http\Controllers\Admin\HaberController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\LangController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ReferansController;
use App\Http\Controllers\Admin\SertifikaController;
use App\Http\Controllers\Admin\SayfaController;
use App\Http\Controllers\Admin\Ajax;
use App\Http\Controllers\Admin\Auth;



// theme
use App\Http\Controllers\AppController;
// use Symfony\Component\HttpKernel\DataCollector\AjaxDataCollector;

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

// theme
Route::get('/',             [AppController::class, 'index']);
Route::get('/hakkimizda',   [AppController::class, 'hakkimizda']);
Route::get('/iletisim',     [AppController::class, 'iletisim']);
Route::get('/hizmetlerimiz',[AppController::class, 'hizmetlerimiz']);
Route::get('/hizmet/{slug}',[AppController::class, 'hizmet_detay']);
Route::get('/referanslar',  [AppController::class, 'referanslar']);
Route::get('/projeler',     [AppController::class, 'projeler']);
Route::get('/proje/{slug}', [AppController::class, 'proje_detay']);
Route::get('/haberler',     [AppController::class, 'haberler']);
Route::get('/haber/{slug}', [AppController::class, 'haber_detay']);
// iletisim formu
Route::post('/iletisim-formu', [AppController::class, 'iletisim_formu']);

// sabit sayfalar
Route::get('{slug}.html', [AppController::class, 'sabit_sayfalar']);
// Dinamik içerik
Route::post("/save-content", [Ajax::class, 'saveContent']);
// Yayımla
Route::get('/yayimla', [Ajax::class, 'yayimla']);

// adminpanel
Route::get('/admin/login', [Auth::class, 'login']);
Route::post('/admin/checkUser', [Auth::class, 'checkUser']);
Route::post('/admin/logout', [Auth::class, 'logout']);


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [App::class, 'index']);

    // image sizes
    Route::get('/{table_name}/image-settings',       [App::class, 'image_size']);
    Route::post('/{table_name}/image-settings/store', [App::class, 'image_size_store']);

    // Hesap
    Route::prefix('hesap')->group( function (){
        Route::get('/', [App::class, 'hesap']);
        Route::post('/store', [App::class, 'store']);
    });

    Route::prefix('modul')->group( function() {
        Route::get('/list',         [ModulController::class, 'index']);
        Route::get('/add',          [ModulController::class, 'add']);
        Route::get('/update/{id}',  [ModulController::class, 'update']);
        Route::post('/store/{id?}', [ModulController::class, 'store']);
        Route::get('/destroy/{id}', [ModulController::class, 'destroy']);
    });

    Route::prefix('slider')->group( function() {
        Route::get('/list',         [SliderController::class, 'index']);
        Route::get('/add',          [SliderController::class, 'add']);
        Route::get('/update/{id}',  [SliderController::class, 'update']);
        Route::post('/store/{id?}', [SliderController::class, 'store']);
        Route::get('/destroy/{id}', [SliderController::class, 'destroy']);
    });
    Route::prefix('menu')->group( function() {
        Route::get('/list',         [MenuController::class, 'index']);
        Route::get('/add',          [MenuController::class, 'add']);
        Route::get('/update/{id}',  [MenuController::class, 'update']);
        Route::post('/store/{id?}', [MenuController::class, 'store']);
        Route::get('/destroy/{id}', [MenuController::class, 'destroy']);
    });
    Route::prefix('kategori')->group( function() {
        Route::get('/list',         [KategoriController::class, 'index']);
        Route::get('/add',          [KategoriController::class, 'add']);
        Route::get('/update/{id}',  [KategoriController::class, 'update']);
        Route::post('/store/{id?}', [KategoriController::class, 'store']);
        Route::get('/destroy/{id}', [KategoriController::class, 'destroy']);
    });
    Route::prefix('urun')->group( function() {
        Route::get('/list',         [UrunController::class, 'index']);
        Route::get('/add',          [UrunController::class, 'add']);
        Route::get('/update/{id}',  [UrunController::class, 'update']);
        Route::post('/store/{id?}', [UrunController::class, 'store']);
        Route::get('/destroy/{id}', [UrunController::class, 'destroy']);
    });
    Route::prefix('hizmet')->group( function() {
        Route::get('/list',         [HizmetController::class, 'index']);
        Route::get('/add',          [HizmetController::class, 'add']);
        Route::get('/update/{id}',  [HizmetController::class, 'update']);
        Route::post('/store/{id?}', [HizmetController::class, 'store']);
        Route::get('/destroy/{id}', [HizmetController::class, 'destroy']);
    });
    Route::prefix('proje')->group( function() {
        Route::get('/list',         [ProjeController::class, 'index']);
        Route::get('/add',          [ProjeController::class, 'add']);
        Route::get('/update/{id}',  [ProjeController::class, 'update']);
        Route::post('/store/{id?}', [ProjeController::class, 'store']);
        Route::get('/destroy/{id}', [ProjeController::class, 'destroy']);
    });
    Route::prefix('haber')->group( function() {
        Route::get('/list',         [HaberController::class, 'index']);
        Route::get('/add',          [HaberController::class, 'add']);
        Route::get('/update/{id}',  [HaberController::class, 'update']);
        Route::post('/store/{id?}', [HaberController::class, 'store']);
        Route::get('/destroy/{id}', [HaberController::class, 'destroy']);
    });
    Route::prefix('referans')->group( function() {
        Route::get('/list',         [ReferansController::class, 'index']);
        Route::post('/store/{id?}', [ReferansController::class, 'store']);
        Route::get('/destroy/{id}', [ReferansController::class, 'destroy']);
    });
    Route::prefix('sertifika')->group( function() {
        Route::get('/list',         [SertifikaController::class, 'index']);
        Route::post('/store/{id?}', [SertifikaController::class, 'store']);
        Route::get('/destroy/{id}', [SertifikaController::class, 'destroy']);
    });
    Route::prefix('sayfa')->group( function() {
        Route::get('/list',         [SayfaController::class, 'index']);
        Route::get('/add',          [SayfaController::class, 'add']);
        Route::get('/update/{id}',  [SayfaController::class, 'update']);
        Route::post('/store/{id?}', [SayfaController::class, 'store']);
        Route::get('/destroy/{id}', [SayfaController::class, 'destroy']);
    });
    Route::prefix('lang')->group( function() {
        Route::get('/list',         [LangController::class, 'index']);
        Route::get('/add',          [LangController::class, 'add']);
        Route::get('/update/{id}',  [LangController::class, 'update']);
        Route::post('/store/{id?}', [LangController::class, 'store']);
        Route::get('/destroy/{id}', [LangController::class, 'destroy']);
    });
    Route::prefix('ayarlar')->group( function() {
        Route::get('/islem',         [SettingsController::class, 'index']);
        Route::post('/store',        [SettingsController::class, 'store']);
    });

    //Ajax
    Route::get('/ajax/deleteGallery/{id}', [Ajax::class, 'deleteGallery']);
    Route::post('/ajax/sortable', [Ajax::class, 'sortable']);
});
