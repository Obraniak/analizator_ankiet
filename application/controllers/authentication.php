<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Authentication extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		//This method will have the credentials validation

		if ($this -> input -> post('username') != "test") {
			//Field validation failed.&nbsp; User redirected to login page
			redirect('/login/index');
		} else {
			//Go to private area
			$this -> session -> set_userdata('login', $this -> input -> post('username'));

			redirect('/home/index');
		}
	}

}
?>
