<?php

namespace App\Jobs;

use App\Models\Order;
use App\Models\UserPayment;
use App\Models\VendorPayment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProcessVendorPayment implements ShouldQueue
{
    use Queueable;

    public $orderId;

    /**
     * Create a new job instance.
     */
    public function __construct($orderId)
    {
        $this->orderId = $orderId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {

        $order = Order::find($this->orderId);

        foreach ($order->products as $product) {

            $amount = $product["pivot"]["quantity"] * $product["pivot"]["price"];

            $vendorPaymentParams = [
                "amount" => $amount,
                "mode" => "credit-card",
                "status" => "pending",
                "order_id" => $this->orderId,
                "vendor_id" => $product["vendor_id"],
            ];

            VendorPayment::create($vendorPaymentParams);
        }
    }
}
