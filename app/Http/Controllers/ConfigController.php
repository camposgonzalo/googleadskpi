<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Config;

class ConfigController extends Controller
{
    //
    public function set($id)
    {
        // config(['app.clientCustomerId' => $id]);
        Config::set('app.clientCustomerId', $id);
        return config('app.clientCustomerId');

    }

    public function get()
    {
        return config('app.clientCustomerId');
    }
}
