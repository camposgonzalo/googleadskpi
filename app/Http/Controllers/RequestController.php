<?php

namespace App\Http\Controllers;

use App\Helpers\GoogleAdsData;
use App\Http\Requests\RequestRequest;
use App\Http\Resources\GroupResource;
use App\Models\Request;

class RequestController extends Controller
{
    //
    public function index()
    {
        return view('requests.index');
    }

    public function create($level)
    {
        return view('requests.create', compact('level'));
    }

    public function edit($id)
    {
        return view('requests.edit', compact('id'));
    }

    public function modify($id)
    {
        return view('requests.modify', compact('id'));
    }

    public function records()
    {
        $records = Request::with('user')->get();
        return $records;
    }

    public function groups()
    {
        $records = GoogleAdsData::getGroups();
        return GroupResource::collection($records);
    }

    public function recordsByUser($id)
    {
        $records = Request::whereUser_id($id)->with('user')->get();
        return $records;
    }

    public function record($id)
    {
        $record = Request::with('ad', 'campaign', 'keyword', 'user')->find($id);
        return $record;
    }

    public function store(RequestRequest $request)
    {
        $id = $request->input('id');
        $record = Request::firstOrNew(['id' => $id]);
        $record->fill($request->all());
        $record->save();
        return [
            'success' => true,
            'message' => ($id) ? 'Solicitud editada con éxito' : 'Solicitud registrada con éxito',
        ];

    }
}
