<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Helpers\GoogleAdsData;
use App\Http\Resources\CampaignCollection;

class CampaignController extends Controller
{

    public function index()
    {
        return view('campaigns.index');
    }

    public function records(Request $request)
    {
        $records = GoogleAdsData::getCampaigns();
        return new CampaignCollection($records);
    }
}
