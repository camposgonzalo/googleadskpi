<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Helpers\GoogleAdsReport;
use App\Http\Resources\CampaignPerformanceCollection;


class DashboardController extends Controller
{

    public function index()
    {
        return view('campaigns.index');
    }

    public function records(Request $request)
    {
        $records = GoogleAdsReport::getCampaignPerformance();
        return $records;
        return new CampaignPerformanceCollection($records);
    }
}
