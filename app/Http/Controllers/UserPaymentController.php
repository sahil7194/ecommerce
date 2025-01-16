<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserPayment\CreateUserPaymentRequest;
use App\Http\Requests\UserPayment\UpdateUserPaymentRequest;
use App\Http\Resources\UserPaymentResource;
use App\Models\UserPayment;
use Illuminate\Http\Request;

class UserPaymentController extends Controller
{
    public function index(string $userId)
    {
        $payments = UserPayment::where('user_id', $userId)->all();

        return UserPaymentResource::collection($payments);
    }

    public function show(string $paymentId)
    {
        $payment = UserPayment::find($paymentId);

        if (!$payment) {
            return response()->json(['message' => 'Payment not found'], 404);
        }

        return new UserPaymentResource($payment);
    }

    public function store(CreateUserPaymentRequest $request)
    {
        $params = $request->validated();

        $params["status"] = "success";

        $payment = UserPayment::create($params);

        return new UserPaymentResource($payment);
    }

    public function update(UpdateUserPaymentRequest $request, string $userId)
    {
        $payment = UserPayment::where('user_id', $userId)->get();

        if (!$payment) {
            return response()->json([
                "message" => "Payment not found"
            ]);
        }

        $payment->update($request->validated());

        return UserPaymentResource::make($payment);
    }
}
