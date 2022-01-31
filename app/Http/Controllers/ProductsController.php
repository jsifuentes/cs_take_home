<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController
{
    public function list(Request $request)
    {
        $products = $request->user()->products()
            ->withAggregate('inventory', 'sku', 'group_concat')
            ->paginate(10);

        return view('products.list', [
            'products' => $products,
        ]);
    }
}
