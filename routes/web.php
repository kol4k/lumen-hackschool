<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

/*
* Middleware Access  User / Public
*/
$router->post('/register', 'OtentikasiController@processRegister');
$router->post('/authenticate', 'OtentikasiController@processLogin');

/*
* Middleware API Access Administrator / Private
*/
$router->group(['prefix' => 'admin', 'middleware' => 'auth'], function () use ($router) {
    $router->get('/{id}', 'OtentikasiController@get_user');
});