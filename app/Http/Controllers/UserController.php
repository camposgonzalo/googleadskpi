<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('users.index');
    }

    public function create()
    {
        return view('users.create');
    }

    public function records()
    {
        $records = User::all();
        return $records;
    }

    public function recordById($id)
    {
        $record = User::find($id);
        return $record;
    }

    public function store(UserRequest $request)
    {
        $request['password'] = bcrypt($request['password']);
        $id = $request->input('id');
        $record = User::firstOrNew(['id' => $id]);
        $record->fill($request->all());
        $record->save();
        return [
            'success' => true,
            'message' => ($id) ? 'Usuario editado con éxito' : 'Usuario registrado con éxito',
        ];

    }
}
