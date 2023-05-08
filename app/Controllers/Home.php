<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $data['usersCount'] = $userModel->findAll();
        $data['headTitle'] = "Dashoard";
        $data['module'] = "dashboard";
        return view('layout/app', compact('data'));
    }
}
