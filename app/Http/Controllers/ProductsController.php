<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController
{
    public function list(Request $request)
    {
        $filters = [
            'id' => $request->query('id'),
        ];

        return view('products.list', [
            'filters' => $filters,
        ]);
    }
}
