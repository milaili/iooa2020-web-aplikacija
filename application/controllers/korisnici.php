<?php
class Korisnici extends CI_Controller{
    
    public function registracija(){
        if($this->session->userdata('logged_in')){
            redirect('home/index');
        }
        $this->form_validation->set_rules('ime','Ime','trim|required');
        $this->form_validation->set_rules('prezime','Prezime','trim|required');
        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('username','Korisničko ime','trim|required|min_length[3]');      
        $this->form_validation->set_rules('password','Lozinka','trim|required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('password2','Potvrda Lozinke','trim|required|matches[password]');
        
        if($this->form_validation->run() == FALSE){
            $data['main_content'] = 'korisnici/registracija';
            $this->load->view('layouts/main',$data);  
        } else {
           if($this->Korisnik_model->kreiraj_korisnika()){
                $this->session->set_flashdata('registracija', 'Uspješno ste se registrirali');
                redirect('pocetna/index');
           }
        }
    }
    
    
    public function login(){
        $this->form_validation->set_rules('username','Korisničko ime','trim|required|min_length[4]');      
        $this->form_validation->set_rules('password','Lozinka','trim|required|min_length[4]|max_length[50]');        
        
        if($this->form_validation->run() == FALSE){

			$data['main_content'] = 'korisnici/login';
        
			$this->load->view('layouts/main', $data);

            $this->session->set_flashdata('login_failed', 'Pogrešan unos korisničog imena ili lozinke. Pokušajte opet.');
            redirect('pocetna/index');
        } else {
           $username = $this->input->post('username');
           $password = $this->input->post('password');
               
           $korisnik_id = $this->Korisnik_model->login_korisnik($username,$password);
               

           if($korisnik_id){
               $korisnicki_podaci = array(
                       'korisnik_id'   => $korisnik_id,
                       'username'  => $username,
                       'logged_in' => true
                );
               $this->session->set_userdata($korisnicki_podaci);
                     
               $this->session->set_flashdata('login_success', 'Uspješno ste se prijavili');
               redirect('pocetna/index');
            } else {
                $this->session->set_flashdata('login_failed', 'Pogrešan unos korisničog imena ili lozinke. Pokušajte opet');
                redirect('pocetna/index');
            }
        }
    }
    
    
    public function logout(){
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('korisnik_id');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        
        $this->session->set_flashdata('logged_out', 'Uspješno ste se odjavili');
        redirect('pocetna/index');
    }
    
    
}
