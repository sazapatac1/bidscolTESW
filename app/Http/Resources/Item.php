<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Item extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->getId(),
            'name' => $this->getName(),
            'initial_bid' => $this->getInitial_bid(),
            'current_bid' => $this->getCurrent_bid(),
        ];
    }
}
