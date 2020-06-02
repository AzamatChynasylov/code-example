<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gruppa_model extends CI_Model {

	function get_all_gruppa()
	{
		$sql = "SELECT * FROM gruppanew  where time !='' ";
		$query=$this->db->query($sql);
		return $query->result_array();
	
	}
	function get_all_gruppa_simple()
	{
		$sql = "SELECT * FROM gruppanew  where metka =2 AND time !='' ";
		$query=$this->db->query($sql);
		return $query->result_array();
	
	}
	
	function get_all_gruppa_fc()
	{
		$sql = "SELECT * FROM gruppanew ";
		$query=$this->db->query($sql);
		return $query->result_array();
	
	}
	function get_all_gruppa2()
	{
		$sql = "SELECT time FROM gruppanew where metka =2";
		$query=$this->db->query($sql);
		return $query->result_array();
	}
	function get_all_gruppat($time)
	{
		$sql = "SELECT * FROM gruppanew  where time=? And metka = 2";
		$query=$this->db->query($sql,array($time));
		return $query->result_array();
	}
	function get_all_gruppaindi()
	{
		$sql = "SELECT * FROM gruppanew where metka=1";
		$query=$this->db->query($sql);
		return $query->result_array();
	}

	function get_gruppa($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get('gruppanew');
		return $query->row_array();
	}

	function get_gruppa_st($id)
	{
		$sql = "SELECT * , gruppanew.id as grid FROM gruppanew JOIN studentnew on studentnew.id_gruppa = gruppanew.id  WHERE grid = ? ";
		
		$query = $this->db->query($sql, array($id));
		if(empty($query->result_array()))
		{
			$sql = "SELECT * FROM gruppanew  WHERE id = ? ";
			$query = $this->db->query($sql, array($id));
			return $query->row_array();
		}
		return $query->result_array();
	}



	function get_students_gruppa($id)
	{
		$sql = "SELECT * FROM studentnew where id_gruppa=? ORDER BY fio ASC";
		$query=$this->db->query($sql,array($id));
		return $query->result_array();
		
	}
	function getGrByDate($d)
	{
		$sql = "SELECT * FROM gruppanew where lastDate=?";
		$query=$this->db->query($sql,array($d));
		return $query->result_array();
	}
	function updateGrByDate($id,$d)
	{
		$sql = "UPDATE gruppanew SET level = ? WHERE id = ?";
	 	$this->db->query($sql, array($d,$id));
		return ( $this->db->affected_rows()!=1)?false:true;
	}
	Public function addLesson()
	{
		$add['dateAdd']= date("d-m-Y");
		$add['id_group']= $_POST['id_group'];
		$add['lesson']=$_POST['lesson'];
		$this->db->insert('grouplesson',$add);
		return ($this->db->affected_rows()!=1)?false:true;
	}
	function getGrN($id)
	{
		$date=date('d-m-Y');
		$sql = "SELECT * FROM grouplesson where dateAdd=? AND id_group=? ORDER BY id desc LIMIT 1";
		$query=$this->db->query($sql,array($date,$id));
		return $query->row_array();
	}
	 function getGrLessons($den,$den2,$id){
        
        $den4=substr($den,6);
        $den5=substr($den,3,2);
        $den6=substr($den,0,2);
        $den=$den4.$den5.$den6;
        $den4=substr($den2,6);
        $den5=substr($den2,3,2);
        $den6=substr($den2,0,2);
        $den2=$den4.$den5.$den6;
        //echo ($den);
        //echo ($den2);
        $sql = "SELECT  * FROM grouplesson  where substr(dateAdd,7,4)||substr(dateAdd,4,2)||substr(dateAdd,1,2)  between '".$den."' AND '". $den2."' AND id_group=?";
        // $sql = "SELECT  * FROM grouplesson  where dateAdd between ? AND ? AND id_group=?";
        $query=$this->db->query($sql,array($id));
        return $query->result_array();

    }
}