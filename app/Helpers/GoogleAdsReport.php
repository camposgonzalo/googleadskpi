<?php

namespace App\Helpers;
use App\Helpers\GoogleAdsSession;
use Google\AdsApi\AdWords\Reporting\v201809\ReportDownloader;
use Google\AdsApi\AdWords\Query\v201809\ReportQueryBuilder;
use Google\AdsApi\AdWords\ReportSettingsBuilder;
use Google\AdsApi\AdWords\Reporting\v201809\DownloadFormat;


class GoogleAdsReport
{
    public static function getCampaignPerformance()
    {
        $reportDownloader = new  ReportDownloader(GoogleAdsSession::getSession());

        $selectedFields = ["CampaignId","CampaignName","CampaignStatus","AccountDescriptiveName","Impressions","Clicks","Ctr","Cost","Conversions","CrossDeviceConversions"];

        $query = (new ReportQueryBuilder())
        ->select($selectedFields)
        ->from('CAMPAIGN_PERFORMANCE_REPORT')
        ->duringDateRange('LAST_7_DAYS')->build();

        $reportSettingsOverride = (new ReportSettingsBuilder())
            ->includeZeroImpressions(false)
            ->build();

        $reportDownloadResult = $reportDownloader->downloadReportWithAwql(
            "$query",
            DownloadFormat::XML,
            $reportSettingsOverride
        );

        $json = json_encode(
            simplexml_load_string($reportDownloadResult->getAsString())
        );

        $resultTable = json_decode($json, true)['table'];

        return $resultTable;

        if (array_key_exists('row', $resultTable)) {
            $row = $resultTable['row'];
            $row = count($row) > 1 ? $row : [$row];
            return collect($row);
        }

        return collect([]);

    }



}
