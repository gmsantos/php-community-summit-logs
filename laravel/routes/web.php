<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Psr\Log\LoggerInterface;
use Illuminate\Http\Request;

Route::get('/', function (Request $request, LoggerInterface $log) {
    $log->info(
        'User {user} ({ip}) speaks {language}',
        [
            'user' => $request->getUser() ?? 'Anonymous',
            'ip' => $request->getClientIp(),
            'language' => $request->getDefaultLocale()
        ]
    );

    return view('welcome');
});
