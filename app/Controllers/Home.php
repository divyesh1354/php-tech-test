<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['headTitle'] = "Dashoard";
        $data['module'] = "dashboard";
        return view('layout/app', compact('data'));
    }
}
