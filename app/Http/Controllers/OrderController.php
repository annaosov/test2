<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create($order_id)
    {
        /* Выдача по id заказа товаров и их кол-ва */
        $order_items = OrderItem::where('order_id', $order_id)
        ->join('products', 'order_items.product_id', '=', 'products.id')
        ->select('products.name', 'order_items.quantity')->get();

        /* Резервирование товара из заказа */
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

    public function approve($order_id)
    {
        /* Списание с баланса покупателя суммы заказа */
        $order_amount = 0.0;
        $order_items = OrderItem::where('order_id', $order_id)->get();
        foreach($order_items as $item) {
            $order_amount = $order_amount + ($item->price * $item->quantity); 
        }
        
        $order = Order::where('id', $order_id)->first();
        $user = User::where('id', $order->user_id)->first();
        if ($user->balance >= $order_amount) {
            $user->balance = $user->balance - $order_amount;
            $user->save();
            /* Изменение статуса заказа */
            $order->status = 2;
            $order->save();
            return 'Сумма заказа списана с вашего баланса';
        } else {
            return 'У вас недостаточно средств на балансе для заказа';
        }
    }
}