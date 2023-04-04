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
        return 
        [
            'id' => $this->id,
            'created_at' => $this->created_at,
            'status' => $this->status,
            'is_insured' => $this->is_insured,
            'user_address_id' => $this->user_address_id,
            'price' => $this->price
        ];
    }
}
