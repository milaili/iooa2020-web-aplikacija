<?php

class Vrste extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('need_login', 'Morate se prijaviti');
            redirect('pocetna/index');
        }
    }S

    public function index() {

        $korisnik_id = $this->session->userdata('korisnik_id');
        $data['vrste'] = $this->Vrsta_model->get_vrste($korisnik_id);
        $data['main_content'] = 'vrste/index';
        $this->load->view('layouts/main', $data);
    }

    public function prikaz($id_vrste_aktivnosti) {
        $data['vrsta'] = $this->Vrsta_model->get_vrsta($id_vrste_aktivnosti);
        $data['main_content'] = 'vrste/prikaz';
        $this->load->view('layouts/main', $data);
    }

    public function unos() {

        $this->form_validation->set_rules('naziv_vrste_aktivnosti', 'Naziv', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $data['main_content'] = 'vrste/dodaj_vrstu';
            $this->load->view('layouts/main', $data);
        } else {

            $data = array(
                'naziv_vrste_aktivnosti' => $this->input->post('naziv_vrste_aktivnosti'),
                'id_korisnika' => $this->session->userdata('korisnik_id')
            );
            if ($this->Vrsta_model->kreiraj_vrstu($data)) {
                $this->session->set_flashdata('msg', '<div class="alert alert-success">Dodali ste novu vrstu aktivnosti</div>');
                redirect('vrste/unos');
            }
        }
    }

    public function izmjena($id_vrste_aktivnosti) {
        $this->form_validation->set_rules('naziv_vrste_aktivnosti', 'Naziv', 'trim|required');


        if ($this->form_validation->run() == FALSE) {
            $data['ova_vrsta'] = $this->Vrsta_model->get_vrsta_data($id_vrste_aktivnosti);
            $data['main_content'] = 'vrste/izmijeni_obrisi_vrstu';
            $this->load->view('layouts/main', $data);
        } else {

            $data = array(
                'naziv_vrste_aktivnosti' => $this->input->post('naziv_vrste_aktivnosti'),
            );
            if ($this->Vrsta_model->izmijeni_vrstu($id_vrste_aktivnosti, $data)) {
                $this->session->set_flashdata('vrsta_izmijenjena', 'Vrsta aktivnosti je uspješno izmijenjena');
                redirect('vrste/index');
            }
        }
    }

    public function brisanje($id_vrste_aktivnosti) {
        $this->Vrsta_model->obrisi_vrstu($id_vrste_aktivnosti);
        $this->session->set_flashdata('vrsta_obrisana', 'Vrsta aktivnosti je obrisana!');
        redirect('vrste/index');
    }

}
