<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\AuthAPIController;

// ── Route Terproteksi (membutuhkan token Sanctum) ─────────────
Route::middleware('auth:sanctum')->group(function () {

    // Informasi user yang sedang login
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Logout
    Route::post('/logout', [AuthAPIController::class, 'logout']);

    // CRUD Produk — menggunakan apiResource (auto 5 route)
    Route::apiResource('products', ProductController::class);

    Route::post('/register', [AuthApiController::class, 'register']);
    Route::post('/login', [AuthApiController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthApiController::class, 'logout']);

    });
});
