<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', array('uses' =>'HomeController@home', 'as' => 'home'));

Route::group(array('before' => 'guest'), function() 
{
	Route::get('/user/login',array('uses' =>'GuestController@getLogin', 'as' => 'getLogin'));

	Route::group(array('before' => 'csrf'), function()
	{
		Route::post('/user/login',array('uses' => 'GuestController@postLogin', 'as' => 'postLogin'));
	});
});

Route::group(array('prefix' => 'user'), function() 
{
	Route::get('/display',array('uses' =>'UserController@getCreate', 'as' => 'getCreate'));
	Route::group(array('before' => 'csrf'), function()
	{
		Route::post('/create', array('uses' => 'UserController@postCreate', 'as' => 'postCreate'));
		Route::get('/checkUsername', array('uses' => 'UserController@checkUsername', 'as' => 'checkUsername'));
		Route::get('/allAccount', array('uses' => 'UserController@allAccount', 'as' => 'allAccount'));
		Route::post('/deleteAccount', array('uses' => 'UserController@deleteAccount', 'as' => 'deleteAccount'));
	});
});

Route::group(array('before' => 'auth'), function()
{
	Route::get('/user/logout', array('uses' => 'UserController@getLogout', 'as' => 'getLogout'));
});

Route::group(array('prefix' => 'student'), function() 
{
	Route::get('/all',array('uses' =>'StudentController@studentRecord', 'as' => 'studentRecord'));
	Route::group(array('before' => 'csrf'), function()
	{
		Route::post('/saveStudenInfo', array('uses' => 'StudentController@saveStudenInfo', 'as' => 'saveStudenInfo'));
		Route::post('/deleteStudent', array('uses' => 'StudentController@deleteStudent', 'as' => 'deleteStudent'));
	});
});

Route::group(array('prefix' => 'filemaintenace'), function() 
{
	Route::get('/all',array('uses' =>'FileMaintenanceController@all', 'as' => 'all'));
	Route::group(array('before' => 'csrf'), function()
	{
		Route::post('/saveNewSectionRecord', array('uses' => 'FileMaintenanceController@saveNewSectionRecord', 'as' => 'saveNewSectionRecord'));
		Route::post('/saveNewYearRecord', array('uses' => 'FileMaintenanceController@saveNewYearRecord', 'as' => 'saveNewYearRecord'));
		Route::post('/saveNewCityRecord', array('uses' => 'FileMaintenanceController@saveNewCityRecord', 'as' => 'saveNewCityRecord'));
		Route::post('/saveNewStateRecord', array('uses' => 'FileMaintenanceController@saveNewStateRecord', 'as' => 'saveNewStateRecord'));
	});
});

Route::group(array('prefix' => 'global'), function() 
{
	Route::get('/getReports', array('uses' => 'GlobalController@getReports', 'as' => 'getReports'));
	Route::get('/allYears', array('uses' => 'GlobalController@allYears', 'as' => 'allYears'));
	Route::get('/allSections', array('uses' => 'GlobalController@allSections', 'as' => 'allSections'));
	Route::get('/allCity', array('uses' => 'GlobalController@allCity', 'as' => 'allCity'));
	Route::get('/allState', array('uses' => 'GlobalController@allState', 'as' => 'allState'));
	Route::get('/allStudent', array('uses' => 'GlobalController@allStudent', 'as' => 'allStudent'));
	Route::get('/sectionByYear', array('uses' => 'GlobalController@sectionByYear', 'as' => 'sectionByYear'));
	Route::get('/getStudInfo', array('uses' => 'GlobalController@getStudInfo', 'as' => 'getStudInfo'));
	Route::get('/generateReportBy', array('uses' => 'GlobalController@generateReportBy', 'as' => 'generateReportBy'));
});