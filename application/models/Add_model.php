<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
//require APPPATH . 'core/MY_Model.php';
class Add_model extends CI_Model
{

	function add_enter($add)
	{

		$this->db->insert('otchet', $add);
	}

	function add_student($add, $add2, $add3, $add4, $add5)
	{

		// $this->db->insert('studentnew', $add);
		// $insert_id = $this->db->insert_id();
		// return  $insert_id;
	

		$this->db->trans_start();
		$this->db->insert('studentnew', $add);
		$insert_id = $this->db->insert_id();
		$add2['id_student'] = $insert_id;
		$last_row=$this->db->select('nomer_cheka')->order_by('id',"desc")->limit(1)->get('oplatanew')->row();
		$add2['nomer_cheka'] = (int)$last_row->nomer_cheka + 1;
		$this->db->insert('oplatanew', $add2);
		if(isset($add2['book_price']))
		{

			$sql = "UPDATE bookbases SET bookCount =  bookCount - 1 WHERE bookCode = ?";
			$query = $this->db->query($sql, array($this->input->post('codeBook')));
		
			$this->db->insert('book', array(
				'id_student' => $insert_id,
				'date_payment' => $add2['date_payment'],
				'sum' => $add2['book_price'],
				'dolg' => $add2['ks_price'],
				'book_id' => $this->input->post('codeBook')
			));
		
		}
		
		$this->db->insert('otchet', $add3);
		$this->db->insert('otchet', $add4);
		$this->db->insert('reklam', $add5);
	//	$this->db->query('ANOTHER QUERY...');
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			# Something went wrong.
			$this->db->trans_rollback();
			return FALSE;
		} 
		else {
				# Everything is Perfect. 
				# Committing data to the database.
				$this->db->trans_commit();
				return $insert_id;
		}
	}
	//////////////////////////
	function add_user($add)
	{

		$this->db->insert('user', $add);
	}
	function get_last_user()
	{
		$sql = "SELECT * FROM user ORDER BY id desc LIMIT 1";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function getDolg($id)
	{
		$sql = "SELECT * FROM oplatanew where id_student=? AND ks_price!='' ORDER BY id desc LIMIT 1";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}
	function getDolgById($id)
	{
		$sql = "SELECT * FROM oplatanew where id_student=? AND dolg!='' ORDER BY id desc LIMIT 1";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}
	function updateDolg($id, $dolg)
	{
		$sql = "UPDATE oplatanew SET ks_price = ? WHERE id = ?";
		$query = $this->db->query($sql, array($dolg, $id));
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	function updateDolgBook($id, $dolg, $sum)
	{
		$sql = "UPDATE book SET dolg = ?, sum = ? WHERE id = ?";
		$query = $this->db->query($sql, array($dolg, $sum, $id));
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	function updateDolgCd($id, $dolg)
	{
		$sql = "UPDATE cd SET dolg = ? WHERE id = ?";
		$query = $this->db->query($sql, array($dolg, $id));
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	function updateStSMS($id)
	{
		$sql = "UPDATE studentnew SET phone_metka='1' WHERE id = ?";
		$query = $this->db->query($sql, array($id));
		return ($this->db->affected_rows() != 1) ? false : true;
	}


	function get_user()
	{
		$sql = "SELECT * FROM user";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function get_user2($id)
	{
		$sql = "SELECT * FROM user where id=?";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}
	function save_user($id, $add)
	{
		$this->db->where('id', $id);
		$this->db->update('user', $add);
	}
	function del_user($id)
	{
		$this->db->delete('user', array('id' => $id));
	}
	////////////////////////////

	function get_last_student()
	{
		$sql = "SELECT * FROM studentnew ORDER BY id desc LIMIT 1";
		$query = $this->db->query($sql);
		return $query->result_array();
	}


	function refresh_student($id, $add)
	{
		$this->db->where('id', $id);
		$this->db->update('studentnew', $add);
	}


	function del_student($id, $add)
	{
		$this->db->where('id', $id);
		$this->db->update('studentnew', $add);
	}

	function setDelDay($id, $day)
	{
		$sql = "UPDATE studentnew SET dateDel = ? WHERE id = ?";
		$this->db->query($sql, array($day, $id));
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	function del_gruppa($id)
	{
		$this->db->delete('gruppanew', array('id' => $id));
	}


	function add_oplata($add)
	{

		$this->db->insert('oplatanew', $add);
		$id = $this->db->insert_id();
		//$sql = "UPDATE oplatanew SET nomer_cheka = ? WHERE id = ?";
		//$this->db->query($sql, array($id-117,$id));

		return $this->add_oplata_update($id);





	}



	function add_oplata_n($add,$add2 = '', $add3)
	{
		

	//	$this->db->insert('oplatanew', $add);
		//$id = $this->db->insert_id();
		//$sql = "UPDATE oplatanew SET nomer_cheka = ? WHERE id = ?";
		//$this->db->query($sql, array($id-117,$id));

	//	return ($this->db->affected_rows() != 1) ? false : true;

		$this->db->trans_start();
		
		$last_row=$this->db->select('nomer_cheka')->order_by('id',"desc")->limit(1)->get('oplatanew')->row();
		$add['nomer_cheka'] = (int)$last_row->nomer_cheka + 1;
		$this->db->insert('oplatanew', $add);
	
		if(isset($add['book_price']))
		{

			$sql = "UPDATE bookbases SET bookCount =  bookCount - 1 WHERE bookCode = ?";
			$query = $this->db->query($sql, array($this->input->post('codeBook')));
		
			$this->db->insert('book', array(
				'id_student' => $add['id_student'],
				'date_payment' => $add['date_payment'],
				'sum' => $add['book_price'],
				'dolg' => $add['ks_price'],
				'book_id' => $this->input->post('codeBook')
			));
		
		}
		
		if(count($add2)>2){
			//return 'aza';
			$this->db->update('studentnew', $add2, array('id' => $add['id_student']));
		}
		//return 'aza';
		$this->db->insert('otchet', $add3);
		// $this->db->where('id', $add['id_student']);
		// $this->db->update('studentnew', $add2);
		
		

		$this->db->trans_complete();
		///return 'aza';

		if ($this->db->trans_status() === FALSE) {
			# Something went wrong.
			$this->db->trans_rollback();
			return FALSE;
		} 
		else {
				# Everything is Perfect. 
				# Committing data to the database.
				$this->db->trans_commit();
				return true;
		}



	}


	function add_oplata_update($id)
	{

		//$this->db->insert('oplatanew',$add);
		//$id = $this->db->insert_id();
		$sql = "UPDATE oplatanew SET nomer_cheka = ? WHERE id = ?";
		$this->db->query($sql, array($id - 117, $id));
		return ($this->db->affected_rows() != 1) ? false : true;
	}

	function updateOldPayment($id)
	{

		//$this->db->insert('oplatanew',$add);
		//$id = $this->db->insert_id();
		$sql = "UPDATE oplatanew SET dolg = '' WHERE id = ?";
		$this->db->query($sql, array($id));
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	function refresh_nomer_chek()
	{ }
	function add_bookn($add)
	{

		$sql = $this->db->insert('book', $add);
		if ($sql) { }
	}
	function add_cdn($add)
	{

		$this->db->insert('cd', $add);
	}

	function add_group($add)
	{

		$this->db->insert('gruppanew', $add);
	}
	function add_kniga($add)
	{

		$this->db->insert('oplatanew', $add);
	}


	/////////////////////////////////zamor/////////////////////////////////////////////////
	function refresh_studentzamor($id, $add)
	{
		$this->db->where('id', $id);
		$this->db->update('oplatanew', $add);
	}

	function refresh_studentzamor2($id, $add2)
	{
		$this->db->where('id', $id);
		$this->db->update('studentnew', $add2);
	}

	/////////////////////////////////////////////////////////////////////////////////////////
	function refresh_gruppa_edit($id, $add2)
	{
		$this->db->where('id', $id);
		$this->db->update('gruppanew', $add2);
	}

	function add_days($add)
	{
		$this->db->insert('raspisanie_den', $add);
	}

	function del_den($id)
	{
		$this->db->delete('raspisanie_den', array('data' => $id));
	}

	function get_first_den($den)
	{
		$sql = "SELECT * FROM raspisanie_den WHERE data=? ORDER BY id desc LIMIT 1";
		$query = $this->db->query($sql, array($den));
		return $query->row_array();
	}

	function get_days($den)
	{
		$sql = "SELECT * FROM raspisanie_den WHERE data=?";
		$query = $this->db->query($sql, array($den));
		return $query->result_array();
	}

	function get_teacher_days($day, $id_t, $id_day)
	{
		$sql = "SELECT * FROM raspisanie_den WHERE data=? AND nomer_tr=? AND id_den=?";
		$query = $this->db->query($sql, array($day, $id_t, $id_day));
		return $query->row_array();
	}

	function get_teachers()
	{
		$sql = "SELECT * FROM teacher WHERE name != '' ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function add_teacher($add)
	{
		$this->db->insert('teacher', $add);
	}

	function get_teacher($id)
	{
		$sql = "SELECT * FROM teacher WHERE id=?";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}

	function update_teacher($id, $add)
	{
		$this->db->where('id', $id);
		$this->db->update('teacher', $add);
	}

	function get_teachers_name()
	{
		$sql = "SELECT name FROM teacher";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function get_lesson_today($id, $day, $number_day)
	{
		$n = "'{$number_day}1','{$number_day}2','{$number_day}3','{$number_day}4','{$number_day}5','{$number_day}6','{$number_day}7','{$number_day}8','{$number_day}9','{$number_day}10'";
		//print_r($n);
		$sql = "SELECT * FROM raspisanie_den WHERE nomer_tr=? AND data=? AND id_den  in(" . $n . ")";
		$query = $this->db->query($sql, array($id, $day));
		return $query->result_array();
	}

	function get_day_detail($id_den, $data)
	{
		$sql = "SELECT *FROM raspisanie_den WHERE id_den=? AND data=?";
		$query = $this->db->query($sql, array($id_den, $data));
		return $query->result_array();
	}
	/////////////////////////////////////////////////////////////////////////////////////////
	function addGetId($add)
	{
		$this->db->insert('probnik', $add);
		$last_id = $this->db->insert_id();
		return $last_id;
	}
	function getProbUser($id)
	{
		$sql = "SELECT *FROM probnik WHERE id=?";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}
	function getProbnikUsers()
	{
		$sql = "SELECT *FROM probnik";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function setProbnikUsers($id)
	{
		$sql = "UPDATE probnik SET zapisalsya = 1 WHERE id = ?";
		$query = $this->db->query($sql, array($id));
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	function getGroup($id)
	{
		$sql = "SELECT * FROM gruppanew WHERE id=?";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}
	function getStudent($id)
	{
		$sql = "SELECT  *, studentnew.id as stid FROM studentnew JOIN gruppanew on gruppanew.id=studentnew.id_gruppa  where  stid=?";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}

	function add_reklam($add5)
	{
		$this->db->insert('reklam', $add5);
	}

	function getallpayments()
	{
		$sql = "SELECT  * FROM oplatanew ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function updateallpayments($data)
	{
		$this->db->save_queries = false;
		$result=$this->db->update_batch('oplatanew', $data, 'id'); 
	}
	function updatetodellstudent($data)
	{
		$this->db->save_queries = false;
		$result=$this->db->update_batch('studentnew', $data, 'id'); 
	}
	function getpaymentbyid($id)
	{
		$sql = "SELECT  * FROM oplatanew WHERE id = ?";
		$query = $this->db->query($sql,array($id));
		return $query->row_array();
	}
	function setpaymentbookdolg($add,$add2,	$oplataID)
	{
		$this->db->trans_start();
		
		$last_row=$this->db->select('nomer_cheka')->order_by('id',"desc")->limit(1)->get('oplatanew')->row();
		$add['nomer_cheka'] = (int)$last_row->nomer_cheka + 1;
		$this->db->insert('oplatanew', $add);
	
		$this->db->where('id', 	$oplataID);
		$this->db->update('oplatanew', $add2);
		
		

		$this->db->trans_complete();
		///return 'aza';

		if ($this->db->trans_status() === FALSE) {
			# Something went wrong.
			$this->db->trans_rollback();
			return FALSE;
		} 
		else {
				# Everything is Perfect. 
				# Committing data to the database.
				$this->db->trans_commit();
				return true;
		}
	}
}
