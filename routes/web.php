<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ip', function (Request $request) {
    return response()->json([
        'ip' => $request->ip(),
        'fromTrustedProxy' => $request->isFromTrustedProxy(),
        'ips' => $request->ips(),
        'headers' => $request->headers->all(),
    ]);
});

Route::get('/server', function (Request $request) {
    return response()->json($_SERVER);
});
