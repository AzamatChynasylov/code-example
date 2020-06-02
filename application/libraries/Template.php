<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template {
        public function page_view($name,$data)
    {
    	$CI =& get_instance();

		$CI->load->view('blocks/Header_view',$data);
		$CI->load->view($name.'_view',$data);
		if($name=='raspisanie')
		{

		}
		else
		{
			$CI->load->view('blocks/Sidebar_view',$data);

		}
		$CI->load->view('blocks/Footer_view',$data);
    }

    public function welcome_view($name,$data)
    {
    	$CI =& get_instance();

		$CI->load->view('template/header',$data);
		$CI->load->view('main/'.$name,$data);
		$CI->load->view('template/footer',$data);
    }

}
