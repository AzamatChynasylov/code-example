<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shedule_model extends CI_Model {


/*Read the data from DB */
	Public function getEvents()
	{
		//$DB2 = $this->load->database('db2', TRUE, TRUE);
	$sql = "SELECT * FROM fccalendar WHERE fccalendar.start BETWEEN ? AND ? ORDER BY fccalendar.start ASC";
	return $this->db ->query($sql, array($_GET['start'], $_GET['end']))->result();

	}
	Public function getEventsZp($a,$b,$c)
	{
		//$DB2 = $this->load->database('db2', TRUE, TRUE);
	$sql = "SELECT * FROM fccalendar WHERE fccalendar.start BETWEEN ? AND ? AND title=?";
	return $this->db ->query($sql, array($a,$b,$c))->result_array();

	}

	Public function getNew($a,$b)
	{
		//$DB2 = $this->load->database('db2', TRUE, TRUE);
	$sql = "SELECT * FROM fccalendar WHERE fccalendar.start BETWEEN ? AND ? ORDER BY fccalendar.start ASC";
	return  $this->db ->query($sql, array($a,$b))->result_array();

	}

	Public function getEvents2($a,$b,$c)
	{
		//$DB2 = $this->load->database('db2', TRUE, TRUE);
	$sql = "SELECT * FROM fccalendar WHERE fccalendar.start BETWEEN ? AND ? AND title=? ORDER BY fccalendar.start ASC";
	return $this->db ->query($sql, array($a, $b,$c))->result_array();

	}
	public function getLessonsTeacher($day1,$day2)
    {
        $sql = "SELECT * FROM fccalendar WHERE fccalendar.start BETWEEN ? AND ?  ORDER BY fccalendar.start ASC ";
        return $this->db ->query($sql, array($day1,$day2))->result_array();
    }

    public function getLesson($d,$n){
		//$DB2 = $this->load->database('db2', TRUE, TRUE);
	$sql = "SELECT * FROM fccalendar WHERE fccalendar.start=? AND title=?";
	return $this->db ->query($sql, array($d,$n))->row_array();
	}
	public function getLesson2($d){
		//$DB2 = $this->load->database('db2', TRUE, TRUE);
	$sql = "SELECT * FROM fccalendar WHERE fccalendar.start=? ";
	return  $this->db ->query($sql, array($d))->result_array();
	}
	Public function getEventsDate()
	{
		 // $k="2019-03-18 09:40:00";
		 // $k=date("Y-m-d H:i:s",strtotime($k));
		 // echo($k);
		//$DB2 = $this->load->database('db2', TRUE, TRUE);
		$sql = "SELECT * FROM fccalendar WHERE fccalendar.start = ?";
	 return  $this->db ->query($sql, array($_POST['time']))->result_array();
	// return $this->db ->query($sql, array($k))->result_array();

	}
	Public function getEventsDate2()
	{
		// $k="2017-09-20 07:00:00";
		//$DB2 = $this->load->database('db2', TRUE, TRUE);
		$sql = "SELECT * FROM fccalendar WHERE fccalendar.start = ?";
	return  $this->db->query($sql, array($_POST['time']))->result_array();
	// return $DB2 ->query($sql, array($k))->result_array();

	}

/*Create new events */

	Public function addEvent()
	{
		$dt=date( "Y-m-d H:i:s",strtotime($_POST['end']));
		//echo (date( "Y-m-d H:i:s",strtotime($d." ".$t)));
		$dt2= (date( "Y-m-d H:i:s",strtotime($dt) + 4800));
		//$DB2 = $this->load->database('db2', TRUE, TRUE);
		$add['title']=$_POST['title'];
			$add['description']=$_POST['description'];
			$add['shortdesc']=$_POST['shortdescription'];
			$add['start']=$_POST['start'];
			$add['end']=$dt2;
			$add['color']=$_POST['color'];
			//$add['metka']=$result[$i]['metka'];
		$this->db->insert('fccalendar',$add);
	//$sql = "INSERT INTO fccalendar (title,fccalendar.start,fccalendar.end,description,shortdesc, color) VALUES (?,?,?,?,?,?)";
	 //$this->db->query($sql, array($_POST['title'], $_POST['start'], $dt2,  $_POST['description'],$_POST['shortdescription'],$_POST['color']));
		return ( $this->db->affected_rows()!=1)?false:true;
	}

	/*Update  event */

	Public function updateEvent()
	{
		//$DB2 = $this->load->database('db2', TRUE, TRUE);

	$sql = "UPDATE fccalendar SET title = ?, description = ?,shortdesc = ?, color = ? WHERE id = ?";
	 $this->db->query($sql, array($_POST['title'],$_POST['description'],$_POST['shortdescription'], $_POST['color'], $_POST['id']));
		return ( $this->db->affected_rows()!=1)?false:true;
	}

	Public function updateEvent2()
	{
		//$DB2 = $this->load->database('db2', TRUE, TRUE);

	$sql = "UPDATE fccalendar SET title = ?, description = ?, color = ?, metka =1 WHERE id = ?";
	 $this->db->query($sql, array($_POST['title'],$_POST['description'], $_POST['color'], $_POST['id']));
		return ( $this->db->affected_rows()!=1)?false:true;
	}
	
		Public function updateEvent3()
	{
		//$DB2 = $this->load->database('db2', TRUE, TRUE);

	$sql = "UPDATE fccalendar SET title = ?, description = ?, color = ?, metka =2 WHERE id = ?";
	 $this->db->query($sql, array($_POST['title'],$_POST['description'], $_POST['color'], $_POST['id']));
		return ( $this->db->affected_rows()!=1)?false:true;
	}


	/*Delete event */

	Public function deleteEvent()
	{
		//$DB2 = $this->load->database('db2', TRUE, TRUE);
	$sql = "DELETE FROM fccalendar WHERE id = ?";
	 $this->db->query($sql, array($_GET['id']));
		return ( $this->db->affected_rows()!=1)?false:true;
	}

	/*Update  event */

	Public function dragUpdateEvent()

	{
		//$DB2 = $this->load->database('db2', TRUE, TRUE);
			//$date=date('Y-m-d h:i:s',strtotime($_POST['date']));

			$sql = "UPDATE fccalendar SET  fccalendar.start = ? ,fccalendar.end = ?  WHERE id = ?";
			 $this->db->query($sql, array($_POST['start'],$_POST['end'], $_POST['id']));
		return ( $this->db->affected_rows()!=1)?false:true;


	}

	function updategr($id,$add){
		$this->db->where('id', $id);
		$this->db->update('gruppanew', $add); 
	}


	public function teacherDell($id){
		$sql = "DELETE FROM teacher WHERE id = ?";
		$this->db->query($sql, array($id));
		return ($this->db->affected_rows()!=1)?false:true;
	}

	Public function addDejur()
	{
		$date= date("Y-m-d",strtotime($_POST['date']));
		$d=date('N',strtotime($date));
		$date = $d." ".$date." ".$_POST['time'];
	$sql = "UPDATE teacher SET name = ?, telefon = ?, dop_info = ? WHERE id = ?";
	$this->db->query($sql, array($_POST['name'],$_POST['telefon'],$date, $_POST['id']));
		return ($this->db->affected_rows()!=1)?false:true;
	}

	Public function dellDejur()
	{
		$date='';
	$sql = "UPDATE teacher SET name = ?, telefon = ?, dop_info = ? WHERE id = ?";
	$this->db->query($sql, array($_POST['name'],$_POST['telefon'],$date, $_POST['id']));
		return ($this->db->affected_rows()!=1)?false:true;
	}
	public function getDejur($d)
	{

		$sql = "SELECT * FROM teacher WHERE substr(dop_info, 1, 1) LIKE ? ORDER BY id desc LIMIT 1";
	// return $DB2 ->query($sql, array($_POST['time']))->result_array();
	return $this->db ->query($sql, array($d+1))->row_array();

	}
	public function getallfc()
	{
		$DB2 = $this->load->database('db2', TRUE, TRUE);
			//$date=date('Y-m-d h:i:s',strtotime($_POST['date']));

		$sql = "SELECT * FROM fccalendar ";

		return $DB2 ->query($sql)->result_array();

	}
	Public function addallfc($add)
	{
		//echo ($a);

		$this->db->insert('fccalendar',$add);
	
	//return ($this->db->affected_rows()!=1)?false:true;
	}

	public function getGroupByName($name)
	{
		$sql = "SELECT * FROM fccalendar WHERE description LIKE ?";
	// return $DB2 ->query($sql, array($_POST['time']))->result_array();
	return $this->db ->query($sql, array($name))->result_array();
	}
	public function changeGroupName($id,$name,$name2)
	{
		$sql = "UPDATE fccalendar SET description = ?, shortdesc = ? WHERE id = ?";
	$this->db->query($sql, array($name,$name2, $id));
		return ($this->db->affected_rows()!=1)?false:true;
	}

	Public function saveClient($add)
	{
		//echo ($a);

		$this->db->insert('client',$add);
	
	return ($this->db->affected_rows()!=1)?false:true;
	}
	public function getClients($q)
	{
		if($q == '')
		{
			$sql = "SELECT * FROM client WHERE metka IS NULL OR metka='' ORDER BY dateCome desc";
			// return $DB2 ->query($sql, array($_POST['time']))->result_array();
			return $this->db ->query($sql)->result_array();
		}
		else
		{
			$sql = "SELECT * FROM client WHERE metka=? ORDER BY dateCome desc";
			// return $DB2 ->query($sql, array($_POST['time']))->result_array();
			return $this->db ->query($sql,array($q))->result_array();

		}
		
	}
	public function getClients2()
	{
		
	}
	public function getClients3()
	{
		$sql = "SELECT * FROM client WHERE metka=3 ORDER BY id desc";
	// return $DB2 ->query($sql, array($_POST['time']))->result_array();
	return $this->db ->query($sql)->result_array();
	}
	public function searchClient($name)
	{
		$sql = "SELECT * FROM client WHERE level = ? AND metka IS NULL";
		return $this->db ->query($sql, array($name))->result_array();
	}
	function dellClient($id)
	{
       $dateCome=date("Y-m-d H:i:s");
       $sql = "UPDATE client SET metka = 2, dateCome = ? WHERE id = ?";
	   $this->db->query($sql, array($dateCome,$id));
	   return ($this->db->affected_rows()!=1)?false:true;
	}
	public function getClientClientAjax($name)
	{
		$sql = "SELECT * FROM client WHERE id = ?";
		return $this->db ->query($sql, array($name))->row_array();
	}
	public function getClientClientAjax2($id)
	{
		$dateCome=date("Y-m-d H:i:s");
       $sql = "UPDATE client SET metka = 3, dateCome = ? WHERE id = ?";
	   $this->db->query($sql, array($dateCome,$id));
	   return ($this->db->affected_rows()!=1)?false:true;
	}
	function dellClient2($id)
	{
       
      
	   $sql = "DELETE FROM client WHERE id = ?";
		$this->db->query($sql, array($id));
		return ($this->db->affected_rows()!=1)?false:true;
	}
	function updateSt($id,$add)
	{
       $this->db->where('id', $id);
	   $this->db->update('client', $add); 
	}

	function updateSt2($id,$add)
	{
       $this->db->where('id', $id);
	   $this->db->update('reklam', $add); 
	}

    function getOldShedule()
    {
//        $date= date("Y-m-01 H:i:s",strtotime("-2 month"));
//        $sql = "SELECT * FROM fccalendar WHERE fccalendar.start < ?";
//        return $this->db ->query($sql, array($date))->result();

        $date= date("Y-m-01 H:i:s",strtotime("-2 month"));
        $sql = "DELETE FROM fccalendar WHERE fccalendar.start < ?";
        return ($this->db->affected_rows()!=1)?false:true;
    }
}