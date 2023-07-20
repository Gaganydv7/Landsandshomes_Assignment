<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\URL;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/save', [ApiController::class, 'store']);
Route::get('/list', [ApiController::class, 'index']);
Route::get('/show/{id}', [ApiController::class, 'show']);


// URL
// http://localhost:8000/api/save
// http://localhost:8000/api/list
// http://localhost:8000/api/show/1


// crontab 
// * * * * * cd /path/to/your/laravel/project && php artisan schedule:run >> /dev/null 2>&1
