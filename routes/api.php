<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TarjetaController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\Auth\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('users', [UserController::class,'index']);//
/*>>>>>>>>>>>>>>>>rutas del proyecto para el api proyecto<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/
Route::get('proyecto', [ProyectoController::class,'index']);//Consulta de todos proyectos disponibles
Route::get('proyecto/{id}', [ProyectoController::class, 'show']); //consulta de un proyecto con id
Route::post('proyecto', [ProyectoController::class,'store']);//Guardar un regitro de articulo
Route::put('proyecto/{id}', [ProyectoController::class,'update']);//Actualizar un proyecto
Route::delete('proyecto/{id}',[ProyectoController::class, 'destroy']);
///////////////////////////////////////////////////////////////////////////////////////////
/*>>>>>>>>>>>>>>>>rutas del proyecto para el api tarjeta<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/
Route::get('tarjeta', [TarjetaController::class,'index']);//Consulta de todos proyectos disponibles
Route::get('tarjeta/{id}', [TarjetaController::class, 'show']); //consulta de un proyecto con id
Route::post('tarjeta', [TarjetaController::class,'store']);//Guardar un regitro de articulo
Route::put('tarjeta/{id}', [TarjetaController::class,'update']);//Actualizar un proyecto
Route::delete('tarjeta/{id}',[TarjetaController::class, 'destroy']);
///////////////////////////////////////////////////////////////////////////////////////////
/*>>>>>>>>>>>>>>>>rutas del proyecto para el api usuarios<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/
Route::middleware('auth:sanctum')->get('usuarios', [UserController::class,'index']);//Consulta de todos proyectos disponibles
Route::middleware('auth:sanctum')->get('usuario/{id}', [UserController::class, 'show']); //consulta de un proyecto con id
Route::middleware('auth:sanctum')->post('usuario', [UserController::class,'store']);//Guardar un regitro de articulo
Route::middleware('auth:sanctum')->put('usuario/{id}', [UserController::class,'update']);//Actualizar un proyecto
Route::middleware('auth:sanctum')->delete('usuario/{id}',[UserController::class, 'destroy']);//eliminar usuario
///////////////////////////////////////////////////////////////////////////////////////////
/*>>>>>>>>>>>>>>>>rutas del proyecto para el api solicitudes <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/
Route::middleware('auth:sanctum')->get('solicitud', [SolicitudController::class,'index']);//Consulta de todos proyectos disponibles
Route::middleware('auth:sanctum')->get('solicitud/{id}', [SolicitudController::class, 'show']); //consulta de un proyecto con id
Route::middleware('auth:sanctum')->post('solicitud', [SolicitudController::class,'store']);//Guardar un regitro de articulo
Route::middleware('auth:sanctum')->put('solicitud/{id}', [SolicitudController::class,'update']);//Actualizar un proyecto
Route::middleware('auth:sanctum')->delete('solicitud/{id}',[SolicitudController::class, 'destroy']);
///////////////////////////////////////////////////////////////////////////////////////////
Route::post('login', [AuthController::class,'login']);
Route::post('register', [AuthController::class,'register']);
Route::middleware('auth:sanctum')->post('logout', [AuthController::class,'logout']);
Route::middleware('auth:sanctum')->get('infouser', [AuthController::class,'infoUser']);

//Route::get('users', [UserController::class,'index']);//listado de articulos
//Route::get('articulos/{id}', [ArticulosController::class,'show']);//listado de un articulo
