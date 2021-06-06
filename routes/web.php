<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\VariableController;
use App\Models\Link;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
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

Route::get('/', [LinkController::class, 'index']);

Route::resources([
    'link' => LinkController::class,
    'group' => GroupController::class,
    'variable' => VariableController::class,
]);

Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
