<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserTimeRecordController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/public', function () {
    return response()->json('Rex-Clock-Api is listening for requests.', Response::HTTP_OK);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/v1')->group(function () {
    Route::prefix('/auth')->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::post('/login', 'login');
        });
    });

    Route::prefix('/users')->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::post('/', 'store');
        });
    });
});

Route::group(['prefix' => '/v1', 'middleware' => ['auth:api']], function () {
    Route::prefix('/users')->group(function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('/{id}', 'getUserById');
            Route::put('/{id}', 'getById');
            Route::delete('/{id}', 'destroy');
        });
    });

    Route::prefix('/companies')->group(function () {
        Route::controller(CompanyController::class)->group(function () {
            Route::get('/', 'index');
            Route::get('/{id}', 'getById');
            Route::post('/', 'store');
            Route::put('/{id}', 'getById');
            Route::delete('/{id}', 'destroy');
        });
    });

    Route::prefix('/user_time_records')->group(function () {
        Route::controller(UserTimeRecordController::class)->group(function () {
            Route::get('/', 'getTodayTimeRecords');
            Route::post('/', 'store');
        });
    });
});
