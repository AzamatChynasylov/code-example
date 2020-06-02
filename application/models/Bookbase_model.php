<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 02.07.2018
 * Time: 16:54
 */


class Bookbase_model extends  CI_Model{
   
    public function updateBook($data){
        $this->db->set('bookCount', 'bookCount+'.$data['bookCount'], false);
        $this->db->set('comment', $data['comment']);
        $this->db->set('dateGet',date('Y-m-d'));
        $this->db->set('bookCode',$data['bookCode']);
        $this->db->where('bookCode', $data['bookCode']);
        $this->db->update('bookbases');
        return ( $this->db->affected_rows()!=1)?false:true;
    }
    public function updateBookByCode($barcode){
        $this->db->set('bookCount', 'bookCount-1', false);
        $this->db->set('dateGet',date('Y-m-d'));
        $this->db->where('bookCode', $barcode);
        $this->db->update('bookbases');
        return ( $this->db->affected_rows()!=1)?false:true;
		}
		public function getBooks()
		{
			$sql = "SELECT *, bookbases.id as bbid FROM bookbases JOIN booksklad on booksklad.id=bookbases.bookCode ORDER BY bookCode";
			$query = $this->db->query($sql);
			return $query->result_array();
		}

}