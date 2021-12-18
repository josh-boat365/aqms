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


// Auth

Route::get('/login', 'App\Http\Controllers\AuthController@showLogin')->name('login');
Route::post('/login', 'App\Http\Controllers\AuthController@logIn')->name('login');
Route::get('/register', '\App\Http\Controllers\AuthController@showRegister')->name('register');
Route::get('/forgotpassword', '\App\Http\Controllers\AuthController@showForgetPassword')->name('forgot-password');
Route::post('/register', 'App\Http\Controllers\AuthController@register')->name('register');
Route::post('/logout', '\App\Http\Controllers\AuthController@logout')->name('logout');


// Dashboard
    // index
Route::get('/dashboard', '\App\Http\Controllers\DashboardController@index')->name('dashboard.index');
    // survey
Route::post('/dashboard/survey/test', '\App\Http\Controllers\DashboardController@testData')->name('dashboard.test');
Route::post('/dashboard/survey/store', '\App\Http\Controllers\DashboardController@storeSurvey')->name('survey.store');
Route::get('/dashboard/surveys/{i}', '\App\Http\Controllers\DashboardController@showsurvey')->name('survey.show');
Route::post('/dashboard/surveys/update', '\App\Http\Controllers\DashboardController@updateSurvey')->name('survey.update');
Route::put('/dashboard/surveys/deploy', '\App\Http\Controllers\DashboardController@deploySurvey')->name('survey.deploy');
Route::put('/dashboard/surveys/archive', '\App\Http\Controllers\DashboardController@archiveSurvey')->name('survey.archive');
Route::delete('/dashboard/surveys/delete', '\App\Http\Controllers\DashboardController@deleteSurvey')->name('survey.delete');
Route::post('/dashboard/surveys/view-response', '\App\Http\Controllers\DashboardController@viewResponse')->name('survey.view-response');
Route::post('/dashboard/surveys', '\App\Http\Controllers\DashboardController@addQuestion')->name('survey.addQuestion');
    // profile
Route::get('/dashboard/profile/', '\App\Http\Controllers\DashboardController@profile')->name('dashboard.profile');
    // submission
Route::get('/dashboard/submissions', '\App\Http\Controllers\DashboardController@submissions')->name('submissions.index');
Route::get('/dashboard/submissions/{i}', '\App\Http\Controllers\DashboardController@showSubmissions')->name('submissions.show');



// Alumus
    // index
Route::get('/home', '\App\Http\Controllers\AlumnusController@index')->name('home');
    // surveys
Route::get('/home/surveys/{i}', '\App\Http\Controllers\AlumnusController@showsurvey')->name('alumnus.survey.show');
Route::post('/home/surveys/save', '\App\Http\Controllers\AlumnusController@saveSurvey')->name('alumnus.survey.save');
Route::post('/home/surveys/submit', '\App\Http\Controllers\AlumnusController@submitSurvey')->name('alumnus.survey.submit');
    // profile
Route::get('home/profile/', '\App\Http\Controllers\AlumnusController@profile')->name('alumnus.profile');
