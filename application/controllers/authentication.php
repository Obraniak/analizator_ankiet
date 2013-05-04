<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Authentication extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this -> load -> helper('URL');
	}

	function index() {
		//This method will have the credentials validation

		if (FALSE) {
			//Field validation failed.&nbsp; User redirected to login page
			redirect('/login/index');
		} else {
			$username = 'Test';
			//Go to private area
			redirect('/home/index');
		}

	}

}
?>
