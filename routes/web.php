<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\OrdenController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PlatoControler;
use App\Http\Controllers\DetalleOrdenController;

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

// Routes Login
Route::get('/',[LoginController::class,'index'])->name('login');
Route::post('identificacion',[LoginController::class,'verificalogin'])->name('identificacion');
Route::get('profile/',[LoginController::class,'profile'])->name('profile');
Route::get('salir/',[LoginController::class,'logout'])->name('logout');

//Route Dashboard
Route::get('dashboard',[LoginController::class,'dashboard'])->name('dashboard');

//Route Users
Route::resource('users',UserController::class)->names('users');
Route::post('create/',[UserController::class,'create']);
Route::get('cancelarusuario/',function(){return redirect()->route('users.index')->with('datos','Accion Cancelada.');})->name('cancelaru');

//Route Mesas
Route::resource('mesa',MesaController::class)->names('mesa');

//Route Clientes
Route::resource('cliente',ClienteController::class)->names('cliente');

Route::get('cancelarc/',function(){return redirect()->route('cliente.index')->with('datos','Accion Cancelada.');})->name('cancelarc');


//Route Platos
Route::resource('plato',PlatoControler::class)->names('plato');
Route::get('cancelar',function(){
    return redirect()->route('plato.index')->with('datos','Accion cancelada ...');
})->name('cancelar');
Route::get('plato/{id}/confirmar',[PlatoControler::class,'confirmar'])->name('plato.confirmar');
Route::get('entrada',[PlatoControler::class,'entrada'])->name('entradas');
Route::get('principal',[PlatoControler::class,'principal'])->name('principal');
Route::get('postre',[PlatoControler::class,'postre'])->name('postre');
Route::get('bebida',[PlatoControler::class,'bebida'])->name('bebida');

//Route Pedidos
Route::resource('pedidos',PedidoController::class)->names('pedidos');
Route::get('pagar/{id}',[PedidoController::class,'pagar'])->name('pedidos.pagar');
Route::get('cancelarped',function(){
    return redirect()->route('pedidos.index')->with('datos','Accion cancelada ...');
})->name('cancelarped');
Route::get('pdf',[PedidoController::class,'pdf'])->name('reporte.pdf');
Route::get('pedidos/historial',[PedidoController::class,'show'])->name('pedidos.historial');

// Ruta Cocina
Route::get('ordenes/',[OrdenController::class,'index'])->name('ordenes.index');
Route::get('create/',[OrdenController::class,'create'])->name('ordenes.create');
Route::post('crearorden/',[OrdenController::class,'store'])->name('ordenes.grabar');

Route::get('cancelaro/',function(){return redirect()->route('ordenes.index')->with('datos','Accion Cancelada.');})->name('cancelaro');

Route::get('dordenes/{idorden}',[DetalleOrdenController::class,'index'])->name('ordendetalle.index');
Route::get('dcreate/{idorden}',[DetalleOrdenController::class,'create'])->name('ordendetalle.create');
Route::post('creardorden/{idorden}',[DetalleOrdenController::class,'store'])->name('ordendetalle.grabar');

Route::get('cancelardo/',function(){return redirect()->route('ordendetalle.index',)->with('datos','Accion Cancelada.');})->name('cancelardo');

