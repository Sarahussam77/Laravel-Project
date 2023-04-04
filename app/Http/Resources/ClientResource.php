<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user'=>new UserResource($this->typeable_type),
            'date_of_birth'=>$this->date_of_birth,
            'gender'=>$this->gender,
            'phone'=>$this->phone,
        ];
    }
}
