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


$router->group(['middleware' => 'client.credentials'], function() use ($router) {

    $router->get('/authors', 'AuthorController@index'); // get all users records
    $router->post('/authors', 'AuthorController@add'); // create new user record
    $router->get('/authors/{id}', 'AuthorController@show'); // get user by id
    $router->put('/authors/{id}', 'AuthorController@update'); // update user record
    $router->patch('/authors/{id}', 'AuthorController@update'); // update user record
    $router->delete('/authors/{id}', 'AuthorController@delete'); // delete record

    $router->get('/books', 'BookController@index'); // get all users records
    $router->post('/books', 'BookController@add'); // create new user record
    $router->get('/books/{id}', 'BookController@show'); // get user by id
    $router->put('/books/{id}', 'BookController@update'); // update user record
    $router->patch('/books/{id}', 'BookController@update'); // update user record
    $router->delete('/books/{id}', 'BookController@delete'); 

});