<?php

namespace App\Helpers;
use App\Helpers\GoogleAdsSession;
use Google\AdsApi\AdWords\v201809\cm\CampaignService;
use Google\AdsApi\AdWords\AdWordsServices;
use Google\AdsApi\AdWords\Query\v201809\ServiceQueryBuilder;

class GoogleAdsData
{
    public static function getCampaigns()
    {
        $campaignService = (new AdWordsServices())->get(GoogleAdsSession::getSession(), CampaignService::class);
        $query = (new ServiceQueryBuilder())
            ->select(["Id","Name","Status","ServingStatus","AdvertisingChannelType","AdvertisingChannelSubType"])
            ->orderByAsc('Name')
            ->build();
        
        $page = $campaignService->query("$query");
        $records = $page->getEntries();

        return collect($records);
    }



}
