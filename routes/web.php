<?php

use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    $order = Order::latest()->first();

    return Inertia::render('Home', compact('order'));
});

Route::post('/status/update/{id}', function (Request $request, $id) {
    $order = Order::find($id);
    $order->{$request->transition}();

    return redirect('/');
});

Route::post('/status/reset', function () {
    Order::create();

    return redirect('/');
});
