<?php
use Illuminate\Support\Facades\Route;
Route::get('/', [App\Http\Controllers\Gerente\DashboardController::class, 'index'])->name('home')->middleware('auth');

//Admin
Route::resource('user',\App\Http\Controllers\Gerente\UserController::class)->middleware('role:Administrador');
Route::resource('profile',\App\Http\Controllers\Gerente\ProfileController::class)->middleware('role:Administrador');

//Dashboard
Route::resource('banner',\App\Http\Controllers\Gerente\BannerController::class)->middleware('role:Administrador|Editor');
Route::resource('tourism',\App\Http\Controllers\Gerente\TourismController::class)->middleware('role:Administrador|Editor');
Route::resource('program',\App\Http\Controllers\Gerente\ProgramController::class)->middleware('role:Administrador|Editor');
Route::resource('structure',\App\Http\Controllers\Gerente\StructureController::class)->middleware('role:Administrador|Editor');
Route::resource('social',\App\Http\Controllers\Gerente\SocialController::class)->middleware('role:Administrador|Editor');
Route::resource('video',\App\Http\Controllers\Gerente\VideoController::class)->middleware('role:Administrador|Editor');
Route::resource('company',\App\Http\Controllers\Gerente\CompanyController::class)->middleware('role:Administrador|Editor');
Route::resource('event',\App\Http\Controllers\Gerente\EventController::class)->middleware('role:Administrador|Editor');
Route::resource('utility',\App\Http\Controllers\Gerente\UtilityController::class)->middleware('role:Administrador|Editor');
Route::resource('category',\App\Http\Controllers\Gerente\CategoryController::class)->middleware('role:Administrador|Editor');
Route::resource('subcategory',\App\Http\Controllers\Gerente\SubcategoryController::class)->middleware('role:Administrador|Editor');
Route::resource('communication',\App\Http\Controllers\Gerente\CommunicationController::class,['only' => ['show','edit', 'update']])->middleware('role:Administrador|Assessor');
Route::resource('plataform',\App\Http\Controllers\Gerente\PlataformController::class)->middleware('role:Administrador|Editor');
Route::resource('local',\App\Http\Controllers\Gerente\LocalController::class)->middleware('role:Administrador|Editor');
Route::resource('ads',\App\Http\Controllers\Gerente\AdsController::class)->middleware('role:Administrador|Editor');
Route::resource('post',\App\Http\Controllers\Gerente\PostController::class)->middleware('role:Administrador|Editor|Assessor');
Route::get('get-ads-local/{id}',[\App\Http\Controllers\Gerente\AdsController::class,'getAdsLocal'])->name('get-ads-local')->middleware('role:Administrador|Editor');
Route::get('get-subcategory/{id}',[\App\Http\Controllers\Gerente\PostController::class,'getSubcategory'])->name('get-subcategory')->middleware('role:Administrador|Editor');
