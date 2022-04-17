<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ClientsController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group( function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resources([
        "products"  =>  ProductsController::class,
        'clients'   =>  ClientsController::class
    ]);

    //Products
    Route::get("all",[ProductsController::class, "getProducts"])->name("products.all");

    //Clients
    Route::get("all_clients",[ClientsController::class,'getClients'])->name('clients.all');
    Route::get('add',[ClientsController::class,'addClient'])->name('clients.add');



//
});

require __DIR__.'/auth.php';

Route::fallback(function (){
    return redirect()->route("dashboard");
});
