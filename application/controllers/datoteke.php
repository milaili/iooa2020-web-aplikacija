<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
class Datoteke extends CI_Controller {
 
	function __construct() {
	parent::__construct();
	$this->load->helper('form');
        $this->load->model('Datoteka_model');
        $this->load->database();
	}
	public function upload($obaveza_id){
	 //$this->load->view('datoteke/dodaj_datoteku');
            $data['main_content'] = 'datoteke/dodaj_datoteku';
            $this->load->view('layouts/main',$data);  
          
	}
       public function upload_datoteke($obaveza_id = null){
           $config['upload_path'] = './uploads/datoteke';
		$config['allowed_types'] = '*';
		$this->load->library('upload', $config);
		$this->upload->do_upload('naziv_datoteke');
		$naziv_datoteke = $this->upload->data();
                $data = array(
                    'naziv_datoteke' => $naziv_datoteke['file_name'],
                     'idObaveze'      => $obaveza_id
                        );
               
		$this->Datoteka_model->Upload_datoteke($data);
    
                redirect('obaveze/prikaz/'.$obaveza_id.'');
                   
           }
      // }
	//}
    
        
           
           
           
           
           
           
           
       
    
    public function index(){
        $data = array();
        
        //get files from database
        $data['datoteke'] = $this->Datoteka_model->getRows();
        
        //load the view
        $this->load->view('datoteke/index', $data);
    }
    
    public function download($idDatoteke){
        if(!empty($idDatoteke)){
            //load download helper
            $this->load->helper('download');
            
            //get file info from database
            $fileInfo = $this->Datoteka_model->getRows(array('idDatoteke' => $idDatoteke));
            
            //file path
            $datoteka = 'uploads/datoteke/'.$fileInfo['naziv_datoteke'];
            
            //download file from directory
            force_download($datoteka, NULL);
        }
    }



        
  
        
}
?>