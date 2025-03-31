<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    logger()->info('Request', [
        'ip' => $request->ip(),
        'headers' => $request->headers,
    ]);

    return response()->json([
        'ip' => $request->ip(),
        'x-forwarded-for' => $request->header('x-forwarded-for'),
    ]);
});
