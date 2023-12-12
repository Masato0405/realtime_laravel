<?php

use Illuminate\Support\Facades\Route;
use \App\Models\Product;

Route::get('/', function () {
    return view('welcome', [
        'products' => Product::all(),
        'key' => env('PUSHER_APP_KEY'),
        'cluster' => env('PUSHER_APP_CLUSTER')
    ]);
});

Route::get('/test', function () {
    $product = Product::find(3);
    $product->increment('stock_quantity');
    $product->save();
    Product::getEventDispatcher()->dispatch('products');
});
