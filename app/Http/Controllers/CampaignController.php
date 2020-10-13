<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Helpers\GoogleAdsData;
use App\Http\Resources\CampaignCollection;
use App\Http\Requests\CampaignRequest;
use App\Models\Campaign;


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

    public function create()
    {
        return view('campaigns.create');
    }

    public function records()
    {
        /*$records = GoogleAdsData::getCampaigns();
        return new CampaignCollection($records);*/
        $records = Campaign::all();
        return new CampaignCollection($records);

    }

    public function store(CampaignRequest $request)
    {
        $id = $request->input('id');
        $record = Campaign::firstOrNew(['id' => $id]);
        $record->fill($request->all());
        $record->save();

        return [
            'success' => true,
            'message' => ($id)?'Campaña editada con éxito':'Campaña registrada con éxito'
        ];

    }


}
