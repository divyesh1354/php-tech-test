<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $data['headTitle'] = "Users";
        $data['module'] = "users";
        return view('layout/app', compact('data'));
    }
}
