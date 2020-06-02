<?php
class CheckAuth {

    function Blocker(){
    }
    
    /**
     * This function used to block the every request except allowed ip address
     */
    function CheckLogin(){
			$CI =& get_instance();
			$data['user'] =$CI->session->userdata('user');
				if(empty($data['user']))
			{
				redirect(base_url());
			}
    }
}
?>
