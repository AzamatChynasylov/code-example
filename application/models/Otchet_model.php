<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Otchet_model extends CI_Model {
	function get_who(){
       
        $den=date('d-m-Y');
        $sql = "SELECT * FROM otchet where dataenter = ? AND metka = ?";
        $query=$this->db->query($sql,array($den,1));
        return $query->result_array();

    }
    function get_student(){
       
        $den=date('d-m-Y');
        $sql = "SELECT * FROM otchet where dataenter = ? AND metka=?";
        $query=$this->db->query($sql,array($den,2));
        return $query->result_array();

    }
    function get_group(){
       
        $den=date('d-m-Y');
        $sql = "SELECT * FROM otchet where dataenter = ? AND metka=?";
        $query=$this->db->query($sql,array($den,3));
        return $query->result_array();

    }
    function get_pyment(){
       
        $den=date('d-m-Y');
        $sql = "SELECT * FROM otchet where dataenter = ? AND metka=?";
        $query=$this->db->query($sql,array($den,4));
        return $query->result_array();

    }
    function get_pyment_other(){
       
        $den=date('d-m-Y');
        $sql = "SELECT * FROM otchet where dataenter = ? AND metka=?";
        $query=$this->db->query($sql,array($den,5));
        return $query->result_array();

    }
     function get_who2($den){
       
        
        $sql = "SELECT * FROM otchet where dataenter = ? AND metka = ?";
        $query=$this->db->query($sql,array($den,1));
        return $query->result_array();

    }
     function get_student2($den){
       
        
        $sql = "SELECT * FROM otchet where dataenter = ? AND metka = ?";
        $query=$this->db->query($sql,array($den,2));
        return $query->result_array();

    }
     function get_group2($den){
       
        
        $sql = "SELECT * FROM otchet where dataenter = ? AND metka = ?";
        $query=$this->db->query($sql,array($den,3));
        return $query->result_array();

    }
    function get_pyment2($den){
       
        
        $sql = "SELECT * FROM otchet where dataenter = ? AND metka = ?";
        $query=$this->db->query($sql,array($den,4));
        return $query->result_array();

    }
    function get_pyment_other2($den){
       
        
        $sql = "SELECT * FROM otchet where dataenter = ? AND metka = ?";
        $query=$this->db->query($sql,array($den,5));
        return $query->result_array();

    }
    function get_who3($den,$den2){
       
        
        
        $sql = "SELECT * FROM otchet where dataenter between ? and ? AND metka = ?";
        $query=$this->db->query($sql,array($den,$den2,1));
        return $query->result_array();

    }
     function get_student3($den,$den2){
       
        
        $sql = "SELECT * FROM otchet where dataenter between ? and ? AND metka = ?";
        $query=$this->db->query($sql,array($den,$den2,2));
        return $query->result_array();

    }
     function get_group3($den,$den2){
       
        
       $sql = "SELECT * FROM otchet where dataenter between ? and ? AND metka = ?";
        $query=$this->db->query($sql,array($den,$den2,3));
        return $query->result_array();

    }
    function get_pyment3($den,$den2){
       
        
        $sql = "SELECT * FROM otchet where dataenter between ? and ? AND metka = ?";
        $query=$this->db->query($sql,array($den,$den2,4));
        return $query->result_array();

    }
    function get_pyment_other3($den,$den2){
       
        
        $sql = "SELECT * FROM otchet where dataenter between ? and ? AND metka = ?";
        $query=$this->db->query($sql,array($den,$den2,5));
        return $query->result_array();

    }
}