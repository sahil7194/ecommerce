<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "total_amount" =>  $this->total_amount,
            "status" => $this->status,
            "instructions" => $this->instructions,
            "address" =>  AddressResource::make($this->address),
            "user" =>  UserResource::make($this->user),
            "products" => ProductResource::collection($this->products)
        ];
    }
}
