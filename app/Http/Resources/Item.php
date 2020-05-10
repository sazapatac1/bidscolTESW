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
            'daysLeft' => $this->getDaysLeft(),
            'starBid' => $this->getInitial_bid(),
            'finalDate' => $this->getFinal_date(),
            'imageName' => $this->getImage_name(),
        ];
    }
}
