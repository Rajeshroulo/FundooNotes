<?php
namespace App\Controllers;
use App\Models\UserModel;

class User extends BaseController{

    protected $session;

    function __construct()
    {
        $this->session = \Config\Services::session();
        $this->session->start();

    }
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

    public function userLogin(){
        $userModel = new UserModel();
        $data = [
            'password' => $this->request->getVar('password'),
            'email'  => $this->request->getVar('email'),
        ];

        if(!empty($users=$userModel->where($data)->first()))
        {
            $_SESSION['userId']=$users['id'];
            $_SESSION['userPassword']=$users['password'];
            $_SESSION['userEmail']=$users['email'];
            // $userId=$this->session->userId;
            return $this->response->redirect(site_url('/user'));
        }
        else{
            return $this->response->redirect(site_url('/login'));
        }

    }

    public function store() {
        $userModel = new UserModel();
        if(!empty($userModel->where('email',$this->request->getVar('email'))->first()))
        {
            return $this->response->redirect(site_url('/register'));   
        }
        else{
            $data = [

                'name' => $this->request->getVar('name'),
                'email'  => $this->request->getVar('email'),
                'password' => $this->request->getVar('password'),
            ];
            $userModel->insert($data);
            return $this->response->redirect(site_url('/login'));       
        }
    }

    public function register(){
        $data=[];
        helper(['form']);

        echo view('templates/header',$data);
        echo view('register');
        echo view('templates/footer');

    }
    
    public function create(){
         helper(['form']);
        
        return view('user/create');
    }    

}

?>