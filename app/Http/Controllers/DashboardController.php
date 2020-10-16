<?php

namespace App\Http\Controllers;

use App\Helpers\GoogleAdsReport;
use App\Http\Resources\CampaignCollection;
use App\Http\Resources\CampaignPerformanceCollection;
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
        $records = GoogleAdsReport::getCampaignsPerformance();
        return new CampaignCollection($records);
        return $records;
        return new CampaignPerformanceCollection($records);
    }
}
