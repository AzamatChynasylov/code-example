<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Rules_model extends CI_Model {

	
	////////////////////////////
	
	public $login_rules = array
(
   array
   (
        'field' => 'email',
        'label' => 'Емейл',
        'rules' => 'required|xss_clean|min_length[4]|valid_email',
        'errors' => array(
                        'required' => 'Заполните поле  %s!',
                        'valid_email'=> 'Введите существующий  %s!'
                ),
   ),
   array
   (
       'field' => 'pwd',
       'label' => 'Пароль',
       'rules' => 'required|xss_clean|min_length[3]|max_length[16]|alpha_dash',
       'errors' => array(
                        'required' => 'Заполните поле  %s!',
                        'min_length[3]'=> '%s длина должен быть минимум 3 символа!',
                        'alpha_dash' =>'Поле %s должен содержать только буквы и цифры!',
                ),
   ),
);
}
