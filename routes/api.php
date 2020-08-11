<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/clinics', 'ClinicController@index');
Route::get('/patients', 'PatientController@index');
Route::get('/patients/{uid}', 'PatientController@show');
Route::get('/providers', 'ProviderController@index');
Route::get('/providers/{id}', 'ProviderController@show');
Route::get('/timeslots', 'TimeSlotController@index');
Route::get('/timeslots/{id}', 'TimeSlotController@show');
Route::get('/appointments', 'TimeSlotController@getAppointments');
Route::get('/availabilities', 'TimeSlotController@getAvailabilities');
Route::post('/availabilities/book', 'TimeSlotController@book');
