<?php
namespace App\Controllers;
use App\Models\LabelModel;


class Labels extends BaseController{
    protected $session;

    function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public function index(){

        $labelModel = new LabelModel();
        $data['labels'] = $labelModel->orderBy('id', 'DESC')->findAll();

        if(isset($this->session->userId))
        {
            return view('list', $data);
        }
        else
        {
            return $this->response->redirect(site_url('/login'));
        }   
    }

    public function addLabel(){
        $labelModel = new LabelModel();
        $data = [
            'userid'=> $this->session->userId,
            'labelname' => $this->request->getVar('title'),
        ];
       $id = $labelModel->insert($data); 
       
       $value=[
           'id'=>$id,
           'label'=>$this->request->getVar('title'),
       ];
     
       echo json_encode($value);       
    }

    public function labelList(){
        $labelModel = new LabelModel();
        $data['labels'] = $labelModel->where('userid', $this->session->userId)->findAll();

        if(isset($this->session->userId))
        {
            return view('Labellist', $data);
        }
        else
        {
            return $this->response->redirect(site_url('/login'));
        }   


    }

}
?>    