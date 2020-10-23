<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    //
    public function index()
    {
        return view('users.index');
    }

    public function records()
    {
        $records = User::all();
        return $records;
    }
}
