<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;


class ProductController extends Controller
{

    public function store (Request $request) 
    {
    // Authorization
    $this->authorize('create', Product::class);

    // Validation
    $validatedData = $this->valiadate($request, [
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
    ]);
}
}
