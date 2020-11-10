<?php

namespace App\Http\Controllers;

use App\Http\Resources\CampaignCollection;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{

    public function index()
    {
        return view('campaigns.index');
    }

    public function records(Request $request)
    {
        $records = Campaign::whereNotNull("campaign_id")->whereActive(true)->get();
        return new CampaignCollection($records);
        // $records = GoogleAdsReport::getCampaignsPerformance();
        // return new CampaignCollection($records);
        // return $records;
        // return new CampaignPerformanceCollection($records);
    }

    public function recordsByUser($id)
    {
        $records = Campaign::whereNotNull("campaign_id")->whereUser_id($id)->get();
        return new CampaignCollection($records);
        // return Campaign::all();
        // $records = GoogleAdsReport::getCampaignsPerformance();
        // return new CampaignCollection($records);
        // return $records;
        // return new CampaignPerformanceCollection($records);
    }
}
