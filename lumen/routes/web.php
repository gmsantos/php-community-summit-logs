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

use Psr\Log\LoggerInterface;

$app->get('/', function (LoggerInterface $log) use ($app) {
    $log->info('Hit on home page');

    return $app->version();
});
