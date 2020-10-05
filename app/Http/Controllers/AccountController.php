<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class AccountController extends Controller
{

    public function index()
    {
        return view('account.index');
    }


}
