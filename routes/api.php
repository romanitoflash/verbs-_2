<?php

use App\Http\Controllers\API\VerbController;
use App\Http\Controllers\API\AdjetiveController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;





/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('verbs/search', [VerbController::class, 'search'])->name('verbs.search'); 
Route::get('adjetives/search', [AdjetiveController::class, 'search'])->name('adjetives.search'); 

Route::resource('verbs', VerbController::class);
Route::resource('adjetives', AdjetiveController::class);
