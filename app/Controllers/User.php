<?php
namespace App\Controllers;

class User extends BaseController{
    public function index(){
        echo view ('user/list');
    }

    public function login(){
        $data=[];
        helper(['form']);

        echo view('templates/header',$data);
        echo view('login');
        echo view('templates/footer');
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