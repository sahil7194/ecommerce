<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VendorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'    =>  $this->name,
            'email'   =>  $this->email,
            'phone'   =>  $this->phone,
            'gender'  =>  $this->gender,
            'dob'     =>  $this->dob,
        ];
    }
}