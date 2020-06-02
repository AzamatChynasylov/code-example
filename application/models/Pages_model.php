<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Pages_model extends CI_Model {

    function get_search($name){
        // $sql = "SELECT * FROM studentnew where fio like ? and id_gruppa!='' ORDER BY fio ASC"; 
        // $query=$this->db->query($sql,array('%'.$name.'%'));
				// return $query->result_array();
				
				$sql = "SELECT *,studentnew.id as stid,studentnew.metka as stm FROM studentnew LEFT JOIN  gruppanew on gruppanew.id = studentnew.id_gruppa WHERE fio like ? AND studentnew.id_gruppa != '' ORDER BY fio ASC";
        $query=$this->db->query($sql,array('%'.$name.'%'));
        return $query->result_array();
    }
    function get_search_tel($tel)
    {
        // $sql = "SELECT * FROM studentnew where phone like ? ORDER BY fio ASC"; 
				// $query=$this->db->query($sql,array('%'.$tel.'%'));
				
				$sql = "SELECT *,studentnew.id as stid,studentnew.metka as stm FROM studentnew LEFT JOIN  gruppanew on gruppanew.id = studentnew.id_gruppa WHERE phone like  ? AND studentnew.id_gruppa != '' ORDER BY fio ASC";
				$query=$this->db->query($sql,array('%'.$tel.'%'));
        return $query->result_array();
    }
     function get_search2($name){
			$sql = "SELECT *,studentnew.id as stid,studentnew.metka as stm FROM studentnew LEFT JOIN  gruppanew on gruppanew.id = studentnew.id_gruppa WHERE fio like ? AND studentnew.id_gruppa == '' ORDER BY fio ASC";
			$query=$this->db->query($sql,array('%'.$name.'%'));
			return $query->result_array();
		}
		function get_search_tel2($tel)
    {
        // $sql = "SELECT * FROM studentnew where phone like ? ORDER BY fio ASC"; 
				// $query=$this->db->query($sql,array('%'.$tel.'%'));
				
				$sql = "SELECT *,studentnew.id as stid,studentnew.metka as stm FROM studentnew LEFT JOIN  gruppanew on gruppanew.id = studentnew.id_gruppa WHERE phone like  ? AND studentnew.id_gruppa == '' ORDER BY fio ASC";
				$query=$this->db->query($sql,array('%'.$tel.'%'));
        return $query->result_array();
    }
    // function get_search3($name){
    //     $sql = "SELECT * FROM studentnew where fio like ? and id_gruppa='' ORDER BY fio ASC"; 
    //     $query=$this->db->query($sql,array('%'.$name.'%'));
    //     return $query->result_array();
    // }
    ///////////////////////Search date/////////////////
    function get_search_st_all()
    {
        $sql = "SELECT * FROM studentnew where id_gruppa='' ORDER BY fio ASC";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
    ///////////////////////////////////////////////////
    function get_search_data($name){
        $sql = "SELECT * FROM studentnew where fio like ? and id_gruppa='' ORDER BY fio ASC"; 
        $query=$this->db->query($sql,array('%'.$name.'%'));
        return $query->result_array();
    }
}