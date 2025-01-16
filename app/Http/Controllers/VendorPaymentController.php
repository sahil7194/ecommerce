<?php

namespace App\Http\Controllers;

use App\Http\Resources\VendorPaymentResource;
use App\Models\VendorPayment;
use Illuminate\Http\Request;

class VendorPaymentController extends Controller
{
    public function index(int $vendorId)
    {
        $payments = VendorPayment::where('vendor_id',$vendorId)->get();

        return $payments;
    }

    public function show(int $vendorPaymentId)
    {
        $payment = VendorPayment::find($vendorPaymentId);

        return VendorPaymentResource::make($payment);
    }
}
