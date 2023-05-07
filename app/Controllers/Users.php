<?php

namespace App\Controllers;

use App\Models\UserModel;
use Config\Services;
use \Hermawan\DataTables\DataTable;

class Users extends BaseController
{
    public function index()
    {
        $data['headTitle'] = "Users";
        $data['module'] = "users/index";
        return view('layout/app', compact('data'));
    }

    public function lists()
	{
        $userModel = new UserModel();
        $userModel->select('id, first_name, last_name, email, mobile, username, is_active')->where('deleted_at IS NULL');

        return DataTable::of($userModel)
            ->edit('is_active', function($row) {
                if ($row->is_active) {
                    return '<span class="badge badge-success badge-pill">Active</span>';
                } else {
                    return '<span class="badge badge-danger badge-pill">Inactive</span>';
                }
            })
            ->add('action', function($row) {
                $viewURL = base_url('users/view/' . $row->id);
                $editURL = base_url('users/edit/' . $row->id);
                $deleteURL = base_url('users/delete/' . $row->id);

                return '<a href="'.$viewURL.'" class="btn btn-xs btn-info waves-effect waves-themed mr-1">View</a><a href="'.$editURL.'" class="btn btn-xs btn-warning waves-effect waves-themed mr-1">Edit</a><a href="'.$deleteURL.'" class="btn btn-xs btn-danger waves-effect waves-themed mr-1">Delete</a>';
            }, 'last')->toJson();
	}

    public function create()
    {
        $data['headTitle'] = "Users";
        $data['module'] = "users/create";
        return view('layout/app', compact('data'));
    }

    public function store()
    {
        $data = [
            'first_name' => $this->request->getVar('first_name'),
            'last_name' => $this->request->getVar('last_name'),
            'email' => $this->request->getVar('email'),
            'mobile' => $this->request->getVar('mobile'),
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT)
        ];
        $model = new UserModel();
        $model->save($data);

        $session = Services::session();
        $session->setFlashdata('success', 'User Data Added');

        return $this->response->redirect(base_url('/users/create'));
    }

    public function show($id)
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->where('id', $id)->first();
        $data['headTitle'] = "Users";
        $data['module'] = "users/view";
        return view('layout/app', compact('data'));
    }
    
    public function edit($id)
    {
        $userModel = new UserModel();
        $data['user'] = $userModel->where('id', $id)->first();
        $data['headTitle'] = "Users";
        $data['module'] = "users/edit";
        return view('layout/app', compact('data'));
    }

    public function update()
    {
        $data = [
            'first_name' => $this->request->getVar('first_name'),
            'last_name' => $this->request->getVar('last_name'),
            'email' => $this->request->getVar('email'),
            'mobile' => $this->request->getVar('mobile'),
            'username' => $this->request->getVar('username')
        ];

        $userModel = new UserModel();
        $id = $this->request->getVar('user_id');
        $save = $userModel->update($id, $data);

        $session = Services::session();
        $session->setFlashdata('success', 'User Data Updated');

        return $this->response->redirect(base_url('/users/edit/'.$id));
    }
    
    public function delete($id)
    { 
        $userModel = new UserModel();
        $userModel->where('id', $id)->delete($id);

        $data['headTitle'] = "Users";
        $data['module'] = "users/index";
        return view('layout/app', compact('data'));
    }
}
