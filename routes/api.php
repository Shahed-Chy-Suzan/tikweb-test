<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


//---------------------For_JWT-------------------------
Route::group([

  'middleware' => 'api',
  'prefix' => 'auth'

], function ($router) {                           //--JWT(auth)
  Route::post('login', [AuthController::class, 'login']);
  Route::post('signup', [AuthController::class, 'signup']);
  Route::post('logout', [AuthController::class, 'logout']);
  Route::post('refresh', [AuthController::class, 'refresh']);
  Route::post('me', [AuthController::class, 'me']);
});

Route::post('/profile/{id}', [RoleController::class, 'profile']);   // user's individual Profile show


//----------------------For_CRUD-----------------------------------
