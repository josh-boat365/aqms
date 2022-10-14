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
Route::put('/login', 'App\Http\Controllers\AuthController@showLogin')->name('login');
Route::post('/login', 'App\Http\Controllers\AuthController@logIn')->name('login');
Route::get('/register', '\App\Http\Controllers\AuthController@showRegister')->name('register');
Route::put('/register', '\App\Http\Controllers\AuthController@showRegister')->name('register');
Route::post('/register', 'App\Http\Controllers\AuthController@register')->name('register');
Route::get('/forgotpassword', '\App\Http\Controllers\AuthController@showForgetPassword')->name('forgot-password');
Route::post('/logout', '\App\Http\Controllers\AuthController@logout')->name('logout');

//Auth for Admin
// Route::get('/admin-login', 'App\Http\Controllers\AuthController@showAdminLogin')->name('admin-login');
// Route::post('/admin-login', '\App\Http\Controllers\AuthController@admin-login')->name('admin-login');
// Route::get('/admin-register', '\App\Http\Controllers\AuthController@showAdminRegister')->name('admin-register');
// Route::post('/admin-register', '\App\Http\Controllers\AuthController@admin-register')->name('admin-register');

Route::middleware('checkExpired')->group(function () {

    // Dashboard
    // index
    Route::get('/dashboard', '\App\Http\Controllers\DashboardController@index')->name('dashboard.index');
    // survey
    Route::post('/dashboard/survey/test', '\App\Http\Controllers\DashboardController@testData')->name('dashboard.test');
    Route::post('/dashboard/survey/store', '\App\Http\Controllers\DashboardController@storeSurvey')->name('survey.store');
    Route::get('/dashboard/surveys/{i}', '\App\Http\Controllers\DashboardController@showsurvey')->name('survey.show');
    Route::put('/dashboard/surveys/{survey}/updateExpirationDate', '\App\Http\Controllers\DashboardController@updateExpirationDate')->name('survey.show.updateExpirationDate');
    Route::post('/dashboard/surveys/update', '\App\Http\Controllers\DashboardController@updateSurvey')->name('survey.update');
    Route::put('/dashboard/surveys/deploy', '\App\Http\Controllers\DashboardController@deploySurvey')->name('survey.deploy');
    Route::put('/dashboard/surveys/archive', '\App\Http\Controllers\DashboardController@archiveSurvey')->name('survey.archive');
    Route::delete('/dashboard/surveys/', '\App\Http\Controllers\DashboardController@deleteSurvey')->name('survey.delete');
    Route::delete('/dashboard/surveys/delete', '\App\Http\Controllers\DashboardController@deleteQuestion')->name('survey.question.delete');
    Route::post('/dashboard/surveys/view-response', '\App\Http\Controllers\DashboardController@viewResponse')->name('survey.view-response');
    Route::post('/dashboard/surveys', '\App\Http\Controllers\DashboardController@addQuestion')->name('survey.addQuestion');
    // profile
    Route::get('/dashboard/profile/', '\App\Http\Controllers\DashboardController@profile')->name('dashboard.profile');
    Route::post('/dashboard/profile/', '\App\Http\Controllers\DashboardController@updateProfile')->name('dashboard.profile.update');
    // submission
    Route::get('/dashboard/submissions', '\App\Http\Controllers\DashboardController@submissions')->name('submissions.index');
    Route::get('/dashboard/submissions/{i}', '\App\Http\Controllers\DashboardController@showSubmissions')->name('submissions.show');
    // users
    Route::get('/dashboard/users', '\App\Http\Controllers\DashboardController@users')->name('users.index');
    // analytics
    Route::get('/dashboard/analytics', '\App\Http\Controllers\DashboardController@analytics')->name('analytics.index');
    //     // survey level analysis - gender
    // Route::get('/dashboard/survey-level-analysis', '\App\Http\Controllers\DashboardController@gender')->name('analysis.gender');   
    //     // survey level analysis - departments
    // Route::get('/dashboard/survey-level-analysis', '\App\Http\Controllers\DashboardController@sessions')->name('analytics.sessions');   
    //     // survey level analysis - sessions
    // Route::get('/dashboard/survey-level-analysis', '\App\Http\Controllers\DashboardController@departments')->name('analytics.departments');   




    // Alumus
    // index
    Route::get('/home', '\App\Http\Controllers\AlumnusController@index')->name('home');
    // surveys
    Route::get('/home/surveys/{i}', '\App\Http\Controllers\AlumnusController@showsurvey')->name('alumnus.survey.show');
    Route::post('/home/surveys/save', '\App\Http\Controllers\AlumnusController@saveSurvey')->name('alumnus.survey.save');
    Route::post('/home/surveys/reset', '\App\Http\Controllers\AlumnusController@resetSurvey')->name('alumnus.survey.reset');
    Route::post('/home/surveys/submit', '\App\Http\Controllers\AlumnusController@submitSurvey')->name('alumnus.survey.submit');
    // profile
    Route::get('home/profile/', '\App\Http\Controllers\AlumnusController@profile')->name('alumnus.profile');
    Route::get('home/profile/password', '\App\Http\Controllers\AlumnusController@password')->name('alumnus.password');
    Route::post('home/profile/update', '\App\Http\Controllers\AlumnusController@updateProfile')->name('alumnus.profile.update');
    Route::post('home/password/update', '\App\Http\Controllers\AlumnusController@updatePassword')->name('alumnus.password.update');
});
