<?php


use App\Http\Controllers\ApiControll;
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



//register
Route::post('/Dev-Request', [ApiControll::class, 'store']);

//Esto protege las url si es que no se tiene un usuario en login
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::get('/Dev-Request', [ApiControll::class, 'user']);
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


