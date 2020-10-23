<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdRequest;
use App\Models\Ad;

class AdController extends Controller
{
    //
    public function store(AdRequest $request)
    {
        $id = $request->input('id');
        $record = Ad::firstOrNew(['id' => $id]);
        $record->fill($request->all());
        $record->save();

        return [
            'success' => true,
            'record' => $record,
            'message' => ($id) ? 'Anuncio editada con éxito' : 'Anuncio registrada con éxito',
        ];

    }
}
