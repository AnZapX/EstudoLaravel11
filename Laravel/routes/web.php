<?php

use App\Http\Controllers\Admin\SupportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Models\Support;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', [SiteController::class, 'contact']);

//O name é a nomeação da rota, assim quando for usar em um link por exemplo, é só colocar o que está no name;
Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');

//Apaga
Route::delete('supports/{id}', [SupportController::class, 'destroy'])->name('supports.destroy');
//Atualiza
Route::put('/supports/{id}', [SupportController::class, 'update'])->name('supports.update');
//Editar
Route::get('/supports/{id}/edit', [SupportController::class, 'edit'])->name('supports.edit');
//Criar
Route::get('/supports/create', [SupportController::class, 'create'])->name('supports.create');
//Vizualizar
Route::get('/supports/{id}', [SupportController::class, 'show'])->name('supports.show');
//Guardar
Route::post('/supports', [SupportController::class, 'store'])->name('supports.store'); //aqui é a rota para onde vai o que o formulário tem;