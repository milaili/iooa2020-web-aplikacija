<?php
class Pocetna extends CI_Controller {
   public function index(){
        if($this->session->userdata('logged_in')){
            $korisnik_id = $this->session->userdata('korisnik_id');
              }
       
        $data['main_content'] = 'pocetna';
        $this->load->view('layouts/main',$data);
    }
  
}

