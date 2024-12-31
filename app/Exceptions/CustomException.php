<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class CustomException extends Exception
{
    public function report()
    {
        \Log::error("Custom exception ocurred.");
    }

    public function render($request)
    {
        return response()->json(['error' => 'A custom error occurred!'], 400);
    }
}
