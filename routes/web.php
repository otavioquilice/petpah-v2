<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\CarrinhoController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\OngController;
use App\Http\Controllers\PedidoController;


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

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
            ->middleware('guest')
            ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
            ->middleware('guest')
            ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
            ->middleware('auth')
            ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
            ->middleware(['auth', 'signed', 'throttle:6,1'])
            ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
            ->middleware(['auth', 'throttle:6,1'])
            ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
            ->middleware('auth')
            ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
            ->middleware('auth');



// HOME
Route::get('/',[SiteController::class, 'view_home'])->name('home');


// ONG
Route::get('/ongs',[OngController::class, 'index'])->name('ongs');
Route::get('/ongs/cadastro',[OngController::class, 'create'])->name('create.ongs');
Route::post('/ongs/store',[OngController::class, 'store'])->name('store.ongs');
Route::get('/ongs/aprovacao',[OngController::class, 'aprovarOngs'])->middleware('auth')->name('aprovar.ongs');
Route::post('/ongs/aprovar',[OngController::class, 'aprovarOng'])->middleware('auth')->name('aprovar.ong');

// PRODUTOS
Route::get('/produtos',[ProdutoController::class, 'index'])->name('produtos.show');
Route::post('/buscar-produto',[ProdutoController::class, 'buscarProduto'])->name('buscarProduto');


// CARRINHO
Route::get('/carrinho',[CarrinhoController::class, 'index'])->middleware('auth')->name('carrinho');
// Route::get('/carrinho',[SiteController::class, 'tela_carrinho'])->middleware('auth')->name('carrinho');


// PAGAMENTO
Route::get('/pagamento/show/{uuid}',[PedidoController::class, 'show'])->middleware('auth')->name('pagamento.show');
Route::post('/finalizar/pagamento/{uuid}',[PedidoController::class, 'pagamento'])->middleware('auth')->name('pagamento.finalizar');
Route::get('/pagamento/finalizado/{uuid}',[PedidoController::class, 'pagamento_finalizado'])->middleware('auth')->name('pagamento.finalizado');

// PEDIDO
Route::post('/store/pedido',[PedidoController::class, 'store'])->name('store.pedido');
Route::get('/pedidos/meus-pedidos/{id}',[PedidoController::class, 'meus_pedidos'])->name('meus.pedidos');


// DOAÇOES
Route::get('/doacoes/minhas-doacoes/{id}',[PedidoController::class, 'minhas_doacoes'])->name('minhas.doacoes');
Route::get('/todas-doacoes',[PedidoController::class, 'todas_doacoes'])->name('todas.doacoes');

// Ajax
Route::post('/ajax/add-produto-carrinho',[CarrinhoController::class, 'ajaxAddCarrinho'])->name('adicionar-produto-caarrinho');
Route::post('/ajax/remove-produto-carrinho',[CarrinhoController::class, 'ajaxRemoveCarrinho'])->name('remover-produto-caarrinho');