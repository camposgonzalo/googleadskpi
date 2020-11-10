<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdPerformanceResource extends JsonResource
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
            'status' => $this->resource['@attributes']['adState'],
            'adGroup' => $this->resource['@attributes']['adGroup'],
            'clicks' => $this->resource['@attributes']['clicks'],
            'impressions' => $this->resource['@attributes']['impressions'],
            'ctr' => $this->resource['@attributes']['ctr'],
            'cost' => $this->resource['@attributes']['cost'],
            'currency' => $this->resource['@attributes']['currency'],
            'headline1' => $this->resource['@attributes']['headline1'],
            'headline2' => $this->resource['@attributes']['headline2'],
            'description' => $this->resource['@attributes']['description'],
            'campaign' => $this->resource['@attributes']['campaign'],
            'path1' => $this->resource['@attributes']['path1'],
            'path2' => $this->resource['@attributes']['path2'],
            'displayURL' => $this->resource['@attributes']['displayURL'],
            'finalURL' => $this->resource['@attributes']['finalURL'],
        ];
    }
}
