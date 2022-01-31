<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController
{
    public function list(Request $request)
    {
        $allowedOperands = [
            '>=',
            '<=',
        ];

        $filters = [
            'product' => $request->query('product'),
            'sku' => $request->query('sku'),
            'inventory_operand' => $request->query('inventory_operand'),
            'inventory_value' => $request->query('inventory_value'),
        ];

        if ($filters['inventory_operand'] && !in_array($filters['inventory_operand'], $allowedOperands)) {
            $filters['inventory_operand'] = $allowedOperands[0];
        }

        return view('inventory.list', [
            'filters' => $filters,
        ]);
    }
}
