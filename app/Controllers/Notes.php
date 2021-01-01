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
       echo $notesModel->insert($data);
        
    }

    public function notelist(){
        $notesModel = new NotesModel();
        $data = [

            'archive' => false,
        ];

        $data['notes'] = $notesModel->where($data)->findAll();   
            return view('Notelist', $data);        
          
    }

    public function archive(){
        $notesModel = new NotesModel();
        $id = $this->request->getVar('noteid');
        $update = [
            'id' => $this->request->getVar('noteid'),
        ];
        $data = [
            'archive' => true,
            'created'=> date('d-m-Y h:i:s A'),
        ];
       $notesModel->update($update,$data);              
    }

    public function unarchive(){
        $notesModel = new NotesModel();
        $id = $this->request->getVar('noteid');
        $update = [
            'id' => $this->request->getVar('noteid'),
        ];
        $data = [
            'archive' => false,
            'created'=> date('d-m-Y h:i:s A'),
        ];
       $notesModel->update($update,$data);              
    }

    public function archiveList(){
        $notesModel = new NotesModel();
        $data = [
            'archive' => true,
            'created'=>date("d-m-Y h:i:s A")
        ];

        $data['notes'] = $notesModel->where($data)->findAll();   
            return view('Notelist', $data);                  
    }

    public function archieve(){
         return view('Archive');
    }

    public function trash(){
        $notesModel = new NotesModel();
        $id = $this->request->getVar('noteid');
        $update = [
            'id' => $this->request->getVar('noteid'),
        ];
        $data = [
            'trash' => true,
            'created'=> date('d-m-Y h:i:s A'),
        ];
       $notesModel->update($update,$data);              
    }

    public function trashList(){
        $notesModel = new NotesModel();
        $data = [
            'trash' => true,
            'created'=>date("d-m-Y h:i:s A")
        ];

        $data['notes'] = $notesModel->where($data)->findAll();   
            return view('Notelist', $data);                  
    }

    public function trashview(){
        return view('trash');
   }

   public function restore(){
    $notesModel = new NotesModel();
    $id = $this->request->getVar('noteid');
    $update = [
        'id' => $this->request->getVar('noteid'),
    ];
    $data = [
        'trash' => false,
        'created'=> date('d-m-Y h:i:s A'),
    ];
   $notesModel->update($update,$data);              
}
    
    public function singleNote(){
        $notesModel = new NotesModel();
        $data['notes'] = $notesModel->where('id',$this->request->getVar('noteid'))->findAll();   
            return view('Notelist', $data);        
          
    }

    public function editNote(){

        $notesModel = new NotesModel();
        $id = $this->request->getVar('noteid');
        $update = [
            'id' => $this->request->getVar('noteid'),
        ];
        $data = [
            'title' => $this->request->getVar('title'),
            'note'  => $this->request->getVar('note'),
        ];
        $notesModel->update($update, $data);

        $data['notes'] = $notesModel->where('id', $id)->findAll();
        return view('Updatedlist',$data);
    }

    public function deleteNote(){
        $notesModel = new NotesModel();
        $id = $this->request->getVar('noteid');
        $delete = [
            'id' => $this->request->getVar('noteid'),
        ];
        
        $data['note'] = $notesModel->where($delete)->delete();
        return $this->response->redirect(site_url('/notelist'));
       
    }


}

?>