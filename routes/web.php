<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->group(['prefix' => 'v1/aset'], function () use ($router) {
    $router->get('/', 'AsetController@index');
    $router->get('/{id}', 'AsetController@show');
    $router->post('/', 'AsetController@store');
    $router->post('update/{id}', 'AsetController@update');
    $router->delete('/{id}', 'AsetController@destroy');
});

$router->group(['prefix' => 'v1/branch'], function () use ($router) {
    $router->get('/', 'BranchController@index');
    $router->get('/{id}', 'BranchController@show');
    $router->post('/', 'BranchController@store');
    $router->post('update/{id}', 'BranchController@update');
    $router->delete('/{id}', 'BranchController@destroy');
});

$router->group(['prefix' => 'v1/jenisaset'], function () use ($router) {
    $router->get('/', 'JenisasetController@index');
    $router->get('/{id}', 'JenisasetController@show');
    $router->post('/', 'JenisasetController@store');
    $router->post('update/{id}', 'JenisasetController@update');
    $router->delete('/{id}', 'JenisasetController@destroy');
});

$router->get('fullstack_test/triadiqr/{jenis}/{branch}/{bulan}/{tahun}/{query}', 'Controller@scanQR');
