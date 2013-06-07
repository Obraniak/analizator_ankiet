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

		$param = $this -> uri -> uri_to_assoc(3);

		$this -> session -> set_userdata('current_form_id', $param['id']);

		$this -> load -> model('Form_model');

		$form = $this -> Form_model -> getTestForm($param['id']);

		$data['form_name'] = $form -> name;
		$data['form_course'] = $form -> course;
		$data['form_title'] = $form -> title;
		$data['form_description'] = $form -> description;

		$this -> load -> view('base/head_view');
		$this -> load -> view('base/header_view');
		$this -> load -> view('form/start_view', $data);
		$this -> load -> view('base/footer_view');
	}

	function item() {

		parse_str($_SERVER['QUERY_STRING'], $param);

		$this -> session -> set_userdata('current_form_details_id', $param['item']);

		$this -> load -> model('Form_model');

		$question_header['form_question'] = $this -> Form_model -> getTestFormQustion($param['item']);

		$question_detail['form_question_detail'] = $this -> Form_model -> getTestFormQustionsDetail($question_header['form_question'] -> id);

		$this -> load -> view('base/head_view');
		$this -> load -> view('base/header_view');
		$this -> load -> view('form/item_view', $question_header);

		if ($question_header['form_question'] -> type == 1) {
			$this -> load -> view('form/item/question_open_view', $question_detail);
		} else {
			$this -> load -> view('form/item/question_close_view', $question_detail);
		}

		$this -> load -> view('base/footer_view');
	}

	function end() {
		$this -> load -> view('base/head_view');
		$this -> load -> view('base/header_view');
		$this -> load -> view('form/end_view');
		$this -> load -> view('base/footer_view');
	}

	function update() {
		log_message('DEBUG', 'form update');
	}

}
?>

