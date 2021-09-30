<?php

use App\Http\Controllers\domiciliosController;
use App\Http\Controllers\emailController;
use App\Http\Controllers\formChangeController;
use App\Http\Controllers\formLoginController;
use App\Http\Controllers\formOperadorController;
use App\Http\Controllers\formPedidoController;
use App\Http\Controllers\grafiController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\operadorController;
use App\Http\Controllers\pedidoController;
use App\Mail\email;
use App\Models\Pedido;
use Illuminate\Support\Facades\Mail;
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






Route::post('auth', [formLoginController::class, 'login'])->name('auth1'); 


Route::post('comment', [pedidoController::class, 'comment'])->name('pedido.comment')->middleware('domiciliario');

Route::post('nota', [pedidoController::class, 'asunto'])->name('pedido.asunto')->middleware('domiciliario');

Route::post('editar', [operadorController::class, 'edit'])->name('operador.edit')->middleware('admin');

Route::post('edit-operador', [operadorController::class, 'edit_operador'])->name('edit-operador')->middleware('admin');



Route::get('home-domiciliario', [pedidoController::class, 'home_domiciliario'])->name('pedido.show')->middleware('domiciliario');

Route::get('pedidos', [pedidoController::class, 'ver_pedidos'])->name('domicilio.pedidos')->middleware('domiciliario');


Route::get('pedidos-aplazados', [pedidoController::class, 'pedidos_aplazados'])->name('domicilio.aplazado')->middleware('domiciliario');

Route::get('list-operador', [operadorController::class, 'list'])->name('operador.list')->middleware('admin');


Route::get('list-pedido', [pedidoController::class, 'list'])->name('pedido.list')->middleware('admin');

Route::post('edit', [pedidoController::class, 'edit'])->name('pedido.edit')->middleware('admin');

Route::post('edit-pedido', [pedidoController::class, 'edit_pedido'])->name('edit-pedido')->middleware('admin');




Route::get('pedidos-entregados', [pedidoController::class, 'pedidos_entregados'])->name('domicilio.entregado')->middleware('domiciliario');

Route::get('pedidos-camino', [pedidoController::class, 'pedidos_en_camino'])->name('domicilio.camino')->middleware('domiciliario');

Route::post('login', [loginController::class, 'logout'])->name('logout');

Route::post('cambiar-estado', [pedidoController::class, 'cambiar_estado'])->name('cambiar-estado')->middleware('domiciliario');

Route::post('register1', [formOperadorController::class, 'register'])->name('register1')->middleware('admin');
Route::get('register1', [formOperadorController::class, 'register'])->name('register1')->middleware('admin');

Route::post('register-pedido', [formPedidoController::class, 'registrar'])->name('domicilio')->middleware('admin');
    
Route::get('login', [loginController::class, 'login'])->name('auth.login');

Route::get('register', [loginController::class, 'register'])->name('auth.register');

Route::get('change-password', [loginController::class, 'change'])->name('auth.change');

Route::post('change-password', [formChangeController::class, 'change_password'])->name('change');


Route::get('register-address', [pedidoController::class, 'registrar'])->name('domicilio.registrar')->middleware('admin');


Route::get('grafic-entregados', [grafiController::class, 'viewEntregado'])->name('estadisticas.entregados')->middleware('admin');

Route::post('grafic-entregados', [grafiController::class, 'total_entregados'])->name('entregados')->middleware('admin');


Route::get('grafic-en-camino', [grafiController::class, 'viewCamino'])->name('estadisticas.camino')->middleware('admin');

Route::post('grafic-en-camino', [grafiController::class, 'total_camino'])->name('camino')->middleware('admin');


Route::get('grafic-aplazados', [grafiController::class, 'viewAplazados'])->name('estadisticas.aplazados')->middleware('admin');


Route::post('grafic-aplazados', [grafiController::class, 'total_aplazados'])->name('aplazados')->middleware('admin');

Route::get('grafic-en-procesos', [grafiController::class, 'viewProceso'])->name('estadisticas.proceso')->middleware('admin');

Route::post('grafic-en-proceso', [grafiController::class, 'total_proceso'])->name('proceso')->middleware('admin');



Route::post('domicilios-entregados', [domiciliosController::class, 'domicilios_entregados'])->name('domiciliario.entregados')->middleware('admin');

Route::post('domicilios-en-proceso', [domiciliosController::class, 'domicilios_en_proceso'])->name('domiciliario.proceso')->middleware('admin');

Route::post('domicilios-en-camino', [domiciliosController::class, 'domicilios_en_camino'])->name('domiciliario.caminos')->middleware('admin');


Route::post('domicilios-aplazados', [domiciliosController::class, 'domicilios_aplazados'])->name('domiciliario.aplazados')->middleware('admin');



Route::get('grafic-dias', [grafiController::class, 'viewReporteDia'])->name('estadisticas.reporteDia')->middleware('admin');

Route::post('grafic-dias', [grafiController::class, 'totales_ReporteDia'])->name('reporteDia')->middleware('admin');
