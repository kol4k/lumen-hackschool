<?php
use Illuminate\Http\Request;
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


$router->get('/testx', ['middleware' => 'auth', function (Request $request) {
    if(Auth::id()) {
        dd(Auth::id());
    } else {
        dd(Auth::id());        
    }
}]);

/*
* Middleware Access  Guest / Public
*/
$router->post('/register', 'OtentikasiController@processRegister');
$router->post('/authenticate', 'OtentikasiController@processLogin');

/*
* Middleware API Access User / Private
*/
$router->group(['prefix' => 'user', 'middleware' => 'auth','cors'], function () use ($router) {
    $router->group(['prefix' => 'report'], function () use ($router) {
        $router->get('/nilai', 'SiswaController@listNilai');
    });
    
    $router->group(['prefix' => 'ujian'], function () use ($router) {
        $router->get('/', 'SiswaController@getListUjian');        
        $router->get('/{code}', 'SiswaController@getUjian');
        $router->get('/soal/{kode}', 'SiswaController@getSoal');
        $router->post('/result_nilai', 'SiswaController@inputNilai'); 
        $router->get('/rank/{id}', 'SiswaController@rankUjian');
    });
});

/*
* Middleware API Access Administrator / Private
*/
$router->group(['prefix' => 'admin', 'middleware' => 'auth'], function () use ($router) {
    $router->get('/{id}', 'OtentikasiController@get_user');
    $router->group(['prefix' => 'ujian'], function () use ($router) {
        $router->get('/soal/{kode}', 'SiswaController@getSoal');
    });
});