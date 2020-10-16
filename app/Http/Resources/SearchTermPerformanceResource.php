<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SearchTermPerformanceResource extends JsonResource
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
            'adGroup' => $this->resource['@attributes']['adGroup'],
            'clicks' => $this->resource['@attributes']['clicks'],
            'impressions' => $this->resource['@attributes']['impressions'],
            'ctr' => $this->resource['@attributes']['ctr'],
            'cost' => $this->resource['@attributes']['cost'],
            'currency' => $this->resource['@attributes']['currency'],
            'searchTerm' => $this->resource['@attributes']['searchTerm'],
        ];
    }
}
