<?php

namespace App\Http\Resources;

use App\Models\Campaign;
use Illuminate\Http\Resources\Json\JsonResource;

class CampaignResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->resource['@attributes']['campaignID'],
            'name' => $this->resource['@attributes']['campaign'],
            'status' => $this->resource['@attributes']['campaignState'],
            'clicks' => $this->resource['@attributes']['clicks'],
            'impressions' => $this->resource['@attributes']['impressions'],
            'ctr' => $this->resource['@attributes']['ctr'],
            'cost' => $this->resource['@attributes']['cost'],
            'currency' => $this->resource['@attributes']['currency'],
            'campaign' => Campaign::whereCampaign_id($this->resource['@attributes']['campaignID'])->first(),
        ];
    }
}
