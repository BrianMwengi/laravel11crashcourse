<?php

use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Route;


Route::get('test-log', function() {
   return "This route is using the logRequests middleware";
})->middleware('logRequests');

Route::get('/test-exception', function() {
    throw new CustomException;
});

// Add a route to test the rate limit middleware
Route::get('/test-rate-limit', function () {
    return response()->json(['message' => 'You accessed this endpoint
    successfully!']);
    })->middleware('throttle:test-rate-limit');


    Route::get('/encrypt-demo', function () {
        // Store an encrypted value in the session
        $encrypted = encrypt('My secret message');
        session(['demo_encrypted' => $encrypted]);
        return response()->json([
            'encrypted' => $encrypted,
            'info' => 'Value encrypted and stored in session. Now rotate your
            keys in the .env file.',
       ]);
    });

    Route::get('/decrypt-demo', function () {
    // Retrieve and decrypt the value from the session
    $encrypted = session('demo_encrypted');
    $decrypted = $encrypted ? decrypt($encrypted) : 'No value found';
    return response()->json([
        'encrypted' => $encrypted,
        'decrypted' => $decrypted,
        'info' => 'Value decrypted using current or previous key(s).',
    ]);
 });
    


// Route::get('/', function () {
//     return view('welcome');
// });
