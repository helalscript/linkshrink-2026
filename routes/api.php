<?php

use App\Http\Controllers\API\V1\LinkController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('v1/links', [LinkController::class, 'store']);
Route::get('v1/links/{code}', [LinkController::class, 'redirect']);
Route::get('v1/links', [LinkController::class, 'getAllLinks']);

// Route::get('v1/check-api-work', function () {
//     return response()->json(['message' => 'API is working fine.'], 200);
// });
Route::fallback(function () {
    return response()->json(['message' => 'Resource not found.'], 404);
});
