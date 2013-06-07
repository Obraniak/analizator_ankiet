<?php

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();

	}

	function index() {

		$tmp = $this -> session -> userdata('user_lang');

		if (!isset($tmp)) {
			$this -> session -> set_userdata('user_lang', 'pl');
		} else {
			parse_str($_SERVER['QUERY_STRING'], $param);

			if (isset($param) && array_key_exists('lang', $param)) {
				$this -> session -> set_userdata('user_lang', $param['lang']);
			}
		}

		$this -> load -> helper('URL');
		$this -> load -> helper(array('form'));

		$this -> lang -> is_loaded = array();
		$this -> lang -> load('psi', $this -> session -> userdata('user_lang'));

		$data['lang'] = $this -> session -> userdata('user_lang');

		$this -> load -> view('base/head_view');
		$this -> load -> view('base/header_view');
		$this -> load -> view('login/form_view', $data);
		$this -> load -> view('base/footer_view');

	}

	function changelang() {

		if ($this -> session -> userdata('user_lang') == 'pl') {
			$this -> session -> set_userdata('user_lang', 'en');
		} else {
			$this -> session -> set_userdata('user_lang', 'pl');
		}
	}

}

/* End of file login.php */
/* Location: ./system/application/controllers/login.php */
