<?php

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		$this -> load -> helper('URL');
		$this -> load -> helper(array('form'));

		$this -> load -> view('base/head_view');
		$this -> load -> view('base/header_view');
		$this -> load -> view('login/form_view');
		$this -> load -> view('base/footer_view');

	}

}

/* End of file login.php */
/* Location: ./system/application/controllers/login.php */
