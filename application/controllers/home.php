<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
session_start();
//we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this -> load -> model('Form_model');

		$data = array('user' => $this -> session -> userdata('login'), 
					  'form_list' => $this -> Form_model -> getTestForm());

		$this -> load -> view('head_view');
		$this -> load -> view('header_view');
		$this -> load -> view('home_view', $data);
		$this -> load -> view('footer_view');

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

