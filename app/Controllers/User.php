<?php
namespace App\Controllers;
use App\Models\UserModel;

class User extends BaseController{
    public function index(){
        $userModel = new UserModel();
        $data['user'] = $userModel->orderBy('id', 'DESC')->findAll();
        return view ('user/list');
    }

    public function login(){
        $data=[];
        helper(['form']);

        echo view('templates/header',$data);
        echo view('login');
        echo view('templates/footer');
    }

    public function store() {
        $userModel = new UserModel();
        $data = [
            
            'name' => $this->request->getVar('name'),
            'email'  => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
        ];
        $userModel->insert($data);
        return $this->response->redirect(site_url('/login'));
    }

    public function register(){
        $data=[];
        helper(['form']);

        echo view('templates/header',$data);
        echo view('register');
        echo view('templates/footer');

    }
    

    public function create(){
        
        return view('user/create');
    }

}

?>