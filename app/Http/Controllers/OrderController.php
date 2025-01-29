<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create($order_id)
    {
        $order_items = OrderItem::where('order_id', $order_id)
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->select('products.name', 'order_items.quantity')->get();

        $products = Product::all();

        foreach($order_items as $item) {
            foreach($products as $product) {
                if ($item->name == $product->name) {
                    $product->quantity_in_stock = $product->quantity_in_stock - $item->quantity;
                    $product->save();
                }
            }
        }

        return response()->json($order_items);
    }
}
