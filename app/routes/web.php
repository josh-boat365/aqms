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
    return redirect()->route('login');
});

Route::get('/login', 'App\Http\Controllers\AuthController@showLogin')->name('login');

Route::post('/login', 'App\Http\Controllers\AuthController@logIn')->name('login');


Route::get('/register', '\App\Http\Controllers\AuthController@showRegister')->name('register');

Route::post('/register', 'App\Http\Controllers\AuthController@register')->name('register');


Route::get('/dashboard/surveys/{i}', '\App\Http\Controllers\DashboardController@showsurvey')->name('survey.show');

Route::post('/dashboard/surveys/update', '\App\Http\Controllers\DashboardController@updateSurvey')->name('survey.update');


Route::post('/dashboard/surveys', '\App\Http\Controllers\DashboardController@addQuestion')->name('survey.addQuestion');


// Route::get('/dashboard', '\App\Http\Controllers\DashboardController@testsurvey')->name('survey.show');


Route::post('/logout', '\App\Http\Controllers\AuthController@logout')->name('logout');


Route::get('/dashboard', '\App\Http\Controllers\DashboardController@index')->name('dashboard.index');
Route::get('/inc/dashboard/responses', '\App\Http\Controllers\DashboardController@responses')->name('response.index');

Route::post('/dashboard/survey/test', '\App\Http\Controllers\DashboardController@testData')->name('dashboard.test');

Route::post('/dashboard/survey/store', '\App\Http\Controllers\DashboardController@storeSurvey')->name('survey.store');

Route::get('/home', '\App\Http\Controllers\AlumnusController@index')->name('home');
Route::get('/home/surveys/{i}', '\App\Http\Controllers\AlumnusController@showsurvey')->name('alumnus.survey.show');
Route::post('/home/surveys/save', '\App\Http\Controllers\AlumnusController@saveSurvey')->name('alumnus.survey.save');

// Route::get('/dashboard/test', function(){
//     return view('dashboard.surveys.test');
// })->name('dashboard.index');