<?php

namespace App\Http\Controllers;

use App\Helpers\GoogleAdsReport;
use App\Http\Requests\CampaignRequest;
use App\Http\Resources\AdPerformanceResource;
use App\Http\Resources\CampaignCollection;
use App\Http\Resources\CampaignResource;
use App\Http\Resources\KeywordPerformanceResource;
use App\Http\Resources\SearchTermPerformanceResource;
use App\Models\Campaign;
use Illuminate\Routing\Controller;

class CampaignController extends Controller
{

    public function index()
    {
        return view('campaigns.index');
    }

    public function information($id)
    {
        return view('campaigns.information', compact('id'));
    }

    public function configuration($id)
    {
        return view('campaigns.configuration', compact('id'));
    }

    public function details($id)
    {
        return view('campaigns.details', compact('id'));
    }

    public function create()
    {
        return view('campaigns.create');
    }

    public function googleRecords()
    {
        $records = GoogleAdsReport::getCampaignsPerformance();
        return CampaignResource::collection($records);
    }

    public function records()
    {
        // $records = Campaign::all();
        // return $records;
        $records = Campaign::with('user')->whereNotNull("campaign_id")->get();
        return new CampaignCollection($records);
    }

    public function localRecords()
    {
        $records = Campaign::all();
        return $records;
    }

    public function recordsByUser($id)
    {
        $records = Campaign::whereNotNull("campaign_id")->whereUser_id($id)->get();
        return new CampaignCollection($records);
    }

    public function localRecordsByUser($id)
    {
        $records = Campaign::whereUser_id($id)->get();
        return $records;
    }

    public function recordApi($id, $startDate = null, $endDate = null)
    {
        $record = GoogleAdsReport::getCampaignPerformance($id, $startDate, $endDate);
        return CampaignResource::make($record);
        // $record = Campaign::with('user')->find($id);
        // return CampaignResource::make($record);
    }

    // public function recordApiInPeriod($id, $startDate, $endDate)
    // {
    //     $record = GoogleAdsReport::getCampaignPerformancePerPeriod($id, $startDate, $endDate);
    //     return CampaignResource::make($record);
    // }

    public function record($id)
    {
        return Campaign::whereCampaign_id($id)->first();
    }

    public function ads($id, $startDate = null, $endDate = null)
    {
        $records = GoogleAdsReport::getAdPerformanceByCampaignId($id, $startDate, $endDate);
        return AdPerformanceResource::collection($records);
    }

    // public function adsInPeriod($id, $startDate, $endDate)
    // {
    //     $records = GoogleAdsReport::getAdPerformanceInPeriodByCampaignId($id, $startDate, $endDate);
    //     return AdPerformanceResource::collection($records);
    // }

    public function keywords($id, $startDate = null, $endDate = null)
    {
        $records = GoogleAdsReport::getKeywordsPerformance($id, $startDate, $endDate);
        return KeywordPerformanceResource::collection($records);
    }

    // public function keywordsInPeriod($id, $startDate = null, $endDate = null)
    // {
    //     $records = GoogleAdsReport::getKeywordsInPeriodPerformance($id, $startDate, $endDate);
    //     return KeywordPerformanceResource::collection($records);
    // }

    public function searchTerms($id, $startDate = null, $endDate = null)
    {
        $records = GoogleAdsReport::getSearchTermPerformanceByCampaignId($id, $startDate, $endDate);
        return SearchTermPerformanceResource::collection($records);
    }

    // public function searchTermsInPeriod($id, $startDate, $endDate)
    // {
    //     $records = GoogleAdsReport::getSearchTermPerformanceInPeriodByCampaignId($id, $startDate, $endDate);
    //     return SearchTermPerformanceResource::collection($records);
    // }

    public function store(CampaignRequest $request)
    {
        $id = $request->input('id');
        $record = Campaign::firstOrNew(['id' => $id]);
        $record->fill($request->all());
        $record->save();

        return [
            'success' => true,
            'record' => $record,
            'message' => ($id) ? 'Campaña editada con éxito' : 'Campaña registrada con éxito',
        ];

    }

    public function activate($id)
    {
        $record = Campaign::find($id);
        $record->active = true;
        $record->save();
        return [
            'success' => true,
            'message' => 'Campaña activada con éxito',
        ];

    }

    public function deactivate($id)
    {
        $record = Campaign::find($id);
        $record->active = false;
        $record->save();
        return [
            'success' => true,
            'message' => 'Campaña desactivada con éxito',
        ];

    }

}
