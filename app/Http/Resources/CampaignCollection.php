<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CampaignCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function toArray($request)
    {
        return $this->collection->transform(function($row, $key) {
            return [
                'id' => $row->getId(),
                'name' => $row->getName(),
                'status' => $row->getStatus(),
                'servingStatus' => $row->getServingStatus(),
                'advertisingChannelType' => $row->getAdvertisingChannelType(),
                'advertisingChannelSubType' => $row->getAdvertisingChannelSubType(),
                'status_2' => false

            ];
        });
    }
}
