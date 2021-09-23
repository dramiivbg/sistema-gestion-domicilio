<?php

use App\Http\Controllers\formChangeController;
use App\Http\Controllers\formLoginController;
use App\Http\Controllers\formOperadorController;
use App\Http\Controllers\formPedidoController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\pedidoController;
use App\Models\Pedido;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [homeController::class, 'home'])->name('home');

Route::post('auth1', [formLoginController::class, 'login'])->name('auth1');

Route::get('home-domiciliario', [pedidoController::class, 'home_domiciliario'])->name('pedido.show');

Route::get('pedidos', [pedidoController::class, 'ver_pedidos'])->name('pedido.pedidos');

Route::get('pedidos-entregados', [pedidoController::class, 'pedidos_entregados'])->name('pedido.entregado');

Route::post('login', [loginController::class, 'logout'])->name('logout');

Route::post('cambiar-estado', [pedidoController::class, 'cambiar_estado'])->name('cambiar-estado');

Route::post('register1', [formOperadorController::class, 'register'])->name('register1');

Route::get('register1', [formOperadorController::class, 'register'])->name('register1');

Route::post('register', [formPedidoController::class, 'registrar'])->name('domicilio1');
    
Route::get('login', [loginController::class, 'login'])->name('auth.login');

Route::get('register', [loginController::class, 'register'])->name('auth.register');

Route::get('change-password', [loginController::class, 'change'])->name('auth.change');

Route::post('change-password', [formChangeController::class, 'change_password'])->name('change');








Route::get('register-address', [pedidoController::class, 'registrar'])->name('pedido.registrar');

