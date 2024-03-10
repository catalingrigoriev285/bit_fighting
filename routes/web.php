<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Landing
Route::group(['as' => 'landing.'], function () {
    Route::get('/', 'LandingController@index')->name('index');

    Route::get('/register', 'LandingController@register')->name('register');
    Route::get('/login', 'LandingController@login')->name('login');
});

// Auth
Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::post('register', 'AuthController@register')->name('register');
    Route::post('login', 'AuthController@login')->name('login');
    
    Route::get('logout', 'AuthController@logout')->name('logout');
});

// Dashboard
Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
    Route::get('/', 'DashboardController@index')->name('index');

    Route::get('/members', 'DashboardController@members')->name('members');
    Route::get('/members/{member}/remove/', 'DashboardController@removeMember')->name('members.remove');
    Route::get('/members/{member}/configure/', 'DashboardController@configureMember')->name('members.configure');
    Route::post('/members/{member}/configure/', 'DashboardController@updateMember')->name('members.update');

    Route::get('/skills', 'DashboardController@skills')->name('skills');
    Route::post('/skills', 'DashboardController@storeSkills')->name('skills.store');
    Route::get('/skills/{skill}/remove/', 'DashboardController@removeSkill')->name('skills.remove');
});

// Employee Dashboard
Route::group(['prefix' => 'employee', 'as' => 'employee.'], function () {
    Route::get('/', 'EmployeeController@index')->name('index');
});

// Organization
Route::group(['prefix' => 'organization', 'as' => 'organization.'], function () {
    Route::get('/{reference}/signup', 'OrganizationController@signup')->name('signup');

    Route::post('/{reference}/register', 'AuthController@registerEmployee')->name('register');
});