<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Laravel\Lumen\Routing\Router;

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

/** @var Router */
$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(["prefix" => "api"], function () use ($router) {
    $router->group(["prefix" => "series"], function () use ($router) {
        $router->get('', "SeriesController@index");
        $router->post('', "SeriesController@store");
        $router->get('{id}', "SeriesController@show");
        $router->put('{id}', "SeriesController@update");
        $router->delete('{id}', "SeriesController@destroy");
    });
    $router->group(["prefix" => "episodes"], function () use ($router) {
        $router->get('', "EpisodesController@index");
        $router->post('', "EpisodesController@store");
        $router->get('{id}', "EpisodesController@show");
        $router->put('{id}', "EpisodesController@update");
        $router->delete('{id}', "EpisodesController@destroy");
    });
});