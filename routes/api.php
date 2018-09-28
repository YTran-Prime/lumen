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

$router->group(['prefix' => 'api/v1'], function() use ($router) {
    $router->get('conversations', 'ConversationController@getAll');
    $router->post('conversations', 'ConversationController@create');

    $router->group(['prefix' => 'dashboard'], function () use ($router) {
        $router->post('conversations', 'DashboardController@getConversation');
        $router->post('responders', 'DashboardController@getResponded');
        $router->post('skips', 'DashboardController@getSkip');
        $router->post('escalates', 'DashboardController@getEscalate');
        $router->post('comments', 'DashboardController@getComment');
        $router->post('messages', 'DashboardController@getMessage');
        $router->post('coversation_summary', 'DashboardController@getConversationSummary');
    });
});
