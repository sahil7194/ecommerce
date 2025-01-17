<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\CreateOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function show(string $orderId)
    {
        $order = Order::find($orderId);

        if (!$order) {
            return response()->json([
                "message" => "no record found"
            ]);
        }

        return OrderResource::make($order);
    }

    public function store(CreateOrderRequest $request)
    {
        $params = $request->all();

        $order = Order::create([
            "status"       => "Processing",
            "total_amount" => "",
            "instructions" => $params["instructions"],
            "address_id"   => $params["address_id"],
            "user_id"      => $params["user_id"]
        ]);

        $totalOrderAmount = 0;

        foreach ($params["products"] as $product) {

            $pro = Product::find($product['id']);

            $orderQuantity = $product["quantity"];

            $orderAmount = $pro['price'] * $orderQuantity;

            $totalOrderAmount += $orderAmount;

            $leftOverStock = $pro['stock'] - $orderQuantity;

            $order->products()->attach($product['id'], [
                "quantity" => $orderQuantity,
                "price" => $pro['price'],
            ]);

            $pro->update([
                "stock" => $leftOverStock
            ]);
        }

        $order->update([
            "total_amount" => $totalOrderAmount
        ]);

        return OrderResource::make($order);
    }

    public function update(UpdateOrderRequest $request, string $orderId)
    {
        $order = Order::findOrFail($orderId);

        if ($order) {
            $order->update($request->validated());
        }

        return OrderResource::make($order);
    }

    public function userOrders(string $userId)
    {
        $orders = Order::where('user_id' , $userId)->get();

        return OrderResource::collection($orders);
    }
}
