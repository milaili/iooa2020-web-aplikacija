<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aktivnosti extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Aktivnost_model', 'aktivnost_model');
        $this->load->library('session');

        if (!$this->session->userdata('logged_in')) {
            $this->session->set_flashdata('need_login', 'Morate se prijaviti');
            redirect('pocetna/index');
        }
    }

    public function index() {
        $this->load->helper('form');
        $this->load->helper('url');

        $korisnik_id = $this->session->userdata('korisnik_id');
        $data['aktivnosti'] = $this->Aktivnost_model->get_aktivnosti($korisnik_id);
        $data['vrsta_aktivnosti'] = $this->Aktivnost_model->get_vrste($korisnik_id)->result();
        $data['main_content'] = 'aktivnosti/index';
        $this->load->view('layouts/main', $data);
    }

    // Dodavanje aktivnosti
    function unos_aktivnosti() {
        $this->form_validation->set_rules('vrsta_aktivnosti', 'Vrsta', 'callback_validate_dropdown');
        $this->form_validation->set_rules('datum_aktivnosti', 'Datum', 'trim|required');
        $this->form_validation->set_rules('trajanje_aktivnosti', 'Trajanje', 'trim|required');
        $this->form_validation->set_rules('komentar_aktivnosti', 'Komentar', '');

        $korisnik_id = $this->session->userdata('korisnik_id');
        $data['vrsta_aktivnosti'] = $this->aktivnost_model->get_vrste($korisnik_id)->result();
        $data['main_content'] = 'aktivnosti/unos';
        $this->load->view('layouts/main', $data);
    }

    //Spremanje aktivnosti u bazu
    function spremi_aktivnost() {
        $datum_aktivnosti = $this->input->post('datum_aktivnosti', TRUE);
        $trajanje_aktivnosti = $this->input->post('trajanje_aktivnosti', TRUE);
        $komentar_aktivnosti = $this->input->post('komentar_aktivnosti', TRUE);
        $id_vrste_aktivnosti = $this->input->post('vrsta_aktivnosti', TRUE);
        $korisnik_id = $this->session->userdata('korisnik_id');
        $this->aktivnost_model->spremi_aktivnost($datum_aktivnosti, $trajanje_aktivnosti, $komentar_aktivnosti, $id_vrste_aktivnosti, $korisnik_id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Aktivnost je spremljena</div>');
        redirect('aktivnosti/unos_aktivnosti');

        function get_aktivnosti() {

            $id_vrste_aktivnosti = $this->input->post('id', TRUE);
            $data = $this->Aktivnost_model->get_aktivnosti_vrste($id_vrste_aktivnosti);
            $data['main_content'] = 'aktvinosti/index';
            $this->load->view('layouts/main', $data);
        }

    }

    function get_edit() {
        $korisnik_id = $this->session->userdata('korisnik_id');
        $id_aktivnosti = $this->uri->segment(3);
        $data['id_aktivnosti'] = $id_aktivnosti;
        $data['vrsta_aktivnosti'] = $this->aktivnost_model->get_vrste($korisnik_id);
        $get_data = $this->aktivnost_model->get_aktivnost_id($id_aktivnosti);
        if ($get_data->num_rows() > 0) {
            $row = $get_data->row_array();
        }

        $data['main_content'] = 'aktivnosti/izmjena';
        $this->load->view('layouts/main', $data);
    }

    function get_data_edit() {
        $id_aktivnosti = $this->input->post('id_aktivnosti', TRUE);
        $data = $this->aktivnost_model->get_aktivnost_id($id_aktivnosti)->result();
        echo json_encode($data);
    }

    //update aktivnosti u bazi
    function update_aktivnost() {
        $id_aktivnosti = $this->input->post('id_aktivnosti', TRUE);
        $datum_aktivnosti = $this->input->post('datum_aktivnosti', TRUE);
        $trajanje_aktivnosti = $this->input->post('trajanje_aktivnosti', TRUE);
        $komentar_aktivnosti = $this->input->post('komentar_aktivnosti', TRUE);
        $id_vrste_aktivnosti = $this->input->post('vrsta_aktivnosti', TRUE);
        $korisnik_id = $this->session->userdata('korisnik_id');

        $this->aktivnost_model->update_aktivnost($id_aktivnosti, $datum_aktivnosti, $trajanje_aktivnosti, $komentar_aktivnosti, $id_vrsta, $korisnik_id);
        $this->session->set_flashdata('msg', '<div class="alert alert-success">Product Updated</div>');
        redirect('aktivnosti');
    }

    public function brisanje($id_aktivnosti) {
        $this->Aktivnost_model->obrisi_aktivnost($id_aktivnosti);
        $this->session->set_flashdata('aktivnost_obrisana', 'Aktivnosti je obrisana!');
        redirect('aktivnosti/index');
    }

}
