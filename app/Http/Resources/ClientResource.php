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
            'id' => $this->id,
            'user' => new UserResource(
                $this->type
            ),
            'date_of_birth'=>$this->date_of_birth,
            'gender'=>$this->gender,
            'phone'=>$this->phone,
        ];
    }
}
