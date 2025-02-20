<?php

use App\Http\Controllers\AdministrativeUnitController;
use App\Http\Controllers\DevicesController;
use App\Http\Controllers\ReguardosController;
use App\Http\Controllers\TypeDeviceController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

//DB::listen(function ($query){
//    var_dump($query->sql);
//});

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

Route::get(
    '/',
    function () {
        return view('layouts.inicio');
    }
);

Route::middleware(['auth:sanctum', 'verified'])->resource(
    'empleados',
    UsuariosController::class
)->names('empleados');

//Route::get(
//    '/pdf',
//    function () {
////        $pdf = App::make('dompdf.wrapper');
////        $pdf->loadHTML('<h1>Test</h1>');
//        $pdf = PDF::loadView('reports.asignacion');
//        return view('reports.asignacion');
//        return $pdf->stream();
//    }
//);

Route::middleware(['auth:sanctum', 'verified'])->get(
    '/dashboard',
    function () {
        return view('dashboard');
    }
)->name('dashboard');

//Route::middleware(['auth:sanctum', 'verified'])->get(
//    '/empleados',
//    \App\Http\Livewire\UsersTable::class
//)->name('empleados');

Route::middleware(['auth:sanctum', 'verified'])->resource(
    'empleados',
    UsuariosController::class
)->names('empleados');


Route::middleware(['auth:sanctum', 'verified'])->get(
    '/catalogs',
    function () {
        return view('catalogos');
    }
)->name('catalogs');


Route::middleware(['auth:sanctum', 'verified'])->resource(
    'catalogs/type_devices',
    TypeDeviceController::class
)->names('type_devices');

Route::middleware(['auth:sanctum', 'verified'])->resource(
    'catalogs/administrative_units',
    AdministrativeUnitController::class
)->names('administrative_units');

Route::middleware(['auth:sanctum', 'verified'])->resource(
    'devices',
    DevicesController::class
)->names('devices');

//Route::middleware(['auth:sanctum', 'verified'])->get(
//    'resguardos/create',
//   [ReguardosController::class, 'create']
//)->name('resguardos');

Route::middleware(['auth:sanctum', 'verified'])->resource(
    'resguardos',
    ReguardosController::class
)->names('resguardos')->only(['create', 'store', 'destroy']);


Route::get(
    '/resguardos/acuse/{uuid}',
   [ReguardosController::class, 'reportAsignacion']
)->name('resguardos.acuse');

//Route::middleware(['auth:sanctum', 'verified'])->get(
//    '/resguardos/pdf',
//    [TypeDeviceController::class, 'reportAsignacion']
//)->names('resguardoss');
//Route::middleware(['auth:sanctum', 'verified'])->get(
//    '/empleados',
//    \App\Http\Livewire\UsersTable::class
//)->name('empleados');
