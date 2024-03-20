<?php

use Illuminate\Support\Facades\Route;


Route::group(['as' => 'landing.'], function () {
    Route::get('/', 'LandingController@index')->name('index');
});

Route::group(['as' => 'admin.'], function () {
    Route::get('/admin/login', 'AdminController@login')->name('login');
    Route::get('/admin/register', 'AdminController@register')->name('register');

    Route::post('/admin/postLogin', 'AdminController@postLogin')->name('postLogin');
    Route::post('/admin/postRegister', 'AdminController@postRegister')->name('postRegister');

    Route::get('/admin/logout', 'AdminController@logout')->name('logout');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/admin/dashboard', 'AdminController@dashboard')->name('dashboard');

        // memebers
        Route::get('/admin/members', 'OrganizationMemberController@members')->name('members');
        Route::get('/admin/members/{member}/edit', 'OrganizationMemberController@editMember')->name('members.edit');
        Route::post('/admin/members/{member}/update', 'OrganizationMemberController@updateMember')->name('members.update');
        Route::get('/admin/members/{member}/destroy', 'OrganizationMemberController@removeMember')->name('members.destroy');

        // skills
        Route::get('/admin/skills', 'OrganizationSkillController@index')->name('skills');
        Route::post('/admin//skills/store', 'OrganizationSkillController@store')->name('skills.store');
        Route::get('/admin/skills/{skill}/destroy', 'OrganizationSkillController@destroy')->name('skills.destroy');

        // projects
        Route::get('/admin/projects', 'OrganizationProjectController@index')->name('projects');
        Route::get('/admin/projects/create', 'OrganizationProjectController@create')->name('projects.create');
        Route::post('/admin/projects/store', 'OrganizationProjectController@store')->name('projects.store');
        Route::get('/admin/projects/{project}/edit', 'OrganizationProjectController@edit')->name('projects.edit');
        Route::post('/admin/projects/{project}/update', 'OrganizationProjectController@update')->name('projects.update');
        Route::get('/admin/projects/{project}/destroy', 'OrganizationProjectController@destroy')->name('projects.destroy');

        // teams
        Route::get('/admin/teams', 'OrganizationTeamController@index')->name('teams');
        Route::get('/admin/teams/create', 'OrganizationTeamController@create')->name('teams.create');
        Route::post('/admin/teams/store', 'OrganizationTeamController@store')->name('teams.store');
        Route::get('/admin/teams/{team}/edit', 'OrganizationTeamController@edit')->name('teams.edit');
        Route::post('/admin/teams/{team}/update', 'OrganizationTeamController@update')->name('teams.update');
        Route::get('/admin/teams/{team}/destroy', 'OrganizationTeamController@destroy')->name('teams.destroy');
    });
});

Route::group(['as' => '.organization'], function () {
    Route::get('/organization/{reference}/signup', 'OrganizationController@signup')->name('organization.signup');
    Route::post('/organization/{reference}/register-employee', 'OrganizationController@registerEmployee')->name('organization.registerEmployee');
});
