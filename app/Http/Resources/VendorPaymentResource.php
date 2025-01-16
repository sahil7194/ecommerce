<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VendorPaymentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'     => $this->id,
            "amount" => $this->amount,
            "mode"   => $this->mode,
            "status" => $this->status,
            "order"  => OrderResource::make($this->order),
            "vendor" => VendorResource::make($this->vendor),
        ];
    }
}
