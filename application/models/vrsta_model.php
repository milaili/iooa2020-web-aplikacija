<?php
class Vrsta_model extends CI_Model{
    
    public function get_vrste($korisnik_id){
       $this->db->where('id_korisnika',$korisnik_id);
       $query = $this->db->get('vrsta_aktivnosti');
        return $query->result();
    }
    
    public function get_vrsta($id_vrste_aktivnosti){
        $this->db->select('*');
        $this->db->from('vrsta_aktivnosti');
        $this->db->where('id_vrste_aktivnosti',$id_vrste_aktivnosti);
        $query = $this->db->get();
         if($query->num_rows() != 1){
            return FALSE;
        }
        return $query->row();
    }
    
    
    public function kreiraj_vrstu($data){
	$insert = $this->db->insert('vrsta_aktivnosti', $data);
	return $insert;
    }
    
    
    
     public function izmijeni_vrstu($id_vrste_aktivnosti,$data){
        $this->db->where('id_vrste_aktivnosti', $id_vrste_aktivnosti);
        $this->db->update('vrsta_aktivnosti', $data); 
        return TRUE;
    }
    
    public function get_vrsta_data($id_vrste_aktivnosti){
        $this->db->where('id_vrste_aktivnosti',$id_vrste_aktivnosti);
        $query = $this->db->get('vrsta_aktivnosti');
        return $query->row();
    }
    
     public function obrisi_vrstu($id_vrste_aktivnosti){
	    $this->db->where('id_vrste_aktivnosti',$id_vrste_aktivnosti);
        $this->db->delete('vrsta_aktivnosti');
        
        return;
    }
 
        
}
