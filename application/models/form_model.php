<?php
require_once ('data_entity.php');
/**
 *
 */
class Form_model extends  CI_Model {

	function __construct() {
		parent::__construct();
	}

	public function getTestForms() {

		$res = array();

		$tmp = new FormData();
		$tmp -> course = 'Anliaza matematyczna';
		$tmp -> name = 'Ankieta 2';
		$tmp -> date = '2013-06-10';
		$tmp -> status = 'Nowa';
		$tmp -> id = '001';

		array_push($res, $tmp);

		$tmp = new FormData();
		$tmp -> course = 'Podstawy programowania';
		$tmp -> name = 'Ankieta 7';
		$tmp -> date = '2013-05-14';
		$tmp -> status = 'Zakonczona';
		$tmp -> id = '002';

		array_push($res, $tmp);

		$tmp = new FormData();
		$tmp -> course = 'Statystyka';
		$tmp -> name = 'Ankieta 3';
		$tmp -> date = '2013-06-01';
		$tmp -> status = 'Rozpoczeta';
		$tmp -> id = '003';

		array_push($res, $tmp);

		$tmp = new FormData();
		$tmp -> course = 'Grafika komputerowa';
		$tmp -> name = 'Ankieta 10';
		$tmp -> date = '2013-06-18';
		$tmp -> status = 'Nowa';
		$tmp -> id = '004';

		array_push($res, $tmp);

		return $res;
	}

	public function getTestForm($id) {

		$tmp = new FormDetailData();
		$tmp -> id = "001";
		$tmp -> name = "Ankieta 4";
		$tmp -> course = 'Analiza matematyczna 2';
		$tmp -> title = 'Ocena jakosci ksztalcenia';
		$tmp -> description = 'Bardzo wazny opis przeczytaj przed przystapieniem do wypelniana ankiety';

		return $tmp;
	}

	public function getTestFormQustions() {

		$res = array();

		$tmp = new FormQuestionData();
		$tmp -> name = 'Ankieta 1';
		$tmp -> question = 'Co sadzisz na temat przedmiotu ?';
		$tmp -> id = '001';

		array_push($res, $tmp);

		$tmp = new FormQuestionData();
		$tmp -> name = 'Ankieta 2';
		$tmp -> question = 'Co sadzisz na temat prowadz±cego ?';
		$tmp -> id = '002';

		array_push($res, $tmp);

		$tmp = new FormQuestionData();
		$tmp -> name = 'Ankieta 3';
		$tmp -> question = 'Co sadzisz na temat zadañ ?';
		$tmp -> id = '003';

		array_push($res, $tmp);

		$tmp = new FormQuestionData();
		$tmp -> name = 'Ankieta 4';
		$tmp -> question = 'Co sadzisz na temat kolokwium ?';
		$tmp -> id = '004';

		array_push($res, $tmp);

		return $res;
	}

	public function getTestFormQustion($id) {

		$tmp = new FormQuestionData();
		$tmp -> name = 'Ankieta 1';
		$tmp -> question = 'Co sadzisz na temat przedmiotu ?';
		$tmp -> type = 1;
		$tmp -> id = '001';

		return $tmp;
	}

	public function getTestFormQustionsDetail($id) {

		$tmp = new FormQuestionDetailsData();
		$tmp -> id = "001";

		return $tmp;
	}

}
?>