<?php
namespace App\Controllers;
use App\Models\NotesModel;


class Notes extends BaseController{
    protected $session;

    function __construct()
    {
        $this->session = \Config\Services::session();
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
}

?>