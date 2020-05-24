
<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Aktivnost_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_vrste($korisnik_id) {
        $this->db->where('id_korisnika', $korisnik_id);
        $query = $this->db->get('vrsta_aktivnosti');
        return $query;
    }

    function spremi_aktivnost($datum_aktivnosti, $trajanje_aktivnosti, $komentar_aktivnosti, $id_vrste_aktivnosti, $korisnik_id) {
        $data = array(
            'datum_aktivnosti' => $datum_aktivnosti,
            'trajanje_aktivnosti' => $trajanje_aktivnosti,
            'komentar_aktivnosti' => $komentar_aktivnosti,
            'id_vrsta' => $id_vrste_aktivnosti,
            'id_korisnika' => $korisnik_id
        );
        $this->db->insert('aktivnost', $data);
    }

    public function get_aktivnosti($korisnik_id) {
        $this->db->select('id_aktivnosti, datum_aktivnosti, trajanje_aktivnosti, naziv_vrste_aktivnosti, komentar_aktivnosti');
        $this->db->from('aktivnost a');
        $this->db->join('vrsta_aktivnosti b', 'a.id_vrsta = b.id_vrste_aktivnosti', 'left');
        $this->db->where('a.id_korisnika', $korisnik_id);
        $this->db->group_by('naziv_vrste_aktivnosti, trajanje_aktivnosti');
        $query = $this->db->get();
        return $query;
    }

    public function get_aktivnost_id($id_aktivnosti) {
        $query = $this->db->get_where('aktivnost', array('id_aktivnosti' => $id_aktivnosti));
        return $query;
    }

    function update_aktivnost($id_aktivnosti, $datum_aktivnosti, $trajanje_aktivnosti, $komentar_aktivnosti, $id_vrste_aktivnosti, $korisnik_id) {
        $this->db->set('datum_aktivnosti', $datum_aktivnosti);
        $this->db->set('trajanje_aktivnosti', $trajanje_aktivnosti);
        $this->db->set('komentar_aktivnosti', $komentar_aktivnosti);
        $this->db->set('id_vrsta', $id_vrste_aktivnosti);
        $this->db->set('id_korisnika', $korisnik_id);
        $this->db->where('id_aktivnosti', $id_aktivnosti);
        // $this->db->where('id_korisnika', $id_korisnika);
        $this->db->update('aktivnost');
    }

    function get_aktivnosti_vrste($id_vrste_aktivnosti) {
        $query = $this->db->get_where('aktivnost', array('id_vrsta' => $id_vrste_aktivnosti));
        return $query;
    }

    public function izmijeni_aktivnost($id_aktivnosti, $data) {
        $this->db->where('id_aktivnosti', $id_aktivnosti);
        $this->db->update('aktivnost', $data);
        return TRUE;
    }

    public function get_aktivnost_data($id_aktivnosti) {
        $this->db->where('id_aktivnosti', $id_aktivnosti);
        $query = $this->db->get('aktivnost');
        return $query->row();
    }

    public function obrisi_aktivnost($id_aktivnosti) {
        $this->db->where('id_aktivnosti', $id_aktivnosti);
        $this->db->delete('aktivnost');

        return;
    }

}
