<?php
namespace App\Controllers;

class User extends BaseController{
    public function index(){

        $data=[];
        helper(['form']);

        echo view('templates/header',$data);
        echo view('login');
        echo view('templates/footer');
    }

    public function create(){
        
        return view('user/create');
    }

}

?>