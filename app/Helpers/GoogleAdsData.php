<?php

namespace App\Helpers;

use App\Helpers\GoogleAdsSession;
use Google\AdsApi\AdWords\AdWordsServices;
use Google\AdsApi\AdWords\Query\v201809\ReportQueryBuilder;
use Google\AdsApi\AdWords\Query\v201809\ServiceQueryBuilder;
use Google\AdsApi\AdWords\Reporting\v201809\DownloadFormat;
use Google\AdsApi\AdWords\Reporting\v201809\ReportDownloader;
use Google\AdsApi\AdWords\ReportSettingsBuilder;
use Google\AdsApi\AdWords\v201809\cm\AdGroupCriterionService;
use Google\AdsApi\AdWords\v201809\cm\AdGroupService;
use Google\AdsApi\AdWords\v201809\cm\CampaignService;
use Google\AdsApi\AdWords\v201809\cm\ReportDefinitionReportType;

class GoogleAdsData
{
    public static function getCampaigns()
    {
        $campaignService = (new AdWordsServices())->get(GoogleAdsSession::getSession(), CampaignService::class);
        $query = (new ServiceQueryBuilder())
            ->select(["Id", "Name", "Status", "ServingStatus", "AdvertisingChannelType", "AdvertisingChannelSubType"])
            ->orderByAsc('Name')
            ->build();

        $page = $campaignService->query("$query");
        $records = $page->getEntries();

        return collect($records);
    }

    public static function getKeyWords()
    {
        $campaignService = (new AdWordsServices())->get(GoogleAdsSession::getSession(), AdGroupCriterionService::class);
        $query = (new ServiceQueryBuilder())
            ->select(['Id', 'CriteriaType', 'KeywordMatchType', 'KeywordText'])
            ->orderByAsc('Id')
            ->build();

        $page = $campaignService->query("$query");
        $records = $page->getEntries();

        return collect($records);
    }

    public static function getGroups()
    {
        $campaignService = (new AdWordsServices())->get(GoogleAdsSession::getSession(), AdGroupService::class);
        $query = (new ServiceQueryBuilder())
            ->select(['Id', 'Name'])
            ->build();

        $page = $campaignService->query("$query");
        $records = $page->getEntries();
        return collect($records);
    }

    public static function getKeyWordsById($id)
    {
        $campaignService = (new AdWordsServices())->get(GoogleAdsSession::getSession(), AdGroupCriterionService::class);
        $query = (new ServiceQueryBuilder())
            ->select(['Id', 'CriteriaType', 'KeywordMatchType', 'KeywordText'])
            ->where('Id')->in([$id])
            ->build();

        $page = $campaignService->query("$query");
        $records = $page->getEntries();
        return collect($records)[0];
    }

    public static function getKeyWordTextById($id)
    {
        $campaignService = (new AdWordsServices())->get(GoogleAdsSession::getSession(), AdGroupCriterionService::class);
        $query = (new ServiceQueryBuilder())
            ->select(['Id', 'CriteriaType', 'KeywordMatchType', 'KeywordText'])
            ->where('Id')->in([$id])
            ->build();

        $page = $campaignService->query("$query");
        $records = $page->getEntries();
        return collect($records)[0]->getCriterion()->getText();
    }

    public static function getCampaignsPerformanceReport()
    {
        $session = GoogleAdsSession::getSession();
        $query = (new ReportQueryBuilder())
            ->select([
                'CampaignId',
                'CampaignName',
                'CampaignStatus',
                'Clicks',
                'Impressions',
                'Ctr',
                'Cost',
                'AccountCurrencyCode',
                'Device',
            ])
            ->from(ReportDefinitionReportType::CAMPAIGN_PERFORMANCE_REPORT)
            ->build();

        $reportDownloader = new ReportDownloader($session);
        $reportSettingsOverride = (new ReportSettingsBuilder())
            ->includeZeroImpressions(true)
            ->skipReportSummary(false)
            ->build();
        $reportDownloadResult = $reportDownloader->downloadReportWithAwql(
            sprintf('%s', $query),
            DownloadFormat::XML,
            $reportSettingsOverride
        );
        $cadena = $reportDownloadResult->getAsString();
        $xml = simplexml_load_string($cadena);
        $json = json_encode($xml->table);
        $array = json_decode($json, true);
        return collect($array['row']);
    }

}
