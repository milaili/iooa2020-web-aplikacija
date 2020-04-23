<?php
class Korisnik_model extends CI_Model{
     
    public function kreiraj_korisnika(){
        $new_member_insert = array(
            'ime_korisnika'       => $this->input->post('ime'),
            'prezime_korisnika'        => $this->input->post('prezime'),
            'email_korisnika'            => $this->input->post('email'),
            'korisnicko_ime'         => $this->input->post('username'),                    
            'lozinka'         => md5($this->input->post('password'))
        );
        
        $insert = $this->db->insert('korisnik', $new_member_insert);
        return $insert;
    }
    
    
    public function login_korisnik($username,$password){
        $enc_password = md5($password);
        
        $this->db->where('korisnicko_ime',$username);
        $this->db->where('lozinka',$enc_password);
        
        $result = $this->db->get('korisnik');
        if($result->num_rows() == 1){
            return $result->row(0)->id_korisnika;
        } else {
            return false;
        }
    }
    
}
