<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Event extends CI_Model{ 
    function __construct() { 
        // Set table name 
        $this->table = 'events'; 
    } 
     
    /* 
     * Fetch event data from the database 
     * @param array filter data based on the passed parameters 
     */ 
    function getRows($params = array()){ 
        $this->db->select('*'); 
        $this->db->from($this->table); 
         
        if(array_key_exists("where", $params)){ 
            foreach($params['where'] as $key => $val){ 
                $this->db->where($key, $val); 
            } 
        } 
         
        if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){ 
            $result = $this->db->count_all_results(); 
        }else{ 
            if(array_key_exists("id", $params) || (array_key_exists("returnType", $params) && $params['returnType'] == 'single')){ 
                if(!empty($params['id'])){ 
                    $this->db->where('id', $params['id']); 
                } 
                $query = $this->db->get(); 
                $result = $query->row_array(); 
            }else{ 
                $this->db->order_by('date', 'asc'); 
                if(array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit'],$params['start']); 
                }elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){ 
                    $this->db->limit($params['limit']); 
                } 
                 
                $query = $this->db->get(); 
                $result = ($query->num_rows() > 0)?$query->result_array():FALSE; 
            } 
        } 
         
        // Return fetched data 
        return $result; 
    } 
     
    /* 
     * Fetch and group by events based on date 
     * @param array filter data based on the passed parameters 
     */ 
    function getGroupCount($params = array()){ 
        $this->db->select("date, COUNT(id) as event_num"); 
        $this->db->from($this->table); 
         
        if(array_key_exists("where", $params)){ 
            foreach($params['where'] as $key => $val){ 
                $this->db->where($key, $val); 
            } 
        } 
         
        if(array_key_exists("where_year", $params)){ 
            $this->db->where("YEAR(date) = ".$params['where_year']); 
        } 
         
        if(array_key_exists("where_month", $params)){ 
            $this->db->where("MONTH(date) = ".$params['where_month']); 
        } 
         
        $this->db->group_by('date'); 
         
        $query = $this->db->get(); 
        $result = ($query->num_rows() > 0)?$query->result_array():FALSE; 
         
        // Return fetched data 
        return $result; 
    } 
}
