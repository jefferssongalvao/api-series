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

$router->group(["prefix" => "api", "middleware" => "auth"], function () use ($router) {
    $router->group(["prefix" => "series"], function () use ($router) {
        $router->get('', "SeriesController@index");
        $router->post('', "SeriesController@store");
        $router->get('{serieId}', "SeriesController@show");
        $router->put('{serieId}', "SeriesController@update");
        $router->delete('{serieId}', "SeriesController@destroy");
        $router->get('{serieId}/episodes', "SeriesController@episodes");
    });

    $router->group(["prefix" => "episodes"], function () use ($router) {
        $router->get('', "EpisodesController@index");
        $router->post('', "EpisodesController@store");
        $router->get('{episodeId}', "EpisodesController@show");
        $router->put('{episodeId}', "EpisodesController@update");
        $router->delete('{episodeId}', "EpisodesController@destroy");
    });
});

$router->post("api/login", "UserController@login");