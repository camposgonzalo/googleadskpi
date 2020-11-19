<?php

namespace App\Http\Controllers;

class ConfigController extends Controller
{
    //
    public function set($id)
    {
        config(['app.clientCustomerId' => $id]);
        return config('app.clientCustomerId');
    }

    public function home2()
    {
        return config('app.clientCustomerId');
    }
}
