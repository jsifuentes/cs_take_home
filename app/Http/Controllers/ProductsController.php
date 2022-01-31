<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController
{
    public function list()
    {
        return view('products.list');
    }
}
