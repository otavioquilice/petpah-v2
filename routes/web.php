<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\OngController;

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
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');


Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('register');

Route::post('/create-register', [RegisteredUserController::class, 'store'])
                ->middleware('guest');


Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest')
                ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest')
                ->name('password.email');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
            ->middleware('auth')
            ->name('logout');



// HOME
Route::get('/',[SiteController::class, 'view_home'])->name('home');


// ONG
Route::get('/ongs',[SiteController::class, 'view_ongs'])->name('ongs');
Route::get('/ongs/cadastro',[OngController::class, 'create'])->name('create.ongs');
Route::post('/ongs/store',[OngController::class, 'store'])->name('store.ongs');

// PRODUTOS
Route::get('/produtos',[SiteController::class, 'view_produtos'])->name('produtos.show');
Route::post('/buscar-produto',[ProdutoController::class, 'buscarProduto'])->name('buscarProduto');


// CARRINHO
Route::get('/carrinho',[SiteController::class, 'view_carrinho'])->name('carrinho');
// Route::get('/carrinho',[SiteController::class, 'tela_carrinho'])->middleware('auth')->name('carrinho');


// PAGAMENTO
Route::post('/pagamento/show',[SiteController::class, 'view_pagamento'])->name('pagamento.show');




// Ajax
Route::post('/ajax/add-produto-carrinho',[CarrinhoController::class, 'ajaxAddCarrinho'])->name('adicionar-produto-caarrinho');
Route::post('/ajax/remove-produto-carrinho',[CarrinhoController::class, 'ajaxRemoveCarrinho'])->name('remover-produto-caarrinho');