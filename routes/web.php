<?php

use Illuminate\Support\Facades\Route;
use \App\Events\MyEvent;

Route::get('/', function () {
    return view('welcome', ['key' => env('PUSHER_APP_KEY'), 'cluster' => env('PUSHER_APP_CLUSTER')]);
});

Route::get('/test', function () {
    event(new MyEvent('Hello World'));
});
