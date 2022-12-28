<?php
use Illuminate\Support\Facades\Route;
Route::group(['as' => 'agency.'], function(){

    Route::middleware('post_global')->group(function (){
        Route::get('/', [App\Http\Controllers\Agencia\HomeController::class, 'index'])->name('index');
        Route::get('/governo', [App\Http\Controllers\Agencia\GovController::class, 'index'])->name('gov-index');
        Route::get('/governo/{slug}', [App\Http\Controllers\Agencia\GovController::class, 'show'])->name('gov-show');

        Route::get('/noticias', [App\Http\Controllers\Agencia\PostController::class, 'index'])->name('post-index');
        Route::get('/noticia/{slug}', [App\Http\Controllers\Agencia\PostController::class, 'show'])->name('post-show');
        Route::get('/noticias/categoria/{slug}', [App\Http\Controllers\Agencia\PostController::class, 'category'])->name('post-category');
        Route::get('/noticias/categoria/{slug_category}/subcategoria/{slug_subcategory}', [App\Http\Controllers\Agencia\PostController::class, 'subcategory'])->name('post-subcategory');
    });

    Route::get('/eventos', [App\Http\Controllers\Agencia\EventController::class, 'index'])->name('event-index');
    Route::get('/eventos/{slug}', [App\Http\Controllers\Agencia\EventController::class, 'show'])->name('event-show');

    Route::get('/videos', [App\Http\Controllers\Agencia\VideoController::class, 'index'])->name('video-index');

    Route::get('/conheca-o-amapa/{slug}', [App\Http\Controllers\Agencia\TourismController::class, 'show'])->name('tourism-show');
});
