<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::middleware(['auth'])->group(function () {

    // Comercial
    // Admin
	// Permission
	Route::get('permissions', 'Admin\Comercial\PermissionController@index')->name('permissions.index')
        ->middleware('permission:permissions.index');
    Route::post('permissions/store', 'Admin\Comercial\PermissionController@store')->name('permissions.store')
        ->middleware('permission:permissions.store');
    Route::put('permissions/{permission}', 'Admin\Comercial\PermissionController@update')->name('permissions.update')
        ->middleware('permission:permissions.update');
    Route::delete('permissions/{permission}', 'Admin\Comercial\PermissionController@destroy')->name('permissions.destroy')
        ->middleware('permission:permissions.destroy');

	// Role
	Route::get('roles', 'Admin\Comercial\RoleController@index')->name('roles.index')
        ->middleware('permission:roles.index');
    Route::post('roles/store', 'Admin\Comercial\RoleController@store')->name('roles.store')
        ->middleware('permission:roles.store');
    Route::put('roles/{role}', 'Admin\Comercial\RoleController@update')->name('roles.update')
        ->middleware('permission:roles.update');
    Route::delete('roles/{role}', 'Admin\Comercial\RoleController@destroy')->name('roles.destroy')
        ->middleware('permission:roles.destroy');

    // City
    Route::get('cities', 'Admin\Comercial\CityController@index')->name('cities.index')
        ->middleware('permission:cities.index');
    Route::post('cities/store', 'Admin\Comercial\CityController@store')->name('cities.store')
        ->middleware('permission:cities.store');
    Route::put('cities/{city}', 'Admin\Comercial\CityController@update')->name('cities.update')
        ->middleware('permission:cities.update');
    Route::delete('cities/{city}', 'Admin\Comercial\CityController@destroy')->name('cities.destroy')
        ->middleware('permission:cities.destroy');

    // Agency
    Route::get('agencies', 'Admin\Comercial\AgencyController@index')->name('agencies.index')
        ->middleware('permission:agencies.index');
    Route::post('agencies/store', 'Admin\Comercial\AgencyController@store')->name('agencies.store')
        ->middleware('permission:agencies.store');
    Route::put('agencies/{agency}', 'Admin\Comercial\AgencyController@update')->name('agencies.update')
        ->middleware('permission:agencies.update');
    Route::delete('agencies/{agency}', 'Admin\Comercial\AgencyController@destroy')->name('agencies.destroy')
        ->middleware('permission:agencies.destroy');

    // User
    Route::get('users', 'Admin\Comercial\UserController@index')->name('users.index')
        ->middleware('permission:users.index');
    Route::post('users/store', 'Admin\Comercial\UserController@store')->name('users.store')
        ->middleware('permission:users.store');
    Route::put('users/{user}', 'Admin\Comercial\UserController@update')->name('users.update')
        ->middleware('permission:users.update');
    Route::delete('users/{user}', 'Admin\Comercial\UserController@destroy')->name('users.destroy')
        ->middleware('permission:users.destroy');

    // Folder
    Route::get('folders', 'Admin\Comercial\FolderController@index')->name('folders.index')
        ->middleware('permission:folders.index');
    Route::post('folders/store', 'Admin\Comercial\FolderController@store')->name('folders.store')
        ->middleware('permission:folders.store');
    Route::put('folders/{folder}', 'Admin\Comercial\FolderController@update')->name('folders.update')
        ->middleware('permission:folders.update');
    Route::delete('folders/{folder}', 'Admin\Comercial\FolderController@destroy')->name('folders.destroy')
        ->middleware('permission:folders.destroy');

    Route::post('folders/import', 'Admin\Comercial\FolderController@import')->name('folders.import')
        ->middleware('permission:folders.store');
    // destro all
    Route::get('folders/destroyall', 'Admin\Comercial\FolderController@destroyall')->name('folders.destroyall')
    ->middleware('permission:folders.destroy');

    // Assign
    Route::get('assigns', 'Admin\Comercial\AssignController@index')->name('assigns.index')
        ->middleware('permission:assigns.index');
    Route::post('assigns/store', 'Admin\Comercial\AssignController@store')->name('assigns.store')
        ->middleware('permission:assigns.store');
    Route::put('assigns/{assign}', 'Admin\Comercial\AssignController@update')->name('assigns.update')
        ->middleware('permission:assigns.update');
    Route::delete('assigns/{assign}', 'Admin\Comercial\AssignController@destroy')->name('assigns.destroy')
        ->middleware('permission:assigns.destroy');

    Route::post('assigns/import', 'Admin\Comercial\AssignController@import')->name('assigns.import')
        ->middleware('permission:assigns.store');

    // Observeds
    Route::get('observeds', 'Admin\Comercial\ObservedController@index')->name('observeds.index')
        ->middleware('permission:observeds.index');
    Route::get('observeds/store/{folder}', 'Admin\Comercial\ObservedController@store')->name('observeds.store')
        ->middleware('permission:observeds.store');
    Route::put('observeds/{observed}', 'Admin\Comercial\ObservedController@update')->name('observeds.update')
        ->middleware('permission:observeds.update');
    Route::delete('observeds/{observed}', 'Admin\Comercial\ObservedController@destroy')->name('observeds.destroy')
        ->middleware('permission:observeds.destroy');

    Route::post('observeds/import', 'Admin\Comercial\ObservedController@import')->name('observeds.import')
        ->middleware('permission:observeds.store');

    // Approveds
    Route::get('approveds', 'Admin\Comercial\ApprovedController@index')->name('approveds.index')
        ->middleware('permission:approveds.index');
    Route::get('approveds/store/{folder}', 'Admin\Comercial\ApprovedController@store')->name('approveds.store')
        ->middleware('permission:approveds.store');
    Route::put('approveds/{approved}', 'Admin\Comercial\ApprovedController@update')->name('approveds.update')
        ->middleware('permission:approveds.update');
    Route::delete('approveds/{approved}', 'Admin\Comercial\ApprovedController@destroy')->name('approveds.destroy')
        ->middleware('permission:approveds.destroy');

    Route::post('approveds/import', 'Admin\Comercial\ApprovedController@import')->name('approveds.import')
        ->middleware('permission:approveds.store');

    // Rejecteds
    Route::get('rejecteds', 'Admin\Comercial\RejectedController@index')->name('rejecteds.index')
        ->middleware('permission:rejecteds.index');
    Route::get('rejecteds/store/{folder}', 'Admin\Comercial\RejectedController@store')->name('rejecteds.store')
        ->middleware('permission:rejecteds.store');
    Route::put('rejecteds/{rejected}', 'Admin\Comercial\RejectedController@update')->name('rejecteds.update')
        ->middleware('permission:rejecteds.update');
    Route::delete('rejecteds/{rejected}', 'Admin\Comercial\RejectedController@destroy')->name('rejecteds.destroy')
        ->middleware('permission:rejecteds.destroy');

    Route::post('rejecteds/import', 'Admin\Comercial\RejectedController@import')->name('rejecteds.import')
        ->middleware('permission:rejecteds.store');

    // Disbursement
    Route::get('disbursements', 'Admin\Comercial\DisbursementController@index')->name('disbursements.index')
        ->middleware('permission:disbursements.index');
    Route::get('disbursements/store/{folder}', 'Admin\Comercial\DisbursementController@store')->name('disbursements.store')
        ->middleware('permission:disbursements.store');
    Route::put('disbursements/{disbursement}', 'Admin\Comercial\DisbursementController@update')->name('disbursements.update')
        ->middleware('permission:disbursements.update');
    Route::delete('disbursements/{disbursement}', 'Admin\Comercial\DisbursementController@destroy')->name('disbursements.destroy')
        ->middleware('permission:disbursements.destroy');

    Route::post('disbursements/import', 'Admin\Comercial\DisbursementController@import')->name('disbursements.import')
        ->middleware('permission:disbursements.store');


    // Users
    // Folder
    Route::post('folders/storeUser', 'User\Comercial\FolderController@storeuser')->name('folders.storeUser')
        ->middleware('permission:folders.store');

    Route::get('foldersAssign', 'User\Comercial\FolderController@assign')->name('folders.assign');
        // ->middleware('permission:folders.index');
    Route::get('foldersRegistrados', 'User\Comercial\FolderController@regist')->name('folders.regist');
    // ->middleware('permission:folders.index');
    Route::get('foldersComercial', 'User\Comercial\FolderController@comercial')->name('folders.comercial');
    // ->middleware('permission:folders.index');
    Route::get('foldersNacional', 'User\Comercial\FolderController@nacional')->name('folders.nacional');
    // ->middleware('permission:folders.index');
    Route::get('foldersEncargado', 'User\Comercial\FolderController@encargado')->name('folders.encargado');
    // ->middleware('permission:folders.index');
    Route::get('foldersDisbursement', 'User\Comercial\FolderController@disbursement')->name('folders.disbursement');
    // ->middleware('permission:folders.index');

    //folders EA
    //Ely
    Route::get('foldersCarla', 'User\Comercial\FolderController@carla')->name('folders.carla');
    // ->middleware('permission:folders.index');
    // alex
    Route::get('foldersAlex', 'User\Comercial\FolderController@alex')->name('folders.alex');
    // ->middleware('permission:folders.index');
    // roxana
    Route::get('foldersRoxana', 'User\Comercial\FolderController@roxana')->name('folders.roxana');
    // ->middleware('permission:folders.index');
    // Mariela
    Route::get('foldersMariela', 'User\Comercial\FolderController@mariela')->name('folders.mariela');
    // ->middleware('permission:folders.index');
    // Vero
    Route::get('foldersVeronica', 'User\Comercial\FolderController@veronica')->name('folders.veronica');
    // ->middleware('permission:folders.index');

    // Assigns
    Route::get('assignsAssign', 'User\Comercial\FolderController@assignCom')->name('assign.assign');
    // ->middleware('permission:folders.index');

    // Assigns
    Route::get('assignsAssignEN', 'User\Comercial\FolderController@assignEN')->name('assign.assignEN');
    // ->middleware('permission:folders.index');



    // Operaciones
    // Admin
	// Arqueo
	Route::get('arqueos', 'Admin\Operaciones\ArqueoController@index')->name('arqueos.index')
        ->middleware('permission:arqueos.index');
    Route::post('arqueos/store', 'Admin\Operaciones\ArqueoController@store')->name('arqueos.store')
        ->middleware('permission:arqueos.store');
    Route::put('arqueos/{arqueo}', 'Admin\Operaciones\ArqueoController@update')->name('arqueos.update')
        ->middleware('permission:arqueos.update');
    Route::delete('arqueos/{arqueo}', 'Admin\Operaciones\ArqueoController@destroy')->name('arqueos.destroy')
        ->middleware('permission:arqueos.destroy');

    // Entrada
    Route::get('entradas', 'Admin\Operaciones\EntradaController@index')->name('entradas.index')
        ->middleware('permission:entradas.index');
    Route::post('entradas/store', 'Admin\Operaciones\EntradaController@store')->name('entradas.store')
        ->middleware('permission:entradas.store');
    Route::put('entradas/{entrada}', 'Admin\Operaciones\EntradaController@update')->name('entradas.update')
        ->middleware('permission:entradas.update');
    Route::delete('entradas/{entrada}', 'Admin\Operaciones\EntradaController@destroy')->name('entradas.destroy')
        ->middleware('permission:entradas.destroy');

    Route::post('entradas/import', 'Admin\Operaciones\EntradaController@import')->name('entradas.import')
        ->middleware('permission:entradas.store');
    Route::get('entradas/destroy', 'Admin\Operaciones\EntradaController@destroyImport')->name('entradas.destroyImport')
        ->middleware('permission:entradas.destroy');

    //Salida
    Route::get('salidas', 'Admin\Operaciones\SalidaController@index')->name('salidas.index')
        ->middleware('permission:salidas.index');
    Route::post('salidas/store', 'Admin\Operaciones\SalidaController@store')->name('salidas.store')
        ->middleware('permission:salidas.store');
    Route::put('salidas/{salida}', 'Admin\Operaciones\SalidaController@update')->name('salidas.update')
        ->middleware('permission:salidas.update');
    Route::delete('salidas/{salida}', 'Admin\Operaciones\SalidaController@destroy')->name('salidas.destroy')
        ->middleware('permission:salidas.destroy');

    Route::post('salidas/import', 'Admin\Operaciones\SalidaController@import')->name('salidas.import')
        ->middleware('permission:salidas.store');
    Route::get('salidas/destroy', 'Admin\Operaciones\SalidaController@destroyImport')->name('salidas.destroyImport')
        ->middleware('permission:salidas.destroy');

    //Boliviano
    Route::get('bolivianos', 'Admin\Operaciones\BolivianoController@index')->name('bolivianos.index')
        ->middleware('permission:bolivianos.index');
    Route::post('bolivianos/store', 'Admin\Operaciones\BolivianoController@store')->name('bolivianos.store')
        ->middleware('permission:bolivianos.store');
    Route::put('bolivianos/{boliviano}', 'Admin\Operaciones\BolivianoController@update')->name('bolivianos.update')
        ->middleware('permission:bolivianos.update');
    Route::delete('bolivianos/{boliviano}', 'Admin\Operaciones\BolivianoController@destroy')->name('bolivianos.destroy')
        ->middleware('permission:bolivianos.destroy');

    //Dolar
    Route::get('dolars', 'Admin\Operaciones\DolarController@index')->name('dolars.index')
        ->middleware('permission:dolars.index');
    Route::post('dolars/store', 'Admin\Operaciones\DolarController@store')->name('dolars.store')
        ->middleware('permission:dolars.store');
    Route::put('dolars/{dolar}', 'Admin\Operaciones\DolarController@update')->name('dolars.update')
        ->middleware('permission:dolars.update');
    Route::delete('dolars/{dolar}', 'Admin\Operaciones\DolarController@destroy')->name('dolars.destroy')
        ->middleware('permission:dolars.destroy');

    // Users
    // Arqueo
    Route::get('arqueos/user', 'User\Operaciones\ArqueoController@indexUser')->name('arqueos.indexUser');
    // ->middleware('permission:arqueos.store');
    Route::get('arqueos/user/{arqueo}', 'User\Operaciones\ArqueoController@showUser')->name('arqueos.showUser');
    // ->middleware('permission:arqueos.store');
	Route::get('arqueos/user/print/{arqueo}', 'User\Operaciones\ArqueoController@print')->name('arqueos.print');

    Route::get('arqueos/userja', 'User\Operaciones\ArqueoController@indexja')->name('arqueos.indexja');
    // ->middleware('permission:arqueos.store');
    Route::get('arqueos/userja/{arqueo}', 'User\Operaciones\ArqueoController@showja')->name('arqueos.showja');
    // ->middleware('permission:arqueos.store');

    // Entradas
    Route::get('entradas/user', 'User\Operaciones\EntradaController@index')->name('entradas.indexUser');
        // ->middleware('permission:inputs.store');
    Route::post('entradas/user/store', 'User\Operaciones\EntradaController@store')->name('entradas.storeUser');
        // ->middleware('permission:entradas.store');
    Route::put('entradas/user/{entrada}', 'User\Operaciones\EntradaController@update')->name('entradas.updateUser');
        // ->middleware('permission:entradas.update');
    Route::delete('entradas/user/{entrada}', 'User\Operaciones\EntradaController@destroy')->name('entradas.destroyUser');
        // ->middleware('permission:entradas.destroy');

    // Salidas
    Route::get('salidas/user', 'User\Operaciones\SalidaController@index')->name('salidas.indexUser');
        // ->middleware('permission:inputs.store');
    Route::post('salidas/user/store', 'User\Operaciones\SalidaController@store')->name('salidas.storeUser');
        // ->middleware('permission:salidas.store');
    Route::put('salidas/user/{salida}', 'User\Operaciones\SalidaController@update')->name('salidas.updateUser');
        // ->middleware('permission:salidas.update');
    Route::delete('salidas/user/{salida}', 'User\Operaciones\SalidaController@destroy')->name('salidas.destroyUser');
        // ->middleware('permission:salidas.destroy');


    //Banco
    Route::get('bancos', 'Admin\Operaciones\BancoController@index')->name('bancos.index')
        ->middleware('permission:bancos.index');
    Route::post('bancos/store', 'Admin\Operaciones\BancoController@store')->name('bancos.store')
        ->middleware('permission:bancos.store');
    Route::put('bancos/{banco}', 'Admin\Operaciones\BancoController@update')->name('bancos.update')
        ->middleware('permission:bancos.update');
    Route::delete('bancos/{banco}', 'Admin\Operaciones\BancoController@destroy')->name('bancos.destroy')
        ->middleware('permission:bancos.destroy');

	// Reporte Consolidado
	Route::get('consolidados', 'Report\ConsolidadoController@index')->name('consolidados.index')
        ->middleware('permission:consolidados.index');
    Route::post('consolidados/store', 'Report\ConsolidadoController@store')->name('consolidados.store')
        ->middleware('permission:consolidados.index');
    Route::get('consolidados/user', 'Report\ConsolidadoController@show')->name('arqueos.show')
        ->middleware('permission:consolidados.index');
    // Route::put('consolidados/{consolidado}', 'Report\ConsolidadoController@update')->name('consolidados.update')
    //     ->middleware('permission:consolidados.update');
    // Route::delete('consolidados/{consolidado}', 'Report\ConsolidadoController@destroy')->name('consolidados.destroy')
    //     ->middleware('permission:consolidados.destroy');



    // dashboard

    Route::post('dashboard/store', 'Admin\Dashboard\DashboardController@store')->name('dashboard.store');
    Route::get('dashboard', 'Admin\Dashboard\DashboardController@index')->name('dashboard');
    Route::get('dashboard/forders', 'Admin\Dashboard\DashboardController@forders')->name('dashboard.forders');
    Route::get('dashboard/arqueos', 'Admin\Dashboard\DashboardController@arqueos')->name('dashboard.arqueos');
    Route::get('dashboard/arqueosprint', 'Admin\Dashboard\DashboardController@arqueosprint')->name('dashboard.arqueosprint');
});
