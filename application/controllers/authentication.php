<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Authentication extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		//This method will have the credentials validation

		$this -> load -> model('Auth_model');

		log_message('DEBUG', $this -> input -> post('username'));

		$result = $this -> Auth_model -> isExist($this -> input -> post('username'));

		log_message('DEBUG', $result);

		if ($result > 0) {

			// validacaja po stronie poczty czy jest aktywny

			// pobieramy imie i nazwisko user z serwera poczty

			$this -> session -> set_userdata('login', $this -> input -> post('username'));
			$this -> session -> set_userdata('user_id', $result);

			//przyjmujemy ze uzytkownik zweryfikowy
			redirect('/home/index');
		} else {
			// uzytkownik niezweryfikowany
			redirect('/login/index');
		}

	}

}
?>
