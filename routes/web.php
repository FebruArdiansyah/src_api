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

// $router->group(['prefix' => 'api/v1/testing'], function() use ($router){
//     $router->get('/', ['uses' => 'UserController@index']);
// 	$router->post('/', ['uses' => 'UserController@create ']);
// 	$router->get('/{id}', ['uses' => 'UserController@show']);
// 	$router->delete('/{id}', ['uses' => 'UserController@destroy']);
// 	$router->put('/{id}', ['uses' => 'UserController@update']);
// });

$router->group(['prefix' => 'api/v1/products','products' => 'auth'], function() use ($router){
    $router->get('/', ['uses' => 'ProductController@index']);
});

$router->group(['prefix' => 'api/v1/customers','customers' => 'auth'], function() use ($router){
    $router->get('/', ['uses' => 'CustomerController@index']);
});

$router->group(['prefix' => 'api/v1/orders','orders' => 'auth'], function() use ($router){
    $router->get('/', ['uses' => 'OrderController@index']);
});

$router->group(['prefix' => 'api/v1/orderitem','order_items' => 'auth'], function() use ($router){
    $router->get('/', ['uses' => 'OrderItemController@index']);
});


// $router->group(['prefix' => 'api/v1/product','middleware' => 'auth'], function() use ($router){
//     $router->get('/', ['uses' => 'ProductController@index']);
//     $router->post('/add', ['uses' => 'ProductController@store']);
//     $router->get('/show/{id}', ['uses' => 'ProductController@show']);
//     $router->delete('/destroy/{id}', ['uses' => 'ProductController@destroy']);
//     $router->put('/update/{id}', ['uses' => 'ProductController@update']);
// });