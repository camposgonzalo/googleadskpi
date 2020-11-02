<?php

namespace App\Http\Controllers;

use App\Http\Requests\BillRequest;
use App\Models\Bill;

class BillingController extends Controller
{
    //
    public function index()
    {
        return view('billings.index');
    }

    public function details()
    {
        return view('billings.details');
    }

    public function store(BillRequest $request)
    {
        $id = $request->input('id');
        $record = Bill::firstOrNew(['id' => $id]);
        $record->fill($request->all());
        $record->save();

        return [
            'success' => true,
            'message' => ($id) ? 'Cargo editado con éxito' : 'Cargo registrado con éxito',
        ];
    }

    public function recordsGroupByUser()
    {
        $records = Bill::with('campaign', "user")->get()->groupBy('user_id');
        return $records;
    }

    public function recordsByUser($id)
    {
        $records = Bill::whereUser_id($id)->with('campaign', 'user')->get();
        return $records;
    }
}
