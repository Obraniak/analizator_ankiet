<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
session_start();
//we need to call PHP's session object to access it through CI
class Form extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	function index() {
		$username = "test";
	}

	function start() {

		$data = $this -> uri -> uri_to_assoc(3);

		$this -> session -> set_userdata('current_form_id', $data['id']);

		$this -> load -> model('Form_model');

		foreach ($this->Form_model->getTestForm() as $form) :
			if ($form -> id == $data['id']) {
				$data['form_name'] = $form -> name;
			}
		endforeach;

		$data['form_question_list'] = $this -> Form_model -> getTestFormQustions($data['id']);

		$this -> load -> view('head_view');
		$this -> load -> view('header_view');
		$this -> load -> view('form_start_view', $data);
		$this -> load -> view('footer_view');
	}

	function item() {

		$data = $this -> uri -> uri_to_assoc(3);

		$this -> session -> set_userdata('current_form_details_id', $data['id']);

		$this -> load -> model('Form_model');

		$data['form_question_detail'] = $this -> Form_model -> getTestFormQustionsDetails($data['id']);

		$this -> load -> view('head_view');
		$this -> load -> view('header_view');
		$this -> load -> view('form_item_view', $data);
		$this -> load -> view('footer_view');
	}

	function end() {
		$this -> load -> view('head_view');
		$this -> load -> view('header_view');
		$this -> load -> view('form_end_view');
		$this -> load -> view('footer_view');
	}

}
?>

