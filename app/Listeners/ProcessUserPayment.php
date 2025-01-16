<?php

namespace App\Listeners;

use App\Events\UserPaymentCreated;
use App\Jobs\ProcessVendorPayment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class ProcessUserPayment
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserPaymentCreated $event): void
    {
        Log::info("process user payment ", [
            "userpayment" => $event->userPayment
        ]);

        dispatch(new ProcessVendorPayment($event->userPayment->order_id));
    }
}
