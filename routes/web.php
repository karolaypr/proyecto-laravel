<?php
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CdController;
use App\Http\Controllers\ContratoController;
use App\Http\Controllers\HrutaController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\PresupuestoController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\PbieneController;
use App\Http\Controllers\PsadplanoController;
use App\Http\Controllers\WgsplanoController;
use App\Http\Controllers\VplanoController;
use App\Http\Controllers\DocumentoController;


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;


Route::get('/', HomeController::class);
Route::get('clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::get('clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
//El método store se encargará de controlar la ruta
Route::post('clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('clientes/{cliente}',[ClienteController::class, 'show'])->name('clientes.show');
Route::get('clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
Route::put('clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
Route::delete('clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

Route::get('cds',[CdController::class, 'index'])->name('cds.index');
Route::get('cds/create',[CdController::class, 'create'])->name('cds.create');
Route::get('contratos',[ContratoController::class, 'index'])->name('contratos.index');
Route::get('contratos/create',[ContratoController::class, 'create'])->name('contratos.create');
Route::get('hrutas', [HrutaController::class, 'index'])->name('hrutas.index');
Route::get('hrutas/create',[HrutaController::class, 'create'])->name('hrutas.create');
Route::get('pagos', [PagoController::class, 'index'])->name('pagos.index');
Route::get('pagos/create',[PagoController::class, 'create'])->name('pagos.create');
Route::get('fichas', [FichaController::class, 'index'])->name('fichas.index');
Route::get('fichas/create',[FichaController::class, 'create'])->name('fichas.create');
Route::get('presupuestos', [PresupuestoController::class, 'index'])->name('presupuestos.index');
Route::get('presupuestos/create',[PresupuestoController::class, 'create'])->name('presupuestos.create');
Route::get('proyectos', [ProyectoController::class, 'index'])->name('proyectos.index');
Route::get('proyectos/create',[ProyectoController::class, 'create'])->name('proyectos.create');
Route::get('fotos', [FotoController::class, 'index'])->name('fotos.index');
Route::get('fotos/create',[FotoController::class, 'create'])->name('fotos.create');
Route::get('pbienes', [PbieneController::class, 'index'])->name('pbienes.index');
Route::get('pbienes/create',[PbieneController::class, 'create'])->name('pbienes.create');
Route::get('psadplanos', [PsadplanoController::class, 'index'])->name('psadplanos.index');
Route::get('psadplanos/create',[PsadplanoController::class, 'create'])->name('psadplanos.create');
Route::get('wgsplanos', [WgsplanoController::class, 'index'])->name('wgsplanos.index');
Route::get('wgsplanos/create',[WgsplanoController::class, 'create'])->name('wgsplanos.create');
Route::get('vplanos', [VplanoController::class, 'index'])->name('vplanos.index');
Route::get('vplanos/create',[VplanoController::class, 'create'])->name('vplanos.create');
Route::get('documentos', [DocumentoController::class, 'index'])->name('documentos.index');
Route::get('documentos/create',[DocumentoController::class, 'create'])->name('documentos.create');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
