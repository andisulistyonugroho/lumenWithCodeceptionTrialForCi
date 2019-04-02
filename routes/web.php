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

$app->get('/', function () use ($app) {
    return $app->version();
});

/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
$app->post('/login','UserController@login');
$app->post('/register','UserController@register');
$app->get('/profile[/{id}]',['middleware' => 'auth', 'uses' => 'UserController@profile']);

/*
|--------------------------------------------------------------------------
| Customer Routes
|--------------------------------------------------------------------------
*/
$app->group(['prefix' => 'customers', 'middleware' => 'auth'], function () use ($app) {
    $app->post('create', ['uses' => 'CustomerController@create']);
});
