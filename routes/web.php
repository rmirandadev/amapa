<?php
use Illuminate\Support\Facades\Route;

//Gerente
Route::domain('gerente.'.env('SESSION_DOMAIN'))->group(function () {
    Auth::routes();
    Route::middleware(['auth'])->group(base_path('routes/gerente.php'));
});

//Noticia
Route::domain('agencia.'.env('SESSION_DOMAIN'))->group(function () {
    Route::middleware(['web'])->group(base_path('routes/agencia.php'));
});

