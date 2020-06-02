<?php
class GroupList
{
	protected $CI;
	public function __construct() {
			$this->CI = & get_instance();
	}
	function list()
	{
		$data = $result = [];
		$this->CI->load->model('gruppa_model');
		$data['gruppa'] = $this->CI->gruppa_model->get_all_gruppa();

		function invenDescSort($item1, $item2)
		{
			if ($item1['time'] == $item2['time']) return 0;
			return ($item1['time'] > $item2['time']) ? 1 : -1;
		}
		usort($data['gruppa'], 'invenDescSort');
		$resultArray = [];
		array_walk($data['gruppa'], function ($item, $key) use (&$resultArray) {
			$resultArray[$item['metka']][] = $item;
		});
		$resultArray;
		$resultArray2 = [];
		array_walk($resultArray[2], function ($item2, $key2) use (&$resultArray2) {
			$resultArray2[$item2['time']][] = $item2;
		});
		$result[0] = $resultArray2;
		$result[1] = $resultArray[1];
		return $result;
		// print_r( $result);
	}
}
