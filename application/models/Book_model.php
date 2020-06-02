<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//require APPPATH . 'core/MY_Model.php';
class Book_model extends CI_Model
{
	public function get_books_sklad( )
	{
		$sql = "SELECT * FROM booksklad ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	public function add_book_sklad($add)
	{
		$sql = "UPDATE booksklad SET quantity =  quantity + ? WHERE id = ?";
		$query = $this->db->query($sql, array($add['quantity'], $add['id']));
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	public function add_book_manager($add)
	{
		$sql = "SELECT * FROM bookbases WHERE bookCode = ?";
		$query = $this->db->query($sql, array($add['bookCode']));
		
		if($query->num_rows()>0)
		{
			$this->db->trans_start();
			$sql = "UPDATE bookbases SET bookCount = bookCount + ?, comment = ? , dateGet = ? WHERE bookCode = ?";
			$query = $this->db->query($sql, array($add['bookCount'], $add['comment'], $add['dateGet'] , $add['bookCode']));
			$this->db->insert('booklog', array(
				'book_id' => $add['bookCode'],
				'bookgetdate' => date('Y-m-d')
		));
			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				return FALSE;
			} 
			else {
					$this->db->trans_commit();
					return ($this->db->affected_rows() != 1) ? false : true;
			}
		}
		else{
			$this->db->trans_start();
			$this->db->insert('bookbases', $add);
			$this->db->insert('booklog', array(
				'book_id' => $add['bookCode'],
				'bookgetdate' => date('Y-m-d')
		));
			$this->db->trans_complete();
			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				return FALSE;
			} 
			else {
					$this->db->trans_commit();
					return ($this->db->affected_rows() != 1) ? false : true;
			}
		
		}

		
	}
	public function update_book_sklad($add)
	{
		$sql = "UPDATE booksklad SET quantity =  quantity - ? WHERE id = ?";
		$query = $this->db->query($sql, array($add['quantity'], $add['id']));
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	
}
