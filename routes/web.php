<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\FilmesController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'listarFilmes'])->name('filmes.listar');
Route::get('/filmes', [FilmesController::class, 'todosFilmes'])->name('filmes.visualizar');
