<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController
{
    public function list(Request $request)
    {
        $product = $request->query('product');
        $sku = $request->query('sku');

        $inventory = $request->user()->inventory()
            ->with('product');

        if (strlen($product) > 0) {
            $inventory->where('product_id', $product);
        }

        if (strlen($sku) > 0) {
            $inventory->where('sku', 'like', '%' . $sku . '%');
        }

        return view('inventory.list', [
            'skuFilter' => $sku,
            'productFilter' => $product,
            'inventory' => $inventory->paginate(10),
        ]);
    }
}
