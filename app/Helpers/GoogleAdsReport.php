<?php

namespace App\Helpers;

use App\Helpers\GoogleAdsSession;
use Google\AdsApi\AdWords\Query\v201809\ReportQueryBuilder;
use Google\AdsApi\AdWords\Reporting\v201809\DownloadFormat;
use Google\AdsApi\AdWords\Reporting\v201809\ReportDownloader;
use Google\AdsApi\AdWords\ReportSettingsBuilder;
use Google\AdsApi\AdWords\v201809\cm\ReportDefinitionReportType;

class GoogleAdsReport
{
    public static function getCampaignsPerformance()
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
                'AverageTimeOnSite',
                'CrossDeviceConversions',
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
        if (array_key_exists('row', $array)) {
            return collect($array['row']);
        } else {
            return collect([]);
        }
    }

    public static function getCampaignPerformance($id)
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
                'AverageTimeOnSite',
                'CrossDeviceConversions',
                'StartDate',
                'EndDate',
                'Labels',
            ])
            ->from(ReportDefinitionReportType::CAMPAIGN_PERFORMANCE_REPORT)
            ->where('CampaignId')->in([$id])
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
        if (array_key_exists('row', $array)) {
            return collect($array['row']);
        } else {
            return collect([]);
        }
    }

    public static function getKeywordsPerformance($id)
    {
        $session = GoogleAdsSession::getSession();
        $query = (new ReportQueryBuilder())
            ->select([
                'AdGroupName',
                'Clicks',
                'Impressions',
                'Ctr',
                'Cost',
                'AccountCurrencyCode',
                'Id',
                'AdGroupId',
                'IsNegative',
            ])
            ->from(ReportDefinitionReportType::KEYWORDS_PERFORMANCE_REPORT)
            ->where('CampaignId')->in([$id])
            ->where("IsNegative")->in(["true", "false"])
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
        if (array_key_exists('row', $array)) {
            return collect($array['row']);
        } else {
            return collect([]);
        }
    }

    public static function getKeywordsInPeriodPerformance($id, $startDate, $endDate)
    {
        $session = GoogleAdsSession::getSession();
        $query = (new ReportQueryBuilder())
            ->select([
                'AdGroupName',
                'Clicks',
                'Impressions',
                'Ctr',
                'Cost',
                'AccountCurrencyCode',
                'Id',
                'AdGroupId',
                'IsNegative',
            ])
            ->from(ReportDefinitionReportType::KEYWORDS_PERFORMANCE_REPORT)
            ->where('CampaignId')->in([$id])
            ->where("IsNegative")->in(["true", "false"])
            ->during($startDate, $endDate)
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
        if (array_key_exists('row', $array)) {
            return collect($array['row']);
        } else {
            return collect([]);
        }
    }

    public static function getAdPerformanceByCampaignId($id)
    {
        $session = GoogleAdsSession::getSession();
        $query = (new ReportQueryBuilder())
            ->select([
                'Status',
                'Headline',
                'HeadlinePart1',
                'AdGroupName',
                'Clicks',
                'Impressions',
                'Ctr',
                'Cost',
                'AccountCurrencyCode',
                'HeadlinePart1',
                'HeadlinePart2',
            ])
            ->from(ReportDefinitionReportType::AD_PERFORMANCE_REPORT)
            ->where('CampaignId')->in([$id])
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
        if (array_key_exists('row', $array)) {
            return collect($array['row']);
        } else {
            return collect([]);
        }
    }

    public static function getAdPerformanceInPeriodByCampaignId($id, $startDate, $endDate)
    {
        $session = GoogleAdsSession::getSession();
        $query = (new ReportQueryBuilder())
            ->select([
                'Status',
                'Headline',
                'HeadlinePart1',
                'AdGroupName',
                'Clicks',
                'Impressions',
                'Ctr',
                'Cost',
                'AccountCurrencyCode',
                'HeadlinePart1',
                'HeadlinePart2',
            ])
            ->from(ReportDefinitionReportType::AD_PERFORMANCE_REPORT)
            ->where('CampaignId')->in([$id])
            ->during($startDate, $endDate)
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
        if (array_key_exists('row', $array)) {
            return collect($array['row']);
        } else {
            return collect([]);
        }
    }

    public static function getSearchTermPerformanceByCampaignId($id)
    {
        $session = GoogleAdsSession::getSession();
        $query = (new ReportQueryBuilder())
            ->select([
                'AdGroupName',
                'Clicks',
                'Impressions',
                'Ctr',
                'Cost',
                'AccountCurrencyCode',
                'Query',
            ])
            ->from(ReportDefinitionReportType::SEARCH_QUERY_PERFORMANCE_REPORT)
            ->where('CampaignId')->in([$id])
            ->build();

        $reportDownloader = new ReportDownloader($session);
        $reportSettingsOverride = (new ReportSettingsBuilder())
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

        if (array_key_exists('row', $array)) {
            return collect($array['row']);
        } else {
            return collect([]);
        }

    }

    public static function getSearchTermPerformanceInPeriodByCampaignId($id, $startDate, $endDate)
    {
        $session = GoogleAdsSession::getSession();
        $query = (new ReportQueryBuilder())
            ->select([
                'AdGroupName',
                'Clicks',
                'Impressions',
                'Ctr',
                'Cost',
                'AccountCurrencyCode',
                'Query',
            ])
            ->from(ReportDefinitionReportType::SEARCH_QUERY_PERFORMANCE_REPORT)
            ->where('CampaignId')->in([$id])
            ->during($startDate, $endDate)
            ->build();

        $reportDownloader = new ReportDownloader($session);
        $reportSettingsOverride = (new ReportSettingsBuilder())
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

        if (array_key_exists('row', $array)) {
            return collect($array['row']);
        } else {
            return collect([]);
        }

    }

    public static function getCampaignPerformancePerPeriod($id, $iniDate, $endDate)
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
                'AverageTimeOnSite',
                'CrossDeviceConversions',
                'StartDate',
                'EndDate',
                'Labels',
            ])
            ->from(ReportDefinitionReportType::CAMPAIGN_PERFORMANCE_REPORT)
            ->where('CampaignId')->in([$id])
            ->during($iniDate, $endDate)
            ->build();

        //

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
        if (array_key_exists('row', $array)) {
            return collect($array['row']);
        } else {
            return collect([]);
        }
    }

}
