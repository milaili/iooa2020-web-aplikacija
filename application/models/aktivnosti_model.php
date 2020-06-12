<?php

class Aktivnosti_model extends CI_Model {

//get all categories method
    function get_vrsta($korisnik_id) {
        $this->db->where('id_korisnika', $korisnik_id);
        $query = $this->db->get('vrsta_aktivnosti');
        return $query;
    }

//generate dataTable serverside method
    function get_sve_aktivnosti($korisnik_id) {
        $this->datatables->select('id_aktivnosti,datum_aktivnosti,trajanje_aktivnosti,naziv_vrste_aktivnosti,komentar_aktivnosti');
        $this->datatables->from('aktivnost a');
        $this->datatables->join('vrsta_aktivnosti b', 'a.id_vrsta=b.id_vrste_aktivnosti');
        $this->db->where('a.id_korisnika', $korisnik_id);
        $this->datatables->add_column('view', '<a href="javascript:void(0);" class="edit_record btn btn-info" data-id="$1" data-datum="$2" data-trajanje="$3" data-vrsta="$4" data-komentar="$5" data-korisnik="$6">Izmijeni</a>  <a href="javascript:void(0);" class="delete_record btn btn-danger" data-id="$1">Obriši</a>', 'id_aktivnosti,datum_aktivnosti,trajanje_aktivnosti,naziv_vrste_aktivnosti,komentar_aktivnosti, id_korisnika');
        return $this->datatables->generate();
    }

//insert data method
    function insert_aktivnost($datum_aktivnosti, $trajanje_aktivnosti, $komentar_aktivnosti, $id_vrste_aktivnosti, $korisnik_id) {
        $data = array(
            'datum_aktivnosti' => $datum_aktivnosti,
            'trajanje_aktivnosti' => $trajanje_aktivnosti,
            'komentar_aktivnosti' => $komentar_aktivnosti,
            'id_vrsta' => $id_vrste_aktivnosti,
            'id_korisnika' => $korisnik_id
        );
        $result = $this->db->insert('aktivnost', $data);
        return $result;
    }

//update data method
    function update_aktivnost() {
        $id_aktivnosti = $this->input->post('id_aktivnosti');
        $data = array(
            'datum_aktivnosti' => $this->input->post('datum_aktivnosti'),
            'trajanje_aktivnosti' => $this->input->post('trajanje_aktivnosti'),
            'id_vrsta' => $this->input->post('vrsta'),
            'komentar_aktivnosti' => $this->input->post('komentar_aktivnosti'),
        );
        $this->db->where('id_aktivnosti', $id_aktivnosti);
        $result = $this->db->update('aktivnost', $data);
        return $result;
    }

//delete data method
    function delete_aktivnost() {
        $id_aktivnosti = $this->input->post('id_aktivnosti');
        $this->db->where('id_aktivnosti', $id_aktivnosti);
        $result = $this->db->delete('aktivnost');
        return $result;
    }

    // search data range
    public function total($min, $max) {

        $this->db->where('datum_aktivnosti >=', $min);
        $this->db->where('datum_aktivnosti <=', $max);
        // $this->db->where('id_korisnika', $korisnik_id);

        return $this->db->get('SUM(trajanje_aktivnosti)');
        //  $query = [select sum(trajanje_aktivnosti) from aktivnost where aktivnost.datum_aktivnosti between '2020-06-02' and '2020-06-11'];
    }

    public function search($korisnik_id, $min, $max, $id_vrste_aktivnosti) {
        $this->db->select('a.id_aktivnosti, a.datum_aktivnosti, a.trajanje_aktivnosti, b.naziv_vrste_aktivnosti, a.komentar_aktivnosti');
        $this->db->from('aktivnost a');
        $this->db->join('vrsta_aktivnosti b', 'a.id_vrsta=b.id_vrste_aktivnosti');
        $this->db->where('a.id_korisnika', $korisnik_id);
        $this->db->where('b.id_vrste_aktivnosti', $id_vrste_aktivnosti);
        $this->db->where('a.datum_aktivnosti >=', $min);
        $this->db->where('a.datum_aktivnosti <=', $max);
        $query = $this->db->get();
        return $query->result();
    }

    public function trajanje_ukupno($korisnik_id, $min, $max) {
        $this->db->select_sum('trajanje_aktivnosti');
        $this->db->where('datum_aktivnosti >=', $min);
        $this->db->where('datum_aktivnosti <=', $max);
        $this->db->where('id_korisnika', $korisnik_id);
        $query = $this->db->get('aktivnost');
        return $query->result();
    }

    public function trajanje($korisnik_id, $min, $max, $id_vrste_aktivnosti) {
        $this->db->select_sum('a.trajanje_aktivnosti');
        $this->db->from('aktivnost a');
        $this->db->join('vrsta_aktivnosti b', 'a.id_vrsta=b.id_vrste_aktivnosti');
        $this->db->where('a.id_korisnika', $korisnik_id);
        $this->db->where('b.id_vrste_aktivnosti', $id_vrste_aktivnosti);
        $this->db->where('a.datum_aktivnosti >=', $min);
        $this->db->where('a.datum_aktivnosti <=', $max);
        $query = $this->db->get();
        return $query->result();
    }

}
