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
            'trash'=> false,
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
            'created'=> date('d-m-y h:i:s '),
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
            'created'=> date('d-m-y h:i:s '),
        ];
       $notesModel->update($update,$data);              
    }

    public function archiveList(){
        $notesModel = new NotesModel();
        $data = [
            'archive' => true,
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
            'created'=> date('d-m-y h:i:s '),
        ];
       $notesModel->update($update,$data);              
    }

    public function trashList(){
        $notesModel = new NotesModel();
        $data = [
            'trash' => true,
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
        'created'=> date('d-m-y h:i:s'),
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

    function upload() { 
        $notesModel = new NotesModel();

        helper(['form', 'url']);
                 
        $input = $this->validate([
            'file' => [
                'uploaded[file]',
                'mime_in[file,image/jpg,image/jpeg,image/png]',
                'max_size[file,1024]',
            ]
        ]);
    
        if (!$input) {
            print_r('Choose a valid file');
        } else {
            $img = $this->request->getFile('file');
            $img->move(WRITEPATH . 'uploads');
    
            $data = [
               'name' =>  $img->getName(),
               'type'  => $img->getClientMimeType()
            ];
    
            $save = $notesModel->insert($data);
            print_r('File has successfully uploaded');        
        }
    }

}

?>