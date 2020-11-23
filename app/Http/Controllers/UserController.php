<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Support\Facades\Log;

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

    public function users()
    {
        $records = User::whereRole('user')->get();
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
        Log::info($record->account_id);
        if ($record->account_id) {
            $newFolder = realpath(base_path('adsapi_php')) . "/$record->account_id";
            if (!file_exists($newFolder)) {
                mkdir($newFolder, 0777, true);
                copy(realpath(base_path('adsapi_php.ini')), $newFolder . '/adsapi_php.ini');
                $content = file_get_contents($newFolder . '/adsapi_php.ini');
                $content = str_replace('$clientCustomerId', $record->account_id, $content);
                file_put_contents($newFolder . '/adsapi_php.ini', $content);
            }
        }

        $record->save();
        return [
            'success' => true,
            'message' => ($id) ? 'Usuario editado con éxito' : 'Usuario registrado con éxito',
        ];

    }

    public function prueba($account_id)
    {
        Log::info($account_id);
        $newFolder = rtrim(realpath(base_path('adsapi_php')) . "\\$account_id", '\\/');
        if (!file_exists($newFolder)) {
            mkdir($newFolder, 0777, true);
            copy(realpath(base_path('adsapi_php.ini')), $newFolder . '\adsapi_php.ini');
            $content = file_get_contents($newFolder . '\adsapi_php.ini');
            $content = str_replace('$clientCustomerId', $account_id, $content);
            file_put_contents($newFolder . '\adsapi_php.ini', $content);
        }
        return "holi";
    }

    public function activate($id)
    {
        $record = User::find($id);
        $record->active = true;

        $record->save();
        return [
            'success' => true,
            'message' => 'Usuario activado con éxito',
        ];

    }

    public function deactivate($id)
    {
        $record = User::find($id);
        $record->active = false;
        $record->save();
        return [
            'success' => true,
            'message' => 'Usuario desactivado con éxito',
        ];

    }

    public function setAccountId($id, $account_id)
    {
        $record = User::find($id);
        $record->account_id = $account_id;
        $record->save();
        return [
            'success' => true,
            'message' => 'Usuario account id actualizado con éxito',
        ];

    }
}
