<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
session_start();
//we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this -> lang -> is_loaded = array();
		$this -> lang -> load('psi', $this -> session -> userdata('user_lang'));

		$this -> load -> model('Form_model');

		$data = array('user' => $this -> session -> userdata('login'), 
						'form_list' => $this -> Form_model -> getTestForms($this -> session -> userdata('user_id')));

		$this -> load -> view('base/head_view');
		$this -> load -> view('base/header_view');
		$this -> load -> view('home/list_view', $data);
		$this -> load -> view('base/footer_view');

		log_message('DEBUG', 'test');

	}

	function index() {
		$username = "test";
	}

	function logout() {

	}

	function search() {
	}

}
?>

