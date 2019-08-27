<?php

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


use App\Mail\ContactFormMail;

Route::view('/', 'tst.home');

Route::get('contact','contactFormController@create');
Route::post('contact','contactFormController@store');

//------------------------

Route::view('customer', 'tst.customer');

Route::get('aboutMe', 'aboutMeController@index');
Route::post('aboutMe','aboutMeController@store');
Route::get('aboutMe/create', 'aboutMeController@create');
Route::get('aboutMe/{customer}','aboutMeController@show');

Route::get('aboutMe/{customer}/edit','aboutMeController@edit');
Route::patch('aboutMe/{customer}','aboutMeController@update');
Route::delete('aboutMe/{customer}','aboutMeController@destroy');
