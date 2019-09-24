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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth/login');
});

Route::get('/register', function () {
    return view('auth/register');
});

Route::get('/confirmLogin', function () {
    return view('auth/confirmLogin');
});
Route::get('/confirmRegister', function () {
    return view('auth/confirmRegister');
});


Route::get('/home', 'HomeController@index')->name('home');


Route::get('social-auth/{provider}', 'LoginController@redirectToProviderLogin');
Route::get('social-auth/{provider}/callback', 'LoginController@authenticateSocial');

Route::post('/home', 'HomeController@logout')->name('logout');


Route::post('/register', 'RegisterController@registerPhone')->name('register.phone');
Route::post('/login', 'LoginController@loginPhone')->name('login.phone');

Route::post('/confirmLogin', 'LoginController@confirmLogin')->name('confirm.login');
Route::post('/confirmRegister', 'RegisterController@confirmRegister')->name('confirm.register');