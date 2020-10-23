<?php

namespace App\Http\Controllers;

use App\Http\Requests\KeywordRequest;
use App\Models\Keyword;

class KeywordController extends Controller
{
    //
    public function store(KeywordRequest $request)
    {
        $id = $request->input('id');
        $record = Keyword::firstOrNew(['id' => $id]);
        $record->fill($request->all());
        $record->save();

        return [
            'success' => true,
            'record' => $record,
            'message' => ($id) ? 'Palabra editada con éxito' : 'Palabra registrada con éxito',
        ];

    }
}
