<?php

namespace App\Http\Resources;

use App\Helpers\GoogleAdsData;
use Illuminate\Http\Resources\Json\JsonResource;

class KeywordPerformanceResource extends JsonResource
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
            'id' => $this->resource['@attributes']['keywordID'],
            'text' => GoogleAdsData::getKeyWordTextById($this->resource['@attributes']['keywordID']),
            'isNegative' => $this->resource['@attributes']['isNegative'] == "true",
            'campaign' => $this->resource['@attributes']['campaign'],
        ];
    }
}
