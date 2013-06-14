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

		$this -> lang -> is_loaded = array();
		$this -> lang -> load('psi', $this -> session -> userdata('user_lang'));

		$username = $this -> session -> userdata('login');
	}

	function start() {

		$this -> lang -> is_loaded = array();
		$this -> lang -> load('psi', $this -> session -> userdata('user_lang'));

		$param = $this -> uri -> uri_to_assoc(3);

		$this -> session -> set_userdata('last_position', 0);

		$this -> session -> set_userdata('current_form_id', $param['id']);

		$this -> firstItem($this -> session -> userdata('current_form_id'));
	}

	function item() {

		$this -> lang -> is_loaded = array();
		$this -> lang -> load('psi', $this -> session -> userdata('user_lang'));

		parse_str($_SERVER['QUERY_STRING'], $param);

		$this -> load -> model('Form_model');

		if ($param['item'] == "begin") {
			$this -> firstItem($this -> session -> userdata('current_form_id'));
			return;
		}
		if ($param['item'] == "end") {
			$this -> lastItem($this -> session -> userdata('current_form_id'));
			return;
		}

		$questions = $this -> Form_model -> getTestFormQustions($this -> session -> userdata('current_form_id'));

		for ($id = 0; $id < count($questions); $id++) {
			if ($id == $param['item']) {
				$this -> session -> set_userdata('last_position', $id);
				$this -> loadItem($questions[$id] -> id);
				return;
			}
		}

		$this -> lastItem($this -> session -> userdata('current_form_id'));

	}

	function firstItem($id) {

		$this -> load -> model('Form_model');

		$form = $this -> Form_model -> getTestForm($id);

		$data['form_name'] = $form -> name;
		$data['form_course'] = $form -> course;
		$data['form_title'] = $form -> title;
		$data['form_description'] = $form -> description;

		$this -> load -> view('base/head_view');
		$this -> load -> view('base/header_view');
		$this -> load -> view('form/start_view', $data);
		$this -> load -> view('base/footer_view');
	}

	function lastItem($id) {

		$this -> load -> model('Form_model');

		$form = $this -> Form_model -> getTestForm($id);

		$summary = $this -> Form_model -> getTestFormSummary($this -> session -> userdata('current_form_id'));

		$data['form_name'] = $form -> name;
		$data['form_course'] = $form -> course;
		$data['form_title'] = $form -> title;
		$data['form_description'] = $form -> description;
		$data['form_status'] = $form -> status;

		$data['answer_open_question'] = $summary -> answer_open;
		$data['open_question_count'] = $summary -> open_count;
		$data['answer_close_question'] = $summary -> answer_close;
		$data['close_question_count'] = $summary -> close_count;

		$data["form_position"] = $this -> session -> userdata('last_position');

		$this -> load -> view('base/head_view');
		$this -> load -> view('base/header_view');
		$this -> load -> view('form/end_view', $data);
		$this -> load -> view('base/footer_view');
	}

	function loadItem($id) {

		$this -> session -> set_userdata('current_form_details_id', $id);

		$question_header['form_question'] = $this -> Form_model -> getTestFormQuestion($this -> session -> userdata('current_form_id'), $id);

		$question_detail["form_position"] = $this -> session -> userdata('last_position');

		$this -> load -> view('base/head_view');
		$this -> load -> view('base/header_view');
		$this -> load -> view('form/item_view', $question_header);

		if ($question_header['form_question'] -> type == 0) {
			$question_detail['form_questions_detail'] = $this -> Form_model -> getTestFormQuestionOpenDetails($this -> session -> userdata('current_form_id'), $id);
			$this -> load -> view('form/item/question_open_view', $question_detail);
		} else {
			$question_detail['form_questions_detail'] = $this -> Form_model -> getTestFormQustionCloseDetails($this -> session -> userdata('current_form_id'), $id);
			$this -> load -> view('form/item/question_close_view', $question_detail);
		}

		$this -> load -> view('base/footer_view');
	}

	function end() {

		$this -> lang -> is_loaded = array();
		$this -> lang -> load('psi', $this -> session -> userdata('user_lang'));

		$this -> firstItem($this -> session -> userdata('current_form_id'));
	}

	function update() {
		if (isset($_POST)) {
			$content = file_get_contents('php://input');

			$entity = json_decode($content);
			log_message('DEBUG', $entity -> data[0] -> id);
			log_message('DEBUG', $entity -> data[1] -> answer);

		}

	}

}
?>

