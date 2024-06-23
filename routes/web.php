<?php

use App\Models\InventoryIn;
use App\Models\InventoryOut;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\InventoryInController;
use App\Http\Controllers\InventoryOutController;

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
    return view('dashboard.app');
})->name("dashboard");

// bikin route grup auth
Route::middleware("auth")->group(function () {
    Route::resource("/category", CategoryController::class);
    Route::resource("/item", ItemController::class);
    Route::resource("/supplier", SupplierController::class);
    Route::resource("/unit", UnitController::class);
    Route::resource("/warehouse", WarehouseController::class)->middleware("kepala_gudang");
    Route::resource("/user", UserController::class);
    Route::resource("/checkin", InventoryInController::class);
    Route::get("/checkout", [InventoryOutController::class, "index"]);
    Route::get("/checkout/{id}", [InventoryOutController::class, "create"]);
    Route::post("/checkout/{id}", [InventoryOutController::class, "checkout"]);
});



Route::get("/login", [AuthController::class, "auth"])->middleware("guest");
Route::post("/login", [AuthController::class, "authenticate"]);

Route::get("/logout", [AuthController::class, "logout"]);
