<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /* Выдача списка товаров */
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }
}