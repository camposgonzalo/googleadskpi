<?php

namespace App\Http\Resources;

use App\Helpers\GoogleAdsReport;
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
        return $this->collection->transform(function ($row, $key) {

            $record = GoogleAdsReport::getCampaignPerformance($row->campaign_id);
            return [
                'id' => $row->id,
                'campaign_id' => $record['@attributes']['campaignID'],
                'name' => $record['@attributes']['campaign'],
                'status' => $record['@attributes']['campaignState'],
                'clicks' => $record['@attributes']['clicks'],
                'impressions' => $record['@attributes']['impressions'],
                'ctr' => $record['@attributes']['ctr'],
                'cost' => $record['@attributes']['cost'],
                'currency' => $record['@attributes']['currency'],
                'user' => $row->user,
                // 'id' => $row['@attributes']['campaignID'],
                // 'name' => $row['@attributes']['campaign'],
                // 'status' => $row['@attributes']['campaignState'],
                // 'clicks' => $row['@attributes']['clicks'],
                // 'impressions' => $row['@attributes']['impressions'],
                // 'ctr' => $row['@attributes']['ctr'],
                // 'cost' => $row['@attributes']['cost'],
                // 'currency' => $row['@attributes']['currency'],

                // 'device' => $row['@attributes']['device'],
                // 'crossDeviceConv' => $row['@attributes']['crossDeviceConv'],
                // 'id' => $row->getId(),
                // 'name' => $row->getName(),
                // 'status' => $row->getStatus(),
                // 'servingStatus' => $row->getServingStatus(),
                // 'advertisingChannelType' => $row->getAdvertisingChannelType(),
                // 'advertisingChannelSubType' => $row->getAdvertisingChannelSubType(),
                // 'status_2' => false,
                // 'id' => $row->id,
                // 'name' => $row->name,
                // 'description' => $row->description,
                // 'objective' => $row->objective,
                // 'url' => $row->url,
                // 'phone' => $row->phone,
                // 'status_2' => false

            ];
        });
    }
}
