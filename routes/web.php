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
    // Product::increment('stock_quantity');
    $product = Product::find(2);
    $product->stock_quantity++;
    $product->save();
    Product::getEventDispatcher()->dispatch('products');

});
