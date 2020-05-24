<?php
class Korisnici extends CI_Controller{

	
	public function index(){
        
        $korisnik_id = $this->session->userdata('korisnik_id');
        $data['korisnici'] = $this->Korisnik_model->get_korisnik($korisnik_id);
        $data['main_content'] = 'korisnici/index';
		$this->load->view('layouts/main',$data);

    }
    public function prikaz($korisnik_id){
        $data['korisnik'] = $this->Korisnik_model->get_korisnik($korisnik_id);
 
        $data['main_content'] = 'korisnici/prikaz';
        $this->load->view('layouts/main',$data);
     }
        
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
                     
               $this->session->set_flashdata('msg', 'Uspješno ste se prijavili');
               redirect('pocetna/index');
            } else {
                $this->session->set_flashdata('msg', '*Pogrešan unos korisničog imena ili lozinke. Pokušajte opet!*');
                redirect('pocetna/index');
            }
        }
    }
    
    
    public function logout(){
        $this->session->unset_userdata('logged_in');
        $this->session->unset_userdata('korisnik_id');
        $this->session->unset_userdata('username');
        $this->session->sess_destroy();
        
        $this->session->set_flashdata('msg', 'Uspješno ste se odjavili');
        redirect('pocetna/index');
    }


	public function izmjena ($korisnik_id){
		$this->form_validation->set_rules('ime_korisnika','Ime_korisnika','trim|required');
		$this->form_validation->set_rules('prezime_korisnika','Prezime_korisnika','trim|required');
		$this->form_validation->set_rules('email_korisnika','Email_korisnika','trim|required');
		$this->form_validation->set_rules('korisnicko_ime','Korisnicko_ime','trim|required');
	//	$this->form_validation->set_rules('lozinka','Lozinka','trim|required');
        
        if($this->form_validation->run() == FALSE){
            $data['korisnik'] = $this->Korisnik_model->get_korisnik($korisnik_id);
            $data['main_content'] = 'korisnici/index';
            $this->load->view('layouts/main',$data);  
        } else {

            $data = array(             
				'ime_korisnika'  => $this->input->post('ime_korisnika'),
				'prezime_korisnika'  => $this->input->post('prezime_korisnika'),
				'email_korisnika'  => $this->input->post('email_korisnika'),
				'korisnicko_ime'  => $this->input->post('korisnicko_ime'),
				//'lozinka'  => $this->input->post('lozinka'),

            );
           if($this->Korisnik_model->izmijeni_korisnika($korisnik_id,$data)){      
                $this->session->set_flashdata('korisnik_izmijenjen', 'Vaši podaci su uspješno izmijenjeni');
                redirect('korisnici/index');
           }
        }
	}
	
        public function brisanje($korisnik_id){      
            $this->Korisnik_model->obrisi_korisnika($korisnik_id);
            $this->session->set_flashdata('korisnik_obrisan', 'Vaši profil je obrisan!');        
            redirect('korisnici/index');
     }
}
