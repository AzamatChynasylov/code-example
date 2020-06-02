<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_model extends CI_Model {
	function login($login,$pwd)
	{
		$this->db->where('email',$login);
		$this->db->where('pswd',$pwd);
		$query = $this->db->get('user');
		 
		if($query->num_rows()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	function get_info_login($login)
	{
		$this->db->where('email',$login);
		$query = $this->db->get('user');
		return $query->row_array();
	}
}