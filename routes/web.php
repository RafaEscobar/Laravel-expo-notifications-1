<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/nose', function(){
    $channelName = 'news';
    $recipient= 'ExponentPushToken[j1VhghKFF3atTRuEOf73gl]';

    // You can quickly bootup an expo instance
    $expo = \ExponentPhpSDK\Expo::normalSetup();

    // Subscribe the recipient to the server
    $expo->subscribe($channelName, $recipient);

    // Build the notification data
    $notification = ['title' => 'Hello World!', 'body' => 'No se que decirte mano-...'];

    // Notify an interest with a notification
    $expo->notify([$channelName], $notification);
});