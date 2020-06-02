<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
class Student_model extends CI_Model
{

	function get_student($id)
	{
		//$sql = "SELECT  * FROM book join studentnew on studentnew.id=book.id_student where substr(date_payment,7,4)||substr(date_payment,4,2)||substr(date_payment,1,2)  between '".$den."'  and'". $den2."'";

		// $sql = "SELECT *,studentnew.id as stid,studentnew.metka as stm FROM studentnew LEFT JOIN  gruppanew on gruppanew.id = studentnew.id_gruppa WHERE stid=? ";
		// $query = $this->db->query($sql, array($id));
		// return $query->row_array();



		$this->db->trans_start();
		$sql = "SELECT *,studentnew.id as stid,studentnew.metka as stm FROM studentnew LEFT JOIN  gruppanew on gruppanew.id = studentnew.id_gruppa WHERE stid=? ";
		$query = $this->db->query($sql, array($id));
		$query->row_array();
		$sql2 = "SELECT * FROM oplatanew where id_student=? ORDER BY id desc ";
		$query2 = $this->db->query($sql2, array($id));
		$query2->result_array();
		$this->db->trans_complete();

		if ($this->db->trans_status() === FALSE) {
			# Something went wrong.
			$this->db->trans_rollback();
			return FALSE;
		} else {
			# Everything is Perfect. 
			# Committing data to the database.
			$this->db->trans_commit();
			return array(
				'student' => $query,
				'oplata' => $query2,
		);
		}
	}
	function getStudentEdit($id)
	{
		$sql = "SELECT *,studentnew.id as stid,studentnew.metka as stm FROM studentnew LEFT JOIN  gruppanew on gruppanew.id = studentnew.id_gruppa WHERE stid=? ";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}

	function getStudentNew($id)
	{
		//$sql = "SELECT  * FROM book join studentnew on studentnew.id=book.id_student where substr(date_payment,7,4)||substr(date_payment,4,2)||substr(date_payment,1,2)  between '".$den."'  and'". $den2."'";
		//studentnew on studentnew.id=book.id_student
		$sql = "SELECT *,studentnew.id as stid,studentnew.metka as stm FROM studentnew 
                      LEFT JOIN  gruppanew on gruppanew.id = studentnew.id_gruppa
                       JOIN oplatanew on oplatanew.id_student = stid
                      WHERE stid=? ";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}

	function get_search_tel($tel)
	{
		$sql = "SELECT * FROM user where tel like ?";
		$query = $this->db->query($sql, array('%' . $tel . '%'));
		return $query->result_array();
	}

	function get_gruppa($id)
	{
		$sql = "SELECT namegroup FROM gruppanew where id=?";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}

	function get_gruppanew()
	{
		$sql = "SELECT * FROM gruppanew";
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	function get_tel($id)
	{
		$sql = "SELECT tel,tel2 FROM phone where id_student=?";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}

	function get_oplata($id)
	{
		$sql = "SELECT * FROM oplata where id_student=?";
		$query = $this->db->query($sql, array($id));
		return $query->result_array();
	}

	function get_oplata2($id)
	{
		$sql = "SELECT * FROM oplatanew where id_student=? ORDER BY id desc ";
		$query = $this->db->query($sql, array($id));
		return $query->result_array();
	}

	function get_oplatast2($id)
	{
		$sql = "SELECT * FROM oplatanew where id_student=? ORDER BY id desc LIMIT 1";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}


	function getOplSum($id, $lastD)
	{
		$sql = "SELECT * FROM oplatanew where id_student=? AND last_date_lesson=?";
		$query = $this->db->query($sql, array($id, $lastD));
		return $query->result_array();
	}


	function get_zamorst()
	{
		//$sql = "SELECT * FROM studentnew where metka2=5"; 
		$sql = "SELECT *,oplatanew.id as oplid, studentnew.id as stid  FROM studentnew JOIN  oplatanew on oplatanew.id_student = studentnew.id  WHERE metka2=5  ORDER BY oplid desc ";

		$query = $this->db->query($sql);
		return $query->result_array();
	}


	function get_oplatazamor($id)
	{
		$sql = "SELECT * FROM oplatanew where id_student=? ORDER BY id desc LIMIT 1";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}
	/*--------------------GET LAST ---------------------------------------------------------------*/
	function get_last3_students()
	{
		// $sql = "SELECT * FROM oplatanew where last_date_lesson=?"; 
		//$query=$this->db->query($sql,array($id));
		//return $query->result_array();
		//$date ="SELECT DATE_ADD(now(), INTERVAL 3 DAY)";
		//$query=$this->db->query($date);
		//return $query->result_array();
		//$day1= date(now);,
		$den = date('d-m-Y');
		$den2 = date("d-m-Y", mktime(0, 0, 0, date("m"), date("d") + 1, date("Y")));
		$den3 = date("d-m-Y", mktime(0, 0, 0, date("m"), date("d") + 2, date("Y")));
		$den4 = date("d-m-Y", mktime(0, 0, 0, date("m"), date("d") + 3, date("Y")));
		$sql = "SELECT * FROM oplatanew where last_date_lesson =? or last_date_lesson =? or last_date_lesson =?or last_date_lesson =?";
		$query = $this->db->query($sql, array($den, $den2, $den3, $den4));
		return $query->result_array();
	}

	function get_last3_students1()
	{
		$den = date('d-m-Y');
		$sql = "SELECT * FROM oplatanew where last_date_lesson =? ";
		$query = $this->db->query($sql, array($den));
		return $query->result_array();
	}

	function get_last3_students2()
	{
		$den2 = date("d-m-Y", mktime(0, 0, 0, date("m"), date("d") + 1, date("Y")));
		$sql = "SELECT * FROM oplatanew where last_date_lesson =?";
		$query = $this->db->query($sql, array($den2));
		return $query->result_array();
	}

	function get_last3_students3()
	{
		$den3 = date("d-m-Y", mktime(0, 0, 0, date("m"), date("d") + 2, date("Y")));
		$sql = "SELECT * FROM oplatanew where last_date_lesson =?";
		$query = $this->db->query($sql, array($den3));
		return $query->result_array();
	}

	function get_last3_students4()
	{
		$den4 = date("d-m-Y", mktime(0, 0, 0, date("m"), date("d") + 3, date("Y")));
		$sql = "SELECT * FROM oplatanew where last_date_lesson =?";
		$query = $this->db->query($sql, array($den4));
		return $query->result_array();
	}

	/*---------------------------------------------------------------------------------------------------------*/
	function get_summa()
	{
		$sql = "SELECT  * FROM oplatanew  join studentnew on studentnew.id=oplatanew.id_student where date_payment like ?";
		$query = $this->db->query($sql,array(date('Y-m-d'). '%'));
		return $query->result_array();

		// $den = date('Y-m-d');
		// $this->db->select('*');
		// $this->db->from('oplatanew');
		// $array = array('date_payment LIKE' => $den . '%');
		// $query = $this->db->where($array);
		// $this->db->join('studentnew', 'studentnew.id=oplatanew.id_student');
		// $query = $this->db->get();
		// return $query->result_array();
	}

	function get_summadate($den)
	{
		$sql = "SELECT  * FROM oplatanew  join studentnew on studentnew.id=oplatanew.id_student where date_payment like ?";
		$query = $this->db->query($sql,array(date('Y-m-d', strtotime($den)). '%'));
		return $query->result_array();

		// $this->db->select('*');
		// $this->db->from('oplatanew');
		// $array = array('date_payment LIKE' => $den . '%');
		// // $array = array('date_payment =' => $den, 'book_price <>' => '');
		// $query = $this->db->where($array);
		// $this->db->join('studentnew', 'studentnew.id=oplatanew.id_student');
		// $query = $this->db->get();
		// return $query->result_array();

		// $sql = "SELECT * FROM oplatanew where date_payment = ?";
		// $query=$this->db->query($sql,array($den));
		// return $query->result_array();

	}

	function get_summadate2($den, $den2)
	{
		$sql = "SELECT  * FROM oplatanew  join studentnew on studentnew.id=oplatanew.id_student where date_payment between ? and ?";
		$query = $this->db->query($sql,array(date('Y-m-d', strtotime($den)). '%',date('Y-m-d', strtotime($den2)). '%'));
		return $query->result_array();

		// $this->db->select('*');
		// $this->db->from('oplatanew');
		// $den4 = substr($den, 6);
		// $den5 = substr($den, 3, 2);
		// $den6 = substr($den, 0, 2);
		// $den = $den4 . $den5 . $den6;
		// $den4 = substr($den2, 6);
		// $den5 = substr($den2, 3, 2);
		// $den6 = substr($den2, 0, 2);
		// $den2 = $den4 . $den5 . $den6;

		// //echo($den);
		// //die();
		// $sql = "SELECT  * FROM oplatanew  join studentnew on studentnew.id=oplatanew .id_student where substr(date_payment,7,4)||substr(date_payment,4,2)||substr(date_payment,1,2)  between '" . $den . "'  and'" . $den2 . "'";
		// $query = $this->db->query($sql);
		// return $query->result_array();


		// $sql = "SELECT * FROM oplatanew where date_payment between ? and ?";
		// $query=$this->db->query($sql,array($den,$den2));
		// return $query->result_array();

	}



	///////////////////////////////////////old student///////////////////////////////
	function get_student2($id)
	{

		$sql = "SELECT * FROM student where id=?";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}

	function get_gruppa2($id)
	{
		$sql = "SELECT groupname FROM gruppa where id=?";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}

	function get_tele($id)
	{
		$sql = "SELECT tel FROM phone where id_student=?";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}

	/////////////////////////////////////////////////////////////////////////////////
	function get_kniga()
	{

		$den = date('Y-m-d');
		// echo($den.'%');
		
		$sql = "SELECT * FROM book join studentnew on studentnew.id=book.id_student  where date_payment like ? ";
		$query = $this->db->query($sql, array($den.'%'));
		return $query->result_array();
		//$this->db->join('studentnew','studentnew.id=oplatanew.id_student');
	//	$query = $this->db->get('oplatanew');
		// $this->db->select('*');
		// $this->db->from('book');
		// $array = array('date_payment LIKE' => $den . '%');
		// $query = $this->db->where($array);
		// $this->db->join('studentnew', 'studentnew.id=book.id_student');
		// $query = $this->db->get();
		// return $query->result_array();
	}

	function get_kniga2($den)
	{
	
		$sql = "SELECT * FROM book join studentnew on studentnew.id=book.id_student  where date_payment like ? ";
		$query = $this->db->query($sql, array( date('Y-m-d', strtotime($den)).'%' ));
		return $query->result_array();
	}
	
	function get_kniga3($den, $den2)
	{

		$sql = "SELECT * FROM book join studentnew on studentnew.id=book.id_student  where date_payment between ?  AND ?";
		$query = $this->db->query($sql, array(date('Y-m-d', strtotime($den)).'%', date('Y-m-d', strtotime($den2)).'%'));
		return $query->result_array();
	}

	function get_knigalast($den, $den2)
	{
		$this->db->select('*');
		$this->db->from('oplatanew');

		$den4 = substr($den, 6);
		$den5 = substr($den, 3, 2);
		$den6 = substr($den, 0, 2);
		//echo $den5;
		$den = $den4 . $den5 . $den6;
		// echo $den;
		$den4 = substr($den2, 6);
		$den5 = substr($den2, 3, 2);
		$den6 = substr($den2, 0, 2);
		//echo $den5;
		$den2 = $den4 . $den5 . $den6;
		// echo $den2;
		//die();
		$sql = "SELECT  * FROM oplatanew join studentnew on studentnew.id=oplatanew.id_student where substr(date_payment,7,4)||substr(date_payment,4,2)||substr(date_payment,1,2)  between '" . $den . "'  and'" . $den2 . "' and book_price!='' and ks_price=''";


		$query = $this->db->query($sql);

		return $query->result_array();
	}
	/////////////////////////////////////////////////////////////////////////////////

	function  to_otuchil()
	{
		$den2 = date("d-m-Y", mktime(0, 0, 0, date("m"), date("d") - 4, date("Y")));
		$den3 = date("d-m-Y", mktime(0, 0, 0, date("m"), date("d") - 5, date("Y")));

		$sql = "SELECT * FROM oplatanew  where last_date_lesson = ? OR last_date_lesson = ?";
		$query = $this->db->query($sql, array($den2, $den3));
		return $query->result_array();
	}


	function to_otuchilst()
	{
		// $den = date("d-m-Y");
		// //$den2 = date("d-m-Y",mktime(0, 0, 0, date("m") , date("d")-5, date("Y")));
		// $this->db->select('*');
		// $this->db->from('oplatanew');

		$sql = "SELECT  fio,id_student,namegroup FROM oplatanew inner join studentnew on studentnew.id=oplatanew.id_student inner join gruppanew on gruppanew.id=studentnew.id_gruppa  where  last_date_lesson like ?  and tranid = '' and lastDate !='' GROUP BY id_student";
		$query = $this->db->query($sql, array(date('Y-m-d'). '%'));
		return $query->result_array();
	}
	function withoutpayments()
	{
		$sql = "SELECT fio,id_student,namegroup FROM oplatanew inner join studentnew on studentnew.id=oplatanew.id_student inner join gruppanew on gruppanew.id=studentnew.id_gruppa  where   last_date_lesson < ? and tranid = '' and lastDate !='' GROUP BY id_student ";
		$query = $this->db->query($sql, array(date('Y-m-d'). '%'));
		return $query->result_array();
	}
	function withoutpayments2()
	{
		$sql = "SELECT fio,id_student,namegroup FROM oplatanew inner join studentnew on studentnew.id=oplatanew.id_student inner join gruppanew on gruppanew.id=studentnew.id_gruppa and tranid = '' and lastDate !='' GROUP BY id_student ";
		$query = $this->db->query($sql, array(date('Y-m-d'). '%'));
		return $query->result_array();
	}

	function getLast3days()
	{

		$den2 = date("d-m-Y", mktime(0, 0, 0, date("m"), date("d") + 3, date("Y")));
		// $this->db->select('*');
		// $this->db->from('oplatanew');
		$sql = "SELECT  * FROM oplatanew   join studentnew on studentnew.id=oplatanew.id_student where last_date_lesson=?  GROUP BY id_student";
		$query = $this->db->query($sql, array($den2));
		return $query->result_array();
	}
	/////////////////////////////////////////////////////////////////////////////////
	function get_cheknum()
	{



		$sql = "SELECT * FROM oplatanew where id_student<>''  ORDER BY id desc LIMIT 1";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
	function get_bookdolg($id)
	{
		$sql = "SELECT * FROM oplatanew where id_student=? AND ks_price !='' ORDER BY id desc LIMIT 1";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}
	function get_cddolg($id)
	{
		$sql = "SELECT * FROM cd where id_student=? AND dolg !=''";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}
	/////////////////////////////////////////////////////////////////////////////////
	function get_chek($id)
	{
		//$sql = "SELECT * FROM oplatanew where nomer_cheka=?";
		$sql = "SELECT *,oplatanew.id as oplid FROM oplatanew JOIN  studentnew on studentnew.id = oplatanew.id_student WHERE nomer_cheka=? ";
		$query = $this->db->query($sql, array($id));
		return $query->result_array();
	}

	function get_last_payment($id)
	{
		//$sql = "SELECT * FROM oplatanew where nomer_cheka=?";
		$sql = "SELECT *,oplatanew.id as oplid, studentnew.id as stid  FROM oplatanew JOIN  studentnew on studentnew.id = oplatanew.id_student JOIN  gruppanew on gruppanew.id = studentnew.id_gruppa WHERE id_student=?  ORDER BY oplid desc LIMIT 1";

		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}
	/////////////////////////////////////////////////////////////////////////////////
	function get_oplataedit($id)
	{
		$sql = "SELECT * FROM oplatanew where id=?";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}
	function refresh_oplata_edit($id, $add)
	{
		$this->db->where('id', $id);
		$this->db->update('oplatanew', $add);
	}
	function del_oplata_edit($id)
	{
		$this->db->delete('oplatanew', array('id' => $id));
	}
	/////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////
	/////////////////////////////////////////////////////////////////////////////////
	function get_dolj($den)
	{
		$sql = "SELECT * FROM oplatanew WHERE first_date_lesson=? AND dolg!=''";
		$query = $this->db->query($sql, array($den));
		return $query->result_array();
	}

	function getDoljniki()
	{
		$sql = "SELECT  *, studentnew.id as stid , fio , tranid  FROM oplatanew JOIN  studentnew on studentnew.id = oplatanew.id_student  WHERE dolg!='' group by id_student  ";
		//$sql = "SELECT  *  FROM oplatanew WHERE dolg!='' group by id_student ";
		$query = $this->db->query($sql);
		return $query->result_array();
	}




	function get_name_st($id)
	{
		$sql = "SELECT fio FROM studentnew WHERE id=? ";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}
	function get_lastpay_student($id)
	{
		$sql = "SELECT * FROM oplatanew where id_student=?  ORDER BY id desc LIMIT 1";
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
	}
	function razmorst($id, $add)
	{
		$this->db->where('id', $id);
		$this->db->update('studentnew', $add);
	}
	function get_all()
	{
		//$DB2 = $this->load->database('db2', TRUE);
		$sql = "SELECT * FROM studentnew";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function add_all($add)
	{
		$DB2 = $this->load->database('db2', TRUE, TRUE);
		$query = $DB2->insert('studentnew', $add);
		return $query;
	}
	function get_all_gr()
	{
		$sql = "SELECT * FROM gruppanew";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function add_all_gr($add)
	{
		$DB2 = $this->load->database('db2', TRUE, TRUE);
		$query = $DB2->insert('gruppanew', $add);
		return $query;
	}
	function getAllSt()
	{
		$sql = "SELECT * FROM studentnew WHERE id_gruppa!=''";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	function setActiveAllSt($id)
	{
		$sql = "UPDATE studentnew SET active = 1 WHERE id = ?";
		$this->db->query($sql, array($id));
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	function add_propusk($id, $pr)
	{
		$sql = "UPDATE studentnew SET propusk = ? WHERE id = ?";
		$this->db->query($sql, array($pr, $id));
		return ($this->db->affected_rows() != 1) ? false : true;
	}
	function getOldOpl()
	{
		$den = date("d-m-Y");
		$den4 = substr($den, 6);
		$den5 = substr($den, 3, 2);
		$den6 = substr($den, 0, 2);
		//echo $den5;
		$den = $den4 . $den5 . $den6;
		// echo $den;
		$sql = "SELECT  studentnew.id as stid , fio , tranid  FROM studentnew JOIN  oplatanew on oplatanew.id_student = studentnew.id  WHERE  substr(last_date_lesson,7,4)||substr(last_date_lesson,4,2)||substr(last_date_lesson,1,2) > ? AND  length(tranid) > 0  ORDER BY stid desc ";
		$query = $this->db->query($sql, array($den));
		return $query->result_array();
	}
	function updateOldOpl($data)
	{
		$this->db->update_batch('studentnew', $data, 'fio');
	}
}
