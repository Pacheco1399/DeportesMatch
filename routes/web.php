<?php

use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ReservaController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::put('perfil', [PerfilController::class, 'actualizar'])->name('perfil.actualizar');
Route::get('ver/perfil', [App\Http\Controllers\PerfilController::class, 'verPerfil'])->name('ver.perfil');
Route::put('estadoActivar', [App\Http\Controllers\AdministradorController::class, 'activar'])->name('activar.actualizar');
Route::put('usuario/ban', [App\Http\Controllers\AdministradorController::class, 'ban'])->name('usuario.ban');
Route::put('estado', [App\Http\Controllers\AdministradorController::class, 'actualizar'])->name('estado.actualizar');
Route::get('comunas', [PerfilController::class, 'getComunas']);
Route::get('administrador', [App\Http\Controllers\AdministradorController::class, 'index'])->middleware('administrador')->name('administrador');
Route::get('moderador', [App\Http\Controllers\ModeradorController::class, 'index'])->middleware('moderador')->name('moderador');
Route::get('usuario', [App\Http\Controllers\UsuarioController::class, 'index'])->middleware('usuario')->name('usuario');
Route::get('ver/usuarios', [App\Http\Controllers\AdministradorController::class, 'verUsuarios'])->middleware('administrador')->name('verUsuarios');
Route::get('editar/perfil', [App\Http\Controllers\PerfilController::class, 'editarPerfil'])->name('editar.perfil');
Route::get('rol/usuario', [App\Http\Controllers\AdministradorController::class, 'cambiarRol'])->name('rol.usuario');
Route::get('crear/usuario', [App\Http\Controllers\AdministradorController::class, 'crearUsuario'])->name('crear.usuario');
Route::post('crear/usuario', [App\Http\controllers\AdministradorController::class, 'almacen'])->name('almacen.usuario');
Route::get('usuario/ver/{usuario}/perfil', [App\Http\controllers\PerfilController::class, 'verPerfilPublico'])->name('usuario.ver.perfil');

///////////////////////////////////////////////////////////////////////////////////////////////////////////
//<------------------------------------Users------------------------------------>

Route::get('usuario/buscar', [App\Http\controllers\UsuarioController::class, 'buscarUsuario'])->name('usuario.buscar');
Route::get('usuario/listar', [App\Http\controllers\UsuarioController::class, 'verUsuario'])->name('usuario.listar');

///////////////////////////////////////////////////////////////////////////////////////////////////////////
//<------------------------------------Equipos------------------------------------>

Route::get('equipos/ver', [App\Http\controllers\EquipoController::class, 'verMisEquipos'])->name('equipos.ver');
Route::get('equipos/buscar', [App\Http\controllers\EquipoController::class, 'buscar'])->name('equipos.buscar');
Route::get('equipos/buscar/team', [App\Http\controllers\EquipoController::class, 'buscarEquipo'])->name('equipos.buscar.team');
Route::get('equipos/ver/team/{equipo}', [App\Http\controllers\EquipoController::class, 'verEquipo'])->name('equipos.ver.team');
Route::get('equipos/crear', [App\Http\controllers\EquipoController::class, 'crearEquipo'])->name('equipos.crear');
Route::post('equipos/almacen', [App\Http\controllers\EquipoController::class, 'almacen'])->name('equipos.almacen');
Route::get('equipos/{equipo}/editar', [App\Http\controllers\EquipoController::class, 'editar'])->middleware('update.equipo')->name('equipos.editar');
Route::post('equipos/update/{equipo}', [App\Http\controllers\EquipoController::class, 'update'])->middleware('update.equipo')->name('equipos.update');
Route::delete('equipos/destruir', [App\Http\controllers\EquipoController::class, 'destruir'])->name('equipos.destruir');
Route::get('equipos/unirse', [App\Http\controllers\EquipoController::class, 'unirse'])->name('equipos.unirse');
Route::delete('equipos/abandonar', [App\Http\controllers\EquipoController::class, 'abandonar'])->name('equipos.abandonar');

///////////////////////////////////////////////////////////////////////////////////////////////////////////
//<------------------------------------Evento------------------------------------>

Route::get('deportes/eventos', [App\Http\Controllers\EventoController::class, 'index'])->name('eventos.index');
Route::put('deportes/eventos/participar', [App\Http\Controllers\EventoController::class, 'participar'])->name('evento.participar');
Route::get('deportes/eventos/crear', [App\Http\Controllers\EventoController::class, 'crear'])->name('eventos.crear');
Route::post('deportes/eventos', [App\Http\Controllers\EventoController::class, 'almacen'])->name('eventos.almacen');
Route::get('deportes/eventos/{evento}/editar', [App\Http\Controllers\EventoController::class, 'editar'])->middleware('update.evento')->name('eventos.editar');
Route::put('deportes/eventos/{evento}', [App\Http\Controllers\EventoController::class, 'update'])->middleware('update.evento')->name('eventos.update');
Route::delete('deportes/eventos', [App\Http\Controllers\EventoController::class, 'destruir'])->name('eventos.destruir');
Route::get('auto-complete-address', [AutoAddressController::class, 'googleAutoAddress']);
Route::get('deportes/eventos/lista', [App\Http\Controllers\EventoController::class, 'lista'])->name('eventos.lista');
Route::get('deportes/eventos/ver', [App\Http\Controllers\EventoController::class, 'ver'])->name('eventos.ver');
Route::get('deportes/eventos/buscar', [App\Http\Controllers\EventoController::class, 'buscar'])->name('eventos.buscar');
Route::get('deportes/eventos/comentar/{evento}', [App\Http\Controllers\EventoController::class, 'comentar'])->name('eventos.comentar');
Route::post('deportes/eventos/comentarios', [App\Http\Controllers\EventoController::class, 'guardar'])->name('eventos.guardar');

Route::get('eventos/ver/evento', [App\Http\Controllers\EventoController::class, 'verEvento'])->name('eventos.ver.evento');


///////////////////////////////////////////////////////////////////////////////////////////////////////////
//<------------------------------------Reservas------------------------------------>

Route::get('reserva/ver', [App\Http\controllers\ReservaController::class, 'verReserva'])->name('reserva.ver');
Route::post('reserva/lista', [App\Http\controllers\ReservaController::class, 'lista'])->name('reserva.lista');
Route::get('reserva/buscar', [App\Http\controllers\ReservaController::class, 'buscar'])->name('reserva.buscar');
Route::get('reserva/crear', [App\Http\controllers\ReservaController::class, 'crearReserva'])->name('reserva.crear');
Route::post('reserva/almacen', [App\Http\controllers\ReservaController::class, 'almacen'])->name('reserva.almacen');
Route::post('/reserva/action', [App\Http\controllers\ReservaController::class, 'action'])->name('reserva.action');
Route::put('reserva/update', [App\Http\Controllers\ReservaController::class, 'update'])->name('reserva.update');
Route::delete('reserva/delete', [App\Http\Controllers\ReservaController::class, 'delete'])->name('reserva.delete');

Route::get('reserva/evento/lista', [App\Http\controllers\ReservaController::class, 'eventoLista'])->name('reserva.evento.lista');



Route::get('full-calender/', [ReservaController::class, 'index'])->name('reserva.index');
Route::get('reserva/buscar/fecha', [ReservaController::class, 'index2'])->name('reserva.index2');
Route::get('reserva/buscar/fecha2', [ReservaController::class, 'index3'])->name('reserva.index3');




///////////////////////////////////////////////////////////////////////////////////////////////////////////
//<------------------------------------Complejos------------------------------------>
Route::get('complejo/ver', [App\Http\controllers\ComplejoController::class, 'verComplejos'])->name('complejo.ver');
Route::post('complejo/lista', [App\Http\controllers\ComplejoController::class, 'lista'])->name('complejo.lista');
Route::get('complejo/buscar', [App\Http\controllers\ComplejoController::class, 'buscar'])->name('complejo.buscar');
Route::get('complejo/crear', [App\Http\controllers\ComplejoController::class, 'crearComplejo'])->name('complejo.crear');
Route::post('complejo/almacen', [App\Http\controllers\ComplejoController::class, 'almacen'])->name('complejo.almacen');


///////////////////////////////////////////////////////////////////////////////////////////////////////////

//<------------------------------------Complejos------------------------------------>

Route::get('cancha/lista', [App\Http\controllers\CanchaController::class, 'lista'])->name('cancha.lista');



///////////////////////////////////////////////////////////////////////////////////////////////////////////
//<------------------------------------Torneos------------------------------------>
Route::get('deportes/torneos', [App\Http\Controllers\TorneoController::class, 'index'])->name('torneos.index');
Route::get('deportes/torneos/crear', [App\Http\Controllers\TorneoController::class, 'crear'])->name('torneos.crear');
Route::get('deportes/torneos/buscar', [App\Http\Controllers\TorneoController::class, 'buscar'])->name('torneos.buscar');
Route::post('deportes/torneos', [App\Http\Controllers\TorneoController::class, 'almacen'])->name('torneos.almacen');
Route::get('deportes/torneos/administrar/{torneo}', [App\Http\Controllers\TorneoController::class, 'administrar'])->name('torneos.administrar');
Route::get('deportes/torneos/lista', [App\Http\Controllers\TorneoController::class, 'lista'])->name('torneos.lista');
Route::get('deportes/torneos/{torneo}/editar', [App\Http\Controllers\TorneoController::class, 'editar'])->name('torneos.editar');
Route::put('deportes/torneos/{torneo}', [App\Http\Controllers\TorneoController::class, 'update'])->name('torneos.update');
Route::delete('deportes/torneos', [App\Http\Controllers\TorneoController::class, 'destruir'])->name('torneos.destruir');
Route::get('deportes/torneos/verTorneo', [App\Http\Controllers\TorneoController::class, 'vertorneo'])->name('torneos.verTorneo');
Route::get('deportes/torneos/torneoPorEquipos', [App\Http\Controllers\TorneoController::class, 'torneoporequipo'])->name('torneos.TorneoPorEquipos');
Route::post('/equiposparticipantes', [App\Http\Controllers\TorneoController::class, 'equiposparticipantes']);
Route::get('deportes/torneos/puntosportorneo/{posicion}', [App\Http\Controllers\TorneoController::class, 'puntosportorneo'])->name('torneos.puntosportorneo');
Route::post('deportes/torneos/puntuacion/{torneo}', [App\Http\Controllers\TorneoController::class, 'guardarpuntuacion'])->name('torneos.guardarpuntuacion');
Route::post('deportes/torneos/agregar/equipo', [App\Http\Controllers\TorneoController::class, 'agregarEquipo'])->name('torneos.agregar.equipo');
Route::get('deportes/torneos/mover/puestos/{posicion}', [App\Http\Controllers\TorneoController::class, 'moverPuesto'])->name('torneos.mover.puesto');
Route::post('deportes/torneos/guardar/puestos/{torneo}', [App\Http\Controllers\TorneoController::class, 'guardarpuesto'])->name('torneos.guardar.puesto');
Route::get('deportes/torneos/guardar/empate/{posicion}', [App\Http\Controllers\TorneoController::class, 'guardarempate'])->name('torneos.guardar.empate');
Route::get('deportes/torneos/buscar/{equipo}', [App\Http\Controllers\TorneoController::class, 'visualizar'])->name('torneos.visualizar');
Route::get('deportes/torneos/unirse', [App\Http\controllers\TorneoController::class, 'unirse'])->name('torneo.unirse');
Route::get('deportes/torneos/verTorneos/{torneo}', [App\Http\controllers\TorneoController::class, 'verTorneos'])->name('torneos.verTorneos');

Auth::routes([
    'verify' => true,
]);

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('homeMod', [App\Http\Controllers\HomeController::class, 'indexMod'])->name('homeMod');
