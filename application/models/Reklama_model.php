<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Reklama_model extends CI_Model {

	public function getReklams()
    {
        $sql="SELECT  name, count(name) AS cnt FROM reklam GROUP BY name";
        $query=$this->db->query($sql);
        return $query->result_array();
    }

//     SELECT name, food, COUNT(food) AS cnt
// FROM table
// GROUP BY name, food
// HAVING (cnt > 1)
}
