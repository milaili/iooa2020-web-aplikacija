<?php

class Aktivnosti2 extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('datatables'); //load library ignited-dataTable
        $this->load->model('aktivnosti_model'); //load model aktivnosti_model
    }

    function index() {
        $this->load->helper('form');
        $this->load->helper('url');
        $korisnik_id = $this->session->userdata('korisnik_id');
        $data['vrsta'] = $this->aktivnosti_model->get_vrsta($korisnik_id);
        $data['main_content'] = 'aktivnosti/aktivnost_view';
        $this->load->view('layouts/main', $data);
    }

    function get_aktivnost_json() { //get aktivnost data u JSON objektu
        $korisnik_id = $this->session->userdata('korisnik_id');
        header('Content-Type: application/json');
        echo $this->aktivnosti_model->get_sve_aktivnosti($korisnik_id);
    }

    function save() { //insert metoda
        $datum_aktivnosti = $this->input->post('datum_aktivnosti', TRUE);
        $trajanje_aktivnosti = $this->input->post('trajanje_aktivnosti', TRUE);
        $komentar_aktivnosti = $this->input->post('komentar_aktivnosti', TRUE);
        $id_vrste_aktivnosti = $this->input->post('vrsta', TRUE);
        $korisnik_id = $this->session->userdata('korisnik_id');

        $this->aktivnosti_model->insert_aktivnost($datum_aktivnosti, $trajanje_aktivnosti, $komentar_aktivnosti, $id_vrste_aktivnosti, $korisnik_id);
        redirect('aktivnosti2');
    }

    function update() { //update metoda
        $this->aktivnosti_model->update_aktivnost();
        redirect('aktivnosti2');
    }

    function delete() { //delete metoda
        $this->aktivnosti_model->delete_aktivnost();
        redirect('aktivnosti2');
    }

    public function skeyword() {
        $this->form_validation->set_rules('datum_aktivnosti1', 'datum_aktivnosti1', 'trim|required');
        $this->form_validation->set_rules('datum_aktivnosti2', 'datum_aktivnosti2', 'trim|required');
        $this->form_validation->set_rules('id_vrste_aktivnosti', 'id_vrste_aktivnosti', 'trim|required');

        if ($this->form_validation->run() == FALSE) {

            $korisnik_id = $this->session->userdata('korisnik_id');
            $data['vrsta'] = $this->aktivnosti_model->get_vrsta($korisnik_id);
            $data['main_content'] = 'aktivnosti/aktivnost_view';
            $this->load->view('layouts/main', $data);
        } else {
            $korisnik_id = $this->session->userdata('korisnik_id');
            $min = $this->input->post('datum_aktivnosti1');
            $max = $this->input->post('datum_aktivnosti2');
            $id_vrste_aktivnosti = $this->input->post('id_vrste_aktivnosti');
            $data['aktivnosti'] = $this->aktivnosti_model->search($korisnik_id, $min, $max, $id_vrste_aktivnosti);
            $data['ukupno'] = $this->aktivnosti_model->trajanje($korisnik_id, $min, $max, $id_vrste_aktivnosti);

            $data['main_content'] = 'aktivnosti/skeyview';
            $this->load->view('layouts/main', $data);
        }
    }

}
