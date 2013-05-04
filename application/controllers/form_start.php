<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
session_start();
//we need to call PHP's session object to access it through CI
class FormStart extends CI_Controller {

	function __construct() {
		parent::__construct();

		$this -> load -> view('form_start_view');
		$this -> load -> helper('URL');

	}

	function index() {
		$username = "test";
	}

	function logout() {

	}

}
?>

