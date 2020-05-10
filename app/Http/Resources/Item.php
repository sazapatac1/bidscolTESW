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
            'Daysleft' => $this->getDaysLeft(),
            'imagename' => $this->getImage_name(),
        ];
    }
}
