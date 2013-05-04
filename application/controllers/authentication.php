<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Authentication extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper('URL');
	}

	function index() {
		//This method will have the credentials validation

		if (TRUE) {
			//Field validation failed.&nbsp; User redirected to login page
			$this -> load -> view('login_view');
		} else {
			$username = 'Test';
			//Go to private area
			redirect('/home/index');
		}

	}

}
?>
