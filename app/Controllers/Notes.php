<?php
namespace App\Controllers;
use App\Models\NotesModel;


class Notes extends BaseController{
    protected $session;

    function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index(){

        $notesModel = new NotesModel();
        $data['notes'] = $notesModel->orderBy('id', 'DESC')->findAll();

        if(isset($this->session->userId))
        {
            return view('Notelist', $data);
        }
        else
        {
            return $this->response->redirect(site_url('/login'));
        }   
    }

    public function addNote(){
        $notesModel = new NotesModel();
        $data = [

            'title' => $this->request->getVar('title'),
            'note'  => $this->request->getVar('note'),
        ];
        $notesModel->insert($data);
        return $this->response->redirect(site_url('/user'));
        
    }

    public function notelist(){
        $notesModel = new NotesModel();
        $data['notes'] = $notesModel->orderBy('title', 'DESC')->findAll();   
            return view('Notelist', $data);        
          
    }
}

?>